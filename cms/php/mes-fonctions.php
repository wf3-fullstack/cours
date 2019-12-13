<?php

// DECLARATION DE LA FONCTION
function configurerProjet ()
{
    // https://www.php.net/manual/fr/function.date-default-timezone-set.php
    date_default_timezone_set('Europe/Paris');

    // AFFICHER LES ERREURS PHP
    // https://www.php.net/manual/fr/function.error-reporting.php
    // https://www.php.net/manual/fr/function.ini-set.php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

}

// A TERME POUR MIEUX SUIVRE L'ORGANISATION MVC
// IL FAUDRAIT SEPARER LES FONCTIONS DANS PLUSIEURS FICHIERS
// require_once "php/model/fonctions.php";
// require_once "php/view/fonctions.php";
// require_once "php/controller/fonctions.php";

// FONCTIONS VIEW

// DECLARER MES FONCTIONS
// JE VEUX MAINTENANT RANGER MON CODE DANS UNE FONCTION
// ETAPE1: DECLARER/DEFINIR LA FONCTION
function afficherGalerie($dossier)
{
    // https://www.php.net/manual/fr/function.glob.php
    // la fonction glob construit le tableau avec les chemins des fichiers .jpg
    // $tableau = glob("assets/img/*.jpg");
    $tableau = glob("assets/$dossier/*.{jpg,gif,png,jpeg}", GLOB_BRACE);
    foreach ($tableau as $indice => $image) {
        // JE VEUX ALTERNER ENTRE blue ET orange
        if ($indice % 2) {
            // SCENARIO orange
            $couleur = "orange";
        } else {
            // SCENARIO blue
            $couleur = "blue";
        }

        echo        // NE PAS OUBLIER echo POUR AFFICHER UN TEXTE PHP
<<<TOTO
        <img class="$couleur" src="$image" alt="photo">

TOTO;

        // AU LIEU DE CONCATENER AVEC .
        // '<img class="' . $couleur . '" src="' . $image . '" alt="photo">'
    }
}


// SI JE VEUX FAIRE DE LA PROGRAMMATION FONCTIONNELLE
// DECLARATION / DEFINITION DE LA FONCTION
function creerMenu()
{
    // ICI JE VAIS RANGER MON CODE
    // ON VA UTILISER UN TABLEAU ASSOCIATIF ET UNE BOUCLE
    $tableauMenu = [
        "accueil"           => "index.php",
        "contact"           => "contact.php",       // PHP EST COOL, ON PEUT LAISSER LA VIRGULE A LA FIN
        "inscription"       => "inscription.php",
        "login"             => "login.php",
        "admin"             => "admin.php",
        "logout"            => "logout.php",
    ];

    foreach ($tableauMenu as $cle => $valeur) {
        echo
<<<CODEHTML
            <a href="$valeur">$cle</a>

CODEHTML;
    }
}


function afficherMenuDynamique ($categorie)
{
    $tabContenu = lireTableSQL("contenu", "ORDER BY datePublication DESC", "WHERE categorie='$categorie'");
    foreach ($tabContenu as $indice => $tabAssoContenu) {
        extract($tabAssoContenu);

        echo
<<<CODEHTML
            <a href="$description">$titre</a>
CODEHTML;
    }
}

// FONCTIONS CONTROLLER

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

// JUSTE UNE SIMPLIFICATION DE MON CODE
function verifierEmail($email)
{
    $longueurEmail      = mb_strlen($email);
    // RENVOIE FALSE SI UN DES TESTS ECHOUE (&&)
    // note: && va arrêter dès qu'un test est FALSE
    return ($longueurEmail > 0) && ($longueurEmail < 160) && filter_var($email, FILTER_VALIDATE_EMAIL);
}


