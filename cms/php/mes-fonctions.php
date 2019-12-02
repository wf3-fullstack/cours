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
        "accueil"   => "index.php",
        "services"  => "services.php",
        "contact"   => "contact.php",       // PHP EST COOL, ON PEUT LAISSER LA VIRGULE A LA FIN
    ];

    foreach ($tableauMenu as $cle => $valeur) {
        echo
<<<CODEHTML
            <a href="$valeur">$cle</a>

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
function filtrerEmail($name)
{
    $email      = filtrerInput($name);
    $longueurEmail      = mb_strlen($email);
    // ! => NEGATION
    if (!verifierEmail($email)) {
        // ATTENTION: ON VEUT UTILISER UNE VARIABLE GLOBALE DANS UNE FONCTION
        global $tabErreur;
        // JE RAJOUTE UNE NOUVELLE VALEUR DANS LE TABLEAU
        $tabErreur[] = "l'email est incorrect'";
    }
    return $email;
}

// ATTENTION: LES VARIABLES GLOBALES SONT UTILISEES AU MOMENT DE L'APPEL DE LA FONCTION
// ON VA UTILISER LA VARIABLE GLOBALE $tabErreur
function filtrerTexte($name, $longueurMin = 1, $longueurMax = 160)
{
    $texte            = filtrerInput($name);
    $longueurTexte    = mb_strlen($texte);
    // ATTENTION: $tabErreur EST UNE VARIABLE GLOBALE
    global $tabErreur;
    if ($longueurTexte < $longueurMin) {
        $tabErreur[] = "$name ne doit pas être vide";
    }
    if ($longueurTexte >= $longueurMax) {
        $tabErreur[] = "$name ne doit pas dépasser $longueurMax caractères";
    }

    return $texte;
}


// FONCTIONS MODELES


// ENSUITE IL FAUT ENVOYER LA REQUETE SQL VERS MySQL
// A FAIRE...
// DEFINITION DE LA FONCTION (à déplacer dans php/mes-fonctions.php...)
function envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur)
{
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

    // PARAMETRER PDO POUR LES ERREURS
    // https://www.php.net/manual/fr/pdo.error-handling.php
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    // => LES ERREURS SQL SERONT REMONTEES VERS PHP
    // ET SERONT AFFICHEES COMME DES ERREURS PHP (RECTANGLE ORANGE...)

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

    // POUR FAIRE DE LA LECTURE J'AURAI BESOIN DE CONTINUER A UTILISER $pdoStatement
    return $pdoStatement;
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
function lireTableSQL($nomTable, $ligneTri, $clauseWhere="")
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

    $tabAssoColonneValeur = []; // PAS DE JETON
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
