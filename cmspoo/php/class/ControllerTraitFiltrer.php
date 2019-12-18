<?php

trait ControllerTraitFiltrer
{
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

}