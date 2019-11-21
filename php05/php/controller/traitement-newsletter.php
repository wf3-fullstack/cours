<?php

// TRAITEMENT DU FORMULAIRE DE NEWSLETTER
// TRAITEMENT DU FORMULAIRE DE CONTACT
$nom        = filtrerInput("nom");
$email      = filtrerInput("email");

// VALIDER L'EMAIL
// https://www.php.net/manual/fr/function.filter-var.php
if (($nom != "")
    && verifierEmail($email)
) {
    // CSV Comma Separated Value
    $contenuMessage =
        <<<TEXTEAMOI
$nom,$email

TEXTEAMOI;

    // ON STOCKE LE MESSAGE DANS UN FICHIER php/model/contact.txt
    // file_put_contents("php/model/newsletter.csv", $contenuMessage, FILE_APPEND);
    // AU LIEU DE STOCKER DANS UN FICHIER, JE VAIS AJOUTER UNE LIGNE DANS LA TABLE SQL newsletter
    // EN PHP
    // JE DOIS CREER LE CODE SQL POUR INSERER UNE LIGNE
    // https://www.php.net/manual/fr/function.date.php
    // note: on pourra paramétrer PHP sur un fuseau horaire
    $dateInscription = date("Y-m-d H:i:s"); // DATETIME SQL 2019-11-21 12:27:00
/*
    $codeSQL =
<<<CODESQL

INSERT INTO newsletter 
( nom, email, dateInscription ) 
VALUES 
( '$nom', '$email', '$dateInscription');

CODESQL;
*/

    $requetePrepareeSQL =
<<<CODESQL

INSERT INTO newsletter 
( nom, email, dateInscription ) 
VALUES 
( :nom, :email, :dateInscription );

CODESQL;
    // SQL FERA LE REMPLACEMENT DU TOKEN (JETON) PAR LA VALEUR
    // ET VA BLOQUER LA MODIFICATION DE LA REQUETE
    $tabAssoColonneValeur = [
        "nom"               => $nom,
        "email"             => $email,
        "dateInscription"   => $dateInscription,            
    ];

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

    // APPELER LA FONCTION
    envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);


    // J'ENVOIE 
    @mail("webmaster@monsite.fr", "vous avez un nouveau inscrit", $contenuMessage);

    $tabAsso["reponseServeur"]      = "merci pour votre inscription $nom ($email)";
} else {
    // REPONDRE AVEC UN MESSAGE D'ERREUR
    $tabAsso["reponseServeur"]      = "arrete de hacker mon site";
}