// ATTENTION: LES VARIABLES GLOBALES SONT UTILISEES AU MOMENT DE L'APPEL DE LA FONCTION
function filtrerEmail($name, $nomTable="")
{
    $email              = filtrerInput($name);
    $longueurEmail      = mb_strlen($email);
    // ATTENTION: ON A BESOIN DE $tabErreur DANS LES 2 SCENARIOS
    global $tabErreur;
    // ! => NEGATION
    if (!verifierEmail($email)) {
        // ATTENTION: ON VEUT UTILISER UNE VARIABLE GLOBALE DANS UNE FONCTION
        // JE RAJOUTE UNE NOUVELLE VALEUR DANS LE TABLEAU
        $tabErreur[] = "l'email est incorrect";
    }
    else if ($nomTable != "")
    {
        // LE FORMAT DE L'EMAIL EST BON
        // MAIS JE DOIS VERIFIER EN PLUS QUE L'EMAIL 
        // N'EST PAS DEJA PRESENT DANS LA TABLE SQL $nomTable
        $tabResultat = lireTableSQL($nomTable, "", "WHERE $name = '$email'");
        // ON VEUT QUE LE TABLEAU $tabResultat SOIT VIDE
        if (count($tabResultat) > 0)
        {
            $tabErreur[] = "l'email est déjà utilisé";
        }
    }

    return $email;
}

// ATTENTION: LES VARIABLES GLOBALES SONT UTILISEES AU MOMENT DE L'APPEL DE LA FONCTION
// ON VA UTILISER LA VARIABLE GLOBALE $tabErreur
function filtrerTexte($name, $longueurMin = 1, $longueurMax = 160, $nomTable="")
{
    // PREMIERE SECURITE D'ENLEVER LES CARACTERES DANGEREUX (balises, espaces en trop)
    $texte            = filtrerInput($name);

    // 2e SECURITE: VERIFICATION DES LONGUEURS
    $longueurTexte    = mb_strlen($texte);
    // ATTENTION: $tabErreur EST UNE VARIABLE GLOBALE
    global $tabErreur;
    if ($longueurTexte < $longueurMin) {
        $tabErreur[] = "$name ne doit pas être vide";
    }
    if ($longueurTexte >= $longueurMax) {
        $tabErreur[] = "$name ne doit pas dépasser $longueurMax caractères";
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
            $tabErreur[] = "$name est déjà utilisé";
        }
    }
    return $texte;
}

// CONVERTIR LE TEXTE EN NOMBRE
function filtrerNombre ($name)
{
    $texte            = filtrerInput($name);
    $nombre           = intval($texte);
    return $nombre;
}


// https://stackoverflow.com/questions/1017599/how-do-i-remove-accents-from-characters-in-a-php-string
// fonction qui convertit les caractères accuentués en version sans accents
function str_without_accents($str, $charset = 'utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

    return $str;   // or add this : mb_strtoupper($str); for uppercase :)
}

function filtrerUpload($nameInput)
{
    $cheminFichierUpload = "";

    // DOSSIER CIBLE
    $dossierUpload = "assets/upload";

    // debug
    // print_r($_FILES);
    // $_FILES EST UN TABLEAU ASSOCIATIF DE TABLEAU ASSOCIATIF
    // QUI SERT UNIQUEMENT AUX FICHIERS UPLOADES PAR UN FORMULAIRE
    // LES CLES DE CE TABLEAU ASSOCIATIF SONT LES ATTRIBUTS name DU HTML
    // <input type="file" name="photo">

    // https://www.php.net/manual/fr/function.isset.php
    if (isset($_FILES[$nameInput])) {
        extract($_FILES[$nameInput]);
        // CREE LES VARIABLES AVEC LES CLES
        // $error       // SI != 0 IL Y A EU UNE ERREUR...
        // $tmp_name    // NOM EN QUARANTAINE
        // $name        // NOM D'ORIGINE DU FICHIER
        // $type        // PAS FIABLE CAR BASE SUR L'EXTENSION ET PAS LE CONTENU
        // $size        // EN OCTETS

        // ON VA SE PROTEGER UN PEU PLUS
        global $tabErreur;
        if ($error != 0) {
            $tabErreur[] = "erreur pendant l'upload";
        }

        $listExtensionOK = ["jpg", "jpeg", "png", "gif", "svg"];
        // https://www.php.net/manual/fr/function.pathinfo.php
        // https://www.php.net/manual/fr/function.strtolower.php
        $extensionFichier = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        // https://www.php.net/manual/fr/function.in-array.php
        if (!in_array($extensionFichier, $listExtensionOK)) {
            $tabErreur[] = "extension non autorisée";
        }

        // SIMPLIFICATION DU NOM DU FICHIER
        $filenameFichier = strtolower(pathinfo($name, PATHINFO_FILENAME));
        $filenameFichier = strtolower(str_without_accents($filenameFichier));
        $filenameFichier = preg_replace("/[^a-zA-Z0-9]/", "-", $filenameFichier);
        $name = "$filenameFichier.$extensionFichier";

        // SOUVENT SUR VOS ORDINATEURS
        // IL FAUT PARAMETRER LE FICHIER php.ini
        // upload_max_filesize=200M
        // post_max_size=100M
        // ET ENSUITE REDEMARRER LE SERVEUR WEB
        if ($size > 1024 * 1024 * 10)   // 10Mo = 1024 octets * 1024 octets * 10
        {
            $tabErreur[] = "fichier trop volumineux";
        }

        // OK ON ACCEPTE DE PRENDRE LE FICHIER
        if (count($tabErreur) == 0) {
            // OK JE PRENDS LE FICHIER ET JE LE RANGE DANS LE DOSSIER assets/upload
            // https://www.php.net/manual/fr/function.move-uploaded-file.php
            $cheminFichierUpload = "$dossierUpload/$name";
            // ON DEPLACE LE FICHIER DANS LE BON DOSSIER
            move_uploaded_file($tmp_name, $cheminFichierUpload);
        }
    }
    // JE RENVOIE LE CHEMIN DU FICHIER POUR LE STOCKAGE DANS SQL
    return $cheminFichierUpload;
}


