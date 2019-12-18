<?php
/**
 * Classe Controller
 */

class Controller 
{
    // PROPRIETES
    protected $tabErreur = [];

    // METHODES
    // CONSTRUCTEUR
    // CE CODE EST DECLENCHE QUAND ON VA FAIRE $objet = new Controller
    function __construct ()
    {
        // JE VAIS TESTER SI IL Y A UN FORMULAIRE A TRAITER
        $identifiantFormulaire = $this->filtrerTexte("identifiantFormulaire");
        if ($identifiantFormulaire != "")
        {
            // NOTRE CONVENTION DANS NOTRE FRAMEWORK
            // JE VAIS VERIFIER SI J'AI UNE METHODE QUI S'APPELLE contentForm
            $nomMethode = "{$identifiantFormulaire}Form";
            // INTROSPECTION
            // https://www.php.net/manual/fr/function.method-exists.php
            if (method_exists($this, $nomMethode))
            {
                // OK LA METHODE EXISTE
                // COMMENT JE PEUX APPELER LA METHODE ?
                // PROGRAMMATION DYNAMIQUE (TORDU MAIS CA MARCHE...)
                $this->$nomMethode();
            }
        }
    }

    function __destruct()
    {
    }

    // PHP : PARANOIA HYPER PARANOIA
    // ATTAQUES PAR CHEVAL DE TROIE
    // https://www.php.net/manual/fr/function.strip-tags.php
    // JE DOIS FILTRER LES INFOS RECUES DE L'EXTERIEUR
    // https://www.php.net/manual/fr/function.trim.php
    // JE DOIS ENLEVER LES ESPACES AU DEBUT ET A LA FIN
    // note: attention à l'ordre des filtres
    function filtrerInput($nameInput)
    {
        // ON VA CHERCHER DANS $_REQUEST 
        // LES VALEURS TRANSMISES PAR LES FORMULAIRES
        $resultat = trim(strip_tags($_REQUEST[$nameInput] ?? ""));

        return $resultat;
    }

    // ATTENTION: LES VARIABLES GLOBALES SONT UTILISEES AU MOMENT DE L'APPEL DE LA FONCTION
    // ON VA UTILISER LA PROPRIETE $tabErreur
    function filtrerTexte($name, $longueurMin = 1, $longueurMax = 160, $nomTable = "")
    {
        // PREMIERE SECURITE D'ENLEVER LES CARACTERES DANGEREUX (balises, espaces en trop)
        $texte            = $this->filtrerInput($name);

        // 2e SECURITE: VERIFICATION DES LONGUEURS
        $longueurTexte    = mb_strlen($texte);
        if ($longueurTexte < $longueurMin) {
            $this->tabErreur[] = "$name ne doit pas être vide";
        }
        if ($longueurTexte >= $longueurMax) {
            $this->tabErreur[] = "$name ne doit pas dépasser $longueurMax caractères";
        }
        if ($nomTable != "") {
            // LE FORMAT DE L'EMAIL EST BON
            // MAIS JE DOIS VERIFIER EN PLUS QUE L'EMAIL 
            // N'EST PAS DEJA PRESENT DANS LA TABLE SQL $nomTable
            // ATTENTION: JE NE SUIS PAS PROTEGE CONTRE LES INJECTIONS SQL A CAUSE DE $texte
            // IL FAUDRAIT PASSER UN TABLEAU ASSOCIATIF AU LIEU DU TEXTE POUR LE PARAMETRE $clauseWhere
            $tabResultat = lireTableSQL($nomTable, "", "WHERE $name = '$texte'");
            // ON VEUT QUE LE TABLEAU $tabResultat SOIT VIDE
            if (count($tabResultat) > 0) {
                $this->tabErreur[] = "$name est déjà utilisé";
            }
        }
        return $texte;
    }


    // CONVERTIR LE TEXTE EN NOMBRE
    function filtrerNombre($name)
    {
        $texte            = $this->filtrerInput($name);
        $nombre           = intval($texte);
        return $nombre;
    }


    // JUSTE UNE SIMPLIFICATION DE MON CODE
    function verifierEmail($email)
    {
        $longueurEmail      = mb_strlen($email);
        // RENVOIE FALSE SI UN DES TESTS ECHOUE (&&)
        // note: && va arrêter dès qu'un test est FALSE
        return ($longueurEmail > 0) && ($longueurEmail < 160) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }


