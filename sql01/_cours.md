## COURS SQL 01

    FLAT FILES (FICHIERS PLATS)
    => SIMPLE MAIS VITE LIMITE EN UTILISATION

    (exemple: php/model/contact.txt, php/model/newsletter.csv)

    ON VA DELEGUER LE TRAVAIL A SQL 
    => SQL AURA SES PROPRES FICHIERS

    SQL EST DE 1974
    UNE GENERATION AVANT LES LANGAGES DU WEB (PHP, JS => 1994,1995)

    Structured
    Query
    Language

    => LANGAGE DE REQUETES STRUCTUREES

    ON UTILISE LE PROGRAMME MySQL (ou MariaDB) QUI VA COMMUNIQUER GRACE AU LANGAGE SQL

    LES BASES DE DONNEES SONT PARTOUT 
    CAR ELLES STOCKENT LES INFORMATIONS LES PLUS IMPORTANTES DU MONDE ACTUEL

    ORACLE EST UNE DES ENTREPRISES LES PLUS IMPORTANTES ACTUELLEMENT
    => VENDENT DES LICENCES EN MILLIONS DE DOLLARS PAR CPU...

    MySQL A LA BASE C'EST UN PROJET COMMUNAUTAIRE ET OPEN SOURCE
    EN 2009, ORACLE A RACHETE MySQL

    UNE PARTIE DE LA COMMUNAUTE A PREFERE GARDER SON INDEPENDANCE
    => MariaDB



## SUPPORT DE COURS SQL

    * SITE EN FRANCAIS (cool...)

        https://sql.sh/

    ATTENTION: IL Y A DES VARIANTES AU LANGAGE SQL

    (nous on va utiliser la variante MySQL...)


## ORGANISATION ET STRUCTURE D'UNE BASE DE DONNEES


    BASE DE DONNEES 
    BDD
    DATABASE

    ON VA CREER UNE BASE DE DONNEES PAR PROJET

    DANS UNE BASE DE DONNEES (BDD)
        ON VA POUVOIR CREER DES TABLES
            CHAQUE TABLE VA PERMETTRE DE STOCKER UN ENSEMBLE D'INFORMATIONS COHERENTES
            par exemple: 
                on aura une table contact 
                et une 2e table newsletter

        DANS CHAQUE TABLE, ON VA DEFINIR DES COLONNES
        CHAQUE COLONNE SERT A STOCKER UNE INFORMATION DIFFERENTE D'UNE AUTRE COLONNE

        exemple: pour la table contact
            nom             => 1 colonne
            email           => 1 colonne
            message         => 1 colonne

        CHAQUE LIGNE DANS LA TABLE SERA UN JEU DE DONNEES

## PHPMYADMIN: OUTIL POUR MIEUX VISUALISER LES BASES DE DONNEES


    NORMALEMENT: SI VOTRE SERVEUR WEB EST COMPLET
    VOUS AVEZ DEJA PHPMYADMIN

    http://localhost/phpmyadmin/


    SI ON VOUS DEMANDE UN LOGIN
    login:          root
    mot de passe:   (vide)


    CREER UNE BDD 
    AVEC LE NOM sql01
    ET CHOISIR LE CHARSET utf8mb4_general_ci


    SUIVANT LES HERBERGEURS, ON AURA UN QUOTA DE BDD 
    ET CHAQUE BDD AURA AUSSI UN QUOTA DE STOCKAGE (1Go)

    ON VA CREER LA TABLE newsletter

    ET IL FAUT CHOISIR LE NOMBRE DE COLONNES

        id              INT     PRIMARY A_I (AUTO_INCREMENT)
                                            => SQL VA GERER UN NUMERO UNIQUE POUR CHAQUE LIGNE    
            => COLONNE TECHNIQUE QU'ON VA CREER POUR CHAQUE TABLE
        nom
        email
        dateInscription


    ON VA CREER LA TABLE contact

        id      => COLONNE TECHNIQUE QU'ON VA CREER POUR CHAQUE TABLE
        nom             VARCHAR(160)
        email           VARCHAR(160)
        message         TEXT
        dateMessage     DATETIME
        ip              VARCHAR(160)

    ON VA CREER LA TABLE user

        id          => COLONNE TECHNIQUE QU'ON VA CREER POUR CHAQUE TABLE
        username
        email
        nom

    ATTENTION: LOI RGPD => BIEN LIRE LE SITE DE LA CNIL

    https://www.cnil.fr/fr/rgpd-par-ou-commencer



    MODELISATION CONCEPTUELLE DE LA BASE DE DONNEES (MCD)
    (IL Y A PLUS DE CHOSES A FAIRE... RELATIONS ET CARDINALITE... etc...)

    ENSUITE VERIFIER SI LA STRUCTURE DES COLONNES EST CORRECTE