// POUR LES SESSIONS, JE VAIS CREER 2 FONCTIONS
// ecrireSession ($cle, $valeur)
// lireSession ($cle)
// ON CHERCHE DANS LE TABLEAU ASSOCIATIF $_SESSION
// LA VALEUR ASSOCIEE AVEC $cle
function ecrireSession($cle, $valeur)
{
    if (!isset($_SESSION)) {
        // IL FAUT CREER CE DOSSIER AVANT
        // session_save_path("php/model/session");
        session_start();    // CREE LA VARIABLE $_SESSION
    }
    $_SESSION[$cle] = $valeur;
}

function lireSession($cle)
{
    if (!isset($_SESSION)) {
        // IL FAUT CREER CE DOSSIER AVANT
        // session_save_path("php/model/session");
        session_start();    // CREE LA VARIABLE $_SESSION
    }
    $valeur = $_SESSION[$cle] ?? "";

    return $valeur;
}


// FONCTIONS MODELES


// ENSUITE IL FAUT ENVOYER LA REQUETE SQL VERS MySQL
// A FAIRE...
// DEFINITION DE LA FONCTION (à déplacer dans php/mes-fonctions.php...)
function envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur)
{
    // ON NE VA FAIRE LA CONNEXION QUE AU PREMIER APPEL A envoyerRequeteSQL
    static $dbh = null;     // CETTE LIGNE EST EXECUTEE SEULEMENT AU PREMIER APPEL

    if ($dbh == null)
    {
        // C'EST LA PREMIERE FOIS
        // => JE DOIS FAIRE LA CONNEXION
        // ENTRE FONCTIONNEL (mysqli) ET OBJET (PDO)
        // => ON VA CHOISIR PDO QUI EST LA MANIERE STANDARD DESORMAIS
        // PHP Data Object
        // https://www.php.net/manual/fr/book.pdo.php
        // https://www.php.net/manual/fr/pdo.construct.php
        // Data Source Name
        // VOTRE HEBERGEUR VA VOUS FOURNIR LES INFOS DE CONNEXION
        // POUR COMMUNIQUER ENTRE PHP ET SQL
        // IL FAUT SE CONNECTER AVEC UN LOGIN ET UN MOT DE PASSE
        $user       = "root";
        $password   = "";
        $database   = "cms";           // ATTENTION: NE PAS OUBLIER DE CHANGER LA DATABASE
        $hostname   = "127.0.0.1";      // "localhost"

        $dsn        = "mysql:dbname=$database;host=$hostname;charset=utf8";
        // EN CREANT UN OBJET A PARTIR DE LA CLASSE PDO
        // => JE CREE LA CONNEXION ENTRE PHP ET MySQL
        // DataBaseHandler => Gestionnaire de la Connexion avec la BDD
        // new => PROGRAMMATION ORIENTEE OBJET 
        // (ON FERA TOUT LE MVC EN POO pas seulement la partie Model...)
        // ATTENTION: PDO => PHP Data Object
        $dbh        = new PDO($dsn, $user, $password);
        // => $dbh N'EST PLUS null

        // PARAMETRER PDO POUR LES ERREURS
        // https://www.php.net/manual/fr/pdo.error-handling.php
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        // => LES ERREURS SQL SERONT REMONTEES VERS PHP
        // ET SERONT AFFICHEES COMME DES ERREURS PHP (RECTANGLE ORANGE...)
    }

    // ENSUITE ON PEUT ENVOYER LA REQUETE SQL
    // VERSION 1: ELLE NE SERA PAS PROTEGEE CONTRE LES ATTAQUES PAR INJECTION SQL
    // QUICK AND DIRTY
    // https://www.php.net/manual/fr/pdo.exec.php
    // EXECUTER LA REQUETE SQL
    // $dbh->exec($codeSQL);
    // => ATTAQUE PAR INJECTION SQL

    // LA MANIERE PLUS SECURISEE
    // => REQUETES PREPAREES
    // https://www.php.net/manual/fr/pdo.prepare.php
    // EN JS objet.methode()
    // EN PHP $objet->methode()
    $pdoStatement = $dbh->prepare($requetePrepareeSQL);
    // https://www.php.net/manual/fr/pdostatement.execute.php
    $pdoStatement->execute($tabAssoColonneValeur);

    // SI ON A FAIT UN INSERT ALORS ON PEUT RECUPERER lastInsertId
    // https://www.php.net/manual/fr/pdo.lastinsertid.php
    // J'EMBARQUE lastInsertID EN CLANDESTIN DANS $pdoStatement
    $pdoStatement->lastInsertID = $dbh->lastInsertId();

    // POUR FAIRE DE LA LECTURE J'AURAI BESOIN DE CONTINUER A UTILISER $pdoStatement
    return $pdoStatement;
}