    // ATTENTION: LES VARIABLES GLOBALES SONT UTILISEES AU MOMENT DE L'APPEL DE LA FONCTION
    function filtrerEmail($name, $nomTable = "")
    {
        $email              = $this->filtrerInput($name);
        $longueurEmail      = mb_strlen($email);
        // ! => NEGATION
        if (!$this->verifierEmail($email)) {
            // ATTENTION: ON VEUT UTILISER UNE VARIABLE GLOBALE DANS UNE FONCTION
            // JE RAJOUTE UNE NOUVELLE VALEUR DANS LE TABLEAU
            $this->tabErreur[] = "l'email est incorrect";
        } else if ($nomTable != "") {
            // LE FORMAT DE L'EMAIL EST BON
            // MAIS JE DOIS VERIFIER EN PLUS QUE L'EMAIL 
            // N'EST PAS DEJA PRESENT DANS LA TABLE SQL $nomTable
            $objetModel = new Model;
            $tabResultat = $objetModel->lireTableSQL($nomTable, "", "WHERE $name = '$email'");
            // ON VEUT QUE LE TABLEAU $tabResultat SOIT VIDE
            if (count($tabResultat) > 0) {
                $this->tabErreur[] = "l'email est déjà utilisé";
            }
        }

        return $email;
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="content_user">
    function content_userForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "id_content"          => $this->filtrerNombre("id_content"),
            "id_user"          => $this->filtrerNombre("id_user"),
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "content_user";

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            // DEBUG
            var_dump($this->tabErreur);
        }
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="user">
    function userForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "email"          => $this->filtrerEmail("email"),
            "login"          => $this->filtrerTexte("login"),
            "password"       => $this->filtrerTexte("password"),
            "level"          => $this->filtrerNombre("level"),
            "dateCreation"   => date("Y-m-d H:i:s"),    // COOL PHP PERMET DE LAISSER LA VIRGULE
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "user";
            // HASHER LE PASSWORD
            $tabAssoColonneValeur["password"] = password_hash($tabAssoColonneValeur["password"], PASSWORD_DEFAULT);

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            // DEBUG
            var_dump($this->tabErreur);
        }
    }


    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="content">
    function contentForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "filename"          => $this->filtrerTexte("filename"),
            "titre"             => $this->filtrerTexte("titre"),
            "contenuPage"       => $this->filtrerTexte("contenuPage", 1, 10000),
            "photo"             => $this->filtrerTexte("photo"),
            "datePublication"   => date("Y-m-d H:i:s"),    // COOL PHP PERMET DE LAISSER LA VIRGULE
            "categorie"         => $this->filtrerTexte("categorie"),
            "template"          => $this->filtrerTexte("template", 0),
            // POUR LE DEV (NORMALEMENT ON PASSE PAR LA SESSION POUR DONNER id_user)
            "id_user"          => $this->filtrerNombre("id_user"),
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "content";

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="delete">
    function deleteForm()
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // nomTable
        // id
        $nomTable = $this->filtrerTexte("nomTable");
        $id       = $this->filtrerNombre("id");

        // $tabErreur EST UNE VARIABLE CREEE DANS traitement.php
        if (count($this->tabErreur) == 0) {
            // EFFACER LA LIGNE
            $objetModel = new Model;
            $objetModel->supprimerLigneSQL($nomTable, $id);
        }
        else
        {
            var_dump($this->tabErreur);
        }    
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="contentUpdate">
    function contentUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "filename"          => $this->filtrerTexte("filename"),
            "titre"             => $this->filtrerTexte("titre"),
            "contenuPage"       => $this->filtrerTexte("contenuPage", 1, 10000),
            "photo"             => $this->filtrerTexte("photo"),
            "datePublication"   => date("Y-m-d H:i:s"),    // COOL PHP PERMET DE LAISSER LA VIRGULE
            "categorie"         => $this->filtrerTexte("categorie"),
            "template"          => $this->filtrerTexte("template", 0),
            // POUR LE DEV (NORMALEMENT ON PASSE PAR LA SESSION POUR DONNER id_user)
            "id_user"          => $this->filtrerNombre("id_user"),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "content";

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }

    }


    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="userUpdate">
    function userUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "login"          => $this->filtrerTexte("login"),
            "email"          => $this->filtrerEmail("email"),
            "level"          => $this->filtrerNombre("level"),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "user";

            // GESTION A PART DU PASSWORD
            $password = $this->filtrerTexte("password");
            if ($password != "")
            {
                // SI IL Y A UN NOUVEAU MOT DE PASSE ALORS JE LE CHANGE DANS LA TABLE SQL
                $tabAssoColonneValeur["password"] = password_hash($password, PASSWORD_DEFAULT);
            }

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="userUpdate">
    function content_userUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "id_content"       => $this->filtrerNombre("id_content"),
            "id_user"          => $this->filtrerNombre("id_user"),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "content_user";

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

}