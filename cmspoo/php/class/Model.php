<?php
/**
 * Classe Model
 */

class Model 
{
    // PROPRIETES
    public $database = "cmspoo";        // A CHANGER A CHAQUE PROJET
    public $user     = "root";
    public $password = "";
    public $hostname = "localhost"; // "127.0.0.1"

    
    // ENSUITE IL FAUT ENVOYER LA REQUETE SQL VERS MySQL
    // A FAIRE...
    // DEFINITION DE LA FONCTION (à déplacer dans php/mes-fonctions.php...)
    function envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur)
    {
        // ON NE VA FAIRE LA CONNEXION QUE AU PREMIER APPEL A envoyerRequeteSQL
        static $dbh = null;     // CETTE LIGNE EST EXECUTEE SEULEMENT AU PREMIER APPEL

        if ($dbh == null) {
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
            $user       = $this->user;
            $password   = $this->password;
            $database   = $this->database;           // ATTENTION: NE PAS OUBLIER DE CHANGER LA DATABASE
            $hostname   = $this->hostname;      // "localhost"

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

    // ON VA DECLARER UNE FONCTION POUR LIRE DANS UNE TABLE SQL
    function lireTableSQL($nomTable, $ligneTri, $clauseWhere = "", $tabAssoColonneValeur = [])
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
        $pdoStatement = $this->envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
        // JE VAIS RECUPERER TOUTES LES LIGNES DE RESULTATS D'UN COUP AVEC fetchAll
        // ET EN PHP, JE VAIS OBTENIR UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
        // https://www.php.net/manual/fr/pdostatement.fetch.php
        // => ON NE VEUT QU'UN TABLEAU ASSOCIATIF
        $tabResultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        // RENVOYER LE TABLEAU DES RESULTATS
        return $tabResultat;
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
        $pdoStatement = $this->envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

        // DANS LE CAS OU J'AI BESOIN DE RECUPERER PLUS D'INFORMATIONS
        return $pdoStatement;
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
        $nomTable = preg_replace("/[^a-zA-Z0-9_]/", "", $nomTable);

        $requetePrepareeSQL =
            <<<CODESQL

DELETE FROM $nomTable
WHERE $nomColonne = :$nomColonne

CODESQL;

        $tabAssoColonneValeur = ["$nomColonne" => $valeurColonne];

        $pdoStatement = $this->envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

        // AU BESOIN JE RENVOIE $pdoStatement
        return $pdoStatement;
    }



    function updateLigneSQL($nomTable, $id, $tabAssoColonneValeur)
    {
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

        $pdoStatement = $this->envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
        return $pdoStatement;
    }

}