// CALCULE LE NOMBRE DE LIGNES DANS LA TABLE SQL $nomTable
function countSQL ($nomTable)
{
    // https://sql.sh/fonctions/agregation/count
    $requetePrepareeSQL = 
<<<CODESQL

SELECT count(*) FROM $nomTable

CODESQL;

    $pdoStatement = envoyerRequeteSQL($requetePrepareeSQL, []);
    // https://www.php.net/manual/fr/pdostatement.fetchcolumn.php
    $resultat = $pdoStatement->fetchColumn();

    return $resultat;
}

// ON VA CREER UNE FONCTION QUI VA PRENDRE EN PARAMETRES
// $nomTable
// $tabAssoColonneValeur
function insererLigneSQL($nomTable, $tabAssoColonneValeur)
{
    // ON VA CONSTRUIRE LA REQUETE A PARTIR DES CLES DU $tabAssoColonneValeur
    // $listeColonne = "nom, email, message, dateMessage, ip";
    // $listeToken = ":nom, :email, :message, :dateMessage, :ip";

    // ON DOIT PARCOURIR LE TABLEAU $tabAssoColonneValeur
    // POUR CONSTRUIRE LES 2 LISTE $listeColonne ET $listeToken
    $listeColonne = "";
    $listeToken = "";
    $indice = 0;  // EN PLUS J'AI BESOIN DE L'INDICE
    foreach ($tabAssoColonneValeur as $colonne => $valeur) {
        if ($indice > 0) {
            // JE NE SUIS PAS SUR LE PREMIER
            $listeColonne   .= ", $colonne";
            $listeToken     .= ", :$colonne";
        } else {
            // JE SUIS SUR LE PREMIER
            $listeColonne   .= "$colonne";
            $listeToken     .= ":$colonne";
        }
        // INCREMENTER L'INDICE
        $indice++;
    }

    $requetePrepareeSQL =
<<<CODESQL

INSERT INTO $nomTable
( $listeColonne )
VALUES
( $listeToken )
CODESQL;


    // JE PEUX APPELER LA FONCTION envoyerRequeteSQL
    $pdoStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

    // DANS LE CAS OU J'AI BESOIN DE RECUPERER PLUS D'INFORMATIONS
    return $pdoStatement;
}


