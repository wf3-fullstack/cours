<?php

// DECLARATION DE LA FONCTION
function configurerProjet ()
{
    // https://www.php.net/manual/fr/function.date-default-timezone-set.php
    date_default_timezone_set('Europe/Paris');

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
    return filter_var($email, FILTER_VALIDATE_EMAIL);
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
    $database   = "sql01";
    $hostname   = "127.0.0.1";  // "localhost"

    $dsn        = "mysql:dbname=$database;host=$hostname;charset=utf8";
    // EN CREANT UN OBJET A PARTIR DE LA CLASSE PDO
    // => JE CREE LA CONNEXION ENTRE PHP ET MySQL
    // DataBaseHandler => Gestionnaire de la Connexion avec la BDD
    // new => PROGRAMMATION ORIENTEE OBJET
    $dbh        = new PDO($dsn, $user, $password);

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



?>