## INSERTION D'UNE LIGNE DANS LA TABLE newsletter

    * CODE SQL POUR INSERER UNE LIGNE
    * https://sql.sh/cours/insert-into


    INSERT INTO `newsletter` 
    (`id`, `nom`, `email`, `dateInscription`) 
    VALUES 
    (NULL, 'test1156', 'mail1156@mail.me', '2019-11-21 06:00:00');

    * ON PEUT SIMPLIFIER CE CODE SQL

    INSERT INTO newsletter 
    ( nom, email, dateInscription ) 
    VALUES 
    ( 'test l\'article1156', 'mail1156@mail.me', '2019-11-21 06:00:00');


    IMPORTANT: GESTION DU AUTO_INCREMENT
    SQL DONNE UN NUMERO A PARTIR DE 1 ET CONTINUE A INCREMENTER A CHAQUE NOUVELLE LIGNE
    (PAS DE RETOUR EN ARRIERE ET PAS DE REMPLISSAGE DES TROUS SI ON EFFACE UNE LIGNE...)

```php
<?php

    // ...

    $codeSQL =
<<<CODESQL

INSERT INTO newsletter 
( nom, email, dateInscription ) 
VALUES 
( '$nom', '$email', '$dateInscription');


CODESQL;

    // ENSUITE IL FAUT ENVOYER LA REQUETE SQL VERS MySQL
    // A FAIRE...


?>
```

## ATTAQUE PAR INJECTION SQL


    // POUR LE MOMENT, JE PRENDS $nom ET $email
    // QUI PROVIENNENT DES VISITEURS
    // ET JE CONSTRUIS UNE REQUETE SQL AVEC
    // => ERREUR: NE JAMAIS FAIRE CONFIANCE A CE QUI VIENT DE L'EXTERIEUR
    // (CHEVAL DE TROIE... SOUVENEZ NOUS DE BRAD PITT...)

    // $codeSQL = "$DEBUT $EXT $FIN";
    // ATTAQUE PAR INJECTION: 
    //    A LA PLACE DE $EXT LE HACKER VA FOURNIR 
    //    $EXT $FIN $XXXX $DEBUT $EXT

    //  "$DEBUT $EXT $FIN"
    //  "$DEBUT $EXT $FIN $XXXX $DEBUT $EXT $FIN"

    /*

    NORMALEMENT: LE FORMULAIRE FOURNIT test1410

    INSERT INTO newsletter 
    ( nom, email, dateInscription ) 
    VALUES 
    ( 'test1410', 'mail1410@mail.me', '2019-11-21 06:00:00');

    LE HACKER VA FOURNIR A LA PLACE


    test1410', 'mail1410@mail.me', '2019-11-21 06:00:00');

    DELETE FROM newsletter;

    INSERT INTO newsletter 
    ( nom, email, dateInscription ) 
    VALUES 
    ( 'test1410



    A B C
    A X C

    A BCXAB C



    */

        $codeSQL =
    <<<CODESQL

    INSERT INTO newsletter 
    ( nom, email, dateInscription ) 
    VALUES 
    ( '$nom', '$email', '$dateInscription');

    CODESQL;


## EXERCICES AVEC SQL

### FORMULAIRE DE NEWSLETTER

    * AVEC PHPMYADMIN
    * CREER UNE DATABASE sql01 (AVEC LE CHARSET utf8mb4_general_ci)
    * CREER UNE TABLE newsletter
    * AJOUTER DANS LA TABLE newsletter LES COLONNES

        id                  INT             PRIMARY     A_I (AUTO_INCREMENT)
        nom                 VARCHAR(160)
        email               VARCHAR(160)
        dateInscription     VARCHAR(160)

    * MODIFIER LE CODE PHP DE TRAITEMENT DU FORMULAIRE DE newsletter
        POUR NE PLUS UTILISER UN FICHIER php/model/newsletter.csv
        MAIS A LA PLACE, ON VA INSERER UNE LIGNE DANS LA TABLE newsletter


### FORMULAIRE DE CONTACT

    * AVEC PHPMYADMIN
    * (SI PAS DEJA FAIT... CREER UNE DATABASE sql01)
    * CREER UNE TABLE contact
    * AJOUTER DANS LA TABLE contact LES COLONNES

        id              INT             PRIMARY     A_I (AUTO_INCREMENT)
        nom             VARCHAR(160)
        email           VARCHAR(160)
        message         TEXT
        dateMessage     DATETIME
        ip              VARCHAR(160)

    * MODIFIER LE CODE PHP DE TRAITEMENT DU FORMULAIRE DE newsletter
        POUR NE PLUS UTILISER UN FICHIER php/model/contact.txt
        MAIS A LA PLACE, ON VA INSERER UNE LIGNE DANS LA TABLE contact


### EXERCICE BONUS: CREER UNE FONCTION insererLigneSQL

    // ON PEUT CREER UNE FONCTION 
    // QUI AJOUTE DANS UNE TABLE $nomTable
    // ET LES VALEURS AVEC LES CLES QUI CORRESPONDENT AU NOM DES COLONNES
    // exemple:
    // insererLigneSQL("newsletter", 
    //                  [   
    //                      "nom"               => "bertrand", 
    //                      "email"             => "bert@nomail.me", 
    //                      "dateInscription"   => "2019-11-21 15:11:00",
    //                  ]);

    function insererLigneSQL($nomTable, $tabAssoColonneValeur)
    {
        // ...
    }



## DIVERS OUTILS

### DESSINS VECTORIELS

* INKSCAPE

    https://inkscape.org/fr/apprendre/animation/


### ANIMATIONS EN JS

    https://animejs.com/documentation/

    https://greensock.com/

    https://phaser.io/examples



























            