// ON VA DECLARER UNE FONCTION POUR LIRE DANS UNE TABLE SQL
function lireTableSQL($nomTable, $ligneTri, $clauseWhere="", $tabAssoColonneValeur = [])
{
    // CODE PHP QUI VA CONSTRUIRE LA LISTE DES RECETTES EN HTML
    // READ
    // SELECT * FROM recettes
    $requetePrepareeSQL =
<<<CODESQL

SELECT * FROM $nomTable
$clauseWhere
$ligneTri

CODESQL;

     // PAS DE JETON
    // JE RECUPERE $pdoStatement POUR POUVOIR CONTINUER A RECUPERER LES RESULTATS DE LA REQUETE
    $pdoStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    // JE VAIS RECUPERER TOUTES LES LIGNES DE RESULTATS D'UN COUP AVEC fetchAll
    // ET EN PHP, JE VAIS OBTENIR UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
    // https://www.php.net/manual/fr/pdostatement.fetch.php
    // => ON NE VEUT QU'UN TABLEAU ASSOCIATIF
    $tabResultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    // RENVOYER LE TABLEAU DES RESULTATS
    return $tabResultat;
}


// ON PEUT DONNER DES VALEURS PAR DEFAUT AUX PARAMETRES
function supprimerLigneSQL($nomTable, $valeurColonne, $nomColonne = "id")
{
    // POUR ME PROTEGER UN PEU PLUS CONTRE LES HACKERS
    // ON PEUT CONVERTIR EN NOMBRE
    // https://www.php.net/manual/fr/function.intval.php
    // $id = intval($id);

    // ATTENTION: ON NE MET PAS DE TOKEN POUR LE NOM DE LA TABLE
    // => ATTAQUE PAR INJECTION SQL POSSIBLE
    //      SI $nomTable VIENT DE L'EXTERIEUR
    // https://www.php.net/manual/fr/function.preg-replace.php
    // EXPRESSION REGULIERE [^a-zA-Z0-9]
    // REGULAR EXPRESSION (REGEXP)
    // ON ENLEVE LES CARACTERES QUI NE SONT PAS DES LETTRES OU DES CHIFFRES 
    // https://regex101.com/
    $nomTable = preg_replace("/[^a-zA-Z0-9]/", "", $nomTable);

    $requetePrepareeSQL =
<<<CODESQL

DELETE FROM $nomTable
WHERE $nomColonne = :$nomColonne

CODESQL;

    $tabAssoColonneValeur = ["$nomColonne" => $valeurColonne];

    $pdoStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

    // AU BESOIN JE RENVOIE $pdoStatement
    return $pdoStatement;
}


function updateLigneSQL($nomTable, $id, $tabAssoColonneValeur)
{
    // ME PROTEGER EN CONVERTISSANT $id EN NOMBRE
    // $id             = intval($id);

    /*

UPDATE recettes
SET
titre = :titre, description = :description, ingredients = :ingredients
WHERE
id = :id

        */
    // ON VA CONSTRUIRE LA LISTE COLONNE TOKEN EN PARCOURANT LES CLES DU TABLEAU ASSOCIATIF
    $listeColonneToken = "";
    // ON FAIT UNE BOUCLE
    $compteur = 0;
    foreach ($tabAssoColonneValeur as $nomColonne => $valeur) {
        if ($compteur > 0) {
            // ON N'EST PAS SUR LE PREMIER
            $listeColonneToken .= ", $nomColonne = :$nomColonne";
            // $compteur = 1
        } else {
            // ON EST SUR LE PREMIER
            $listeColonneToken .= "$nomColonne = :$nomColonne";
            $compteur++;    // $compteur = 1
        }
    }

    $requetePrepareeSQL =
<<<CODESQL

UPDATE $nomTable
SET
$listeColonneToken
WHERE
id = :id

CODESQL;

    // JE RAJOUTE LE TOKEN DANS LE TABLEAU ASSOCIATIF POUR $id
    $tabAssoColonneValeur["id"] = $id;

    $pdoStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    return $pdoStatement;
}
