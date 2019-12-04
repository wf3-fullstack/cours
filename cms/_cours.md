## Content Management System (CMS)

    CMS 
    => en français: Système de Gestion de Contenu
    => Outil de publication de contenu

    => framework + back-office

    frameworks
    * créé par un groupe et additionne à un langage (php + mysql)
    * cadre de travail (frame => cadre, work => travail)
    * architecture logicielle
    * structure de dossiers et sous-dossiers 
        et aussi convention de nommage de fichiers
        qui impose une organisation du code
        => traitement automatique
    * créer une structure pour plus de facilité
    * copier coller
    * => facilite la maintenance évolutive 
        et facilite la collaboration 
        (plusieurs fichiers => git => chaque dev peut travailler sur son fichier sans coder sur celui du voisin)


    UN FRAMEWORK
    bibliothèque de code qui s'appuie sur un (ou plusieurs) langages

    FRAMEWORK MVC
    ORGANISER SON CODE EN 3 PARTIES (MODEL VIEW CONTROLLER)


## NOTRE FRAMEWORK

    cms/
        assets/
        php/
        php/.htaccess       => require all denied
    cms/index.php           => front-office (accessible au public)
    cms/contact.php         => front-office (accessible au public)
    cms/recettes.php
    cms/recette.php?id=123  => un seul template php pour afficher n'importe quelle recette
    cms/...
    cms/admin.php           => back-office (accès réservé au staff)


## ON COMMENCE PAR index.php ET admin.php

    POUR AVOIR LE CODE DU CRUD
    Create      (commencer par coder le Create)
    Read        (il y en a plusieurs/plein...)
    Update      (le pire... le garder pour la fin... copier de Create et Delete avec des problèmes en plus)
    Delete      (on peut en créer un seul pour toutes les tables, il peut y en avoir plusieurs...)

    DANS admin.php ON AURA UN CRUD EN ENTIER
    DANS index.php ON AURA SEULEMENT UN Read

    ORDRE CONSEILLE => C R D U
    Create
    Read
    Delete
    Update

## FORMULAIRE DE CONTACT

### CREER LA DATABASE SQL ET LA TABLE contact

    COMMENCER PAR 
        CREER UNE NOUVELLE DATABASE (Base de données) 
        nom     => cms
        charset => utf8mb4_general_ci

    ENSUITE CREER LA TABLE contact
    AVEC LES COLONNES
    id               INT             INDEX=PRIMARY       A_I (AUTO INCREMENT) 
    email            VARCHAR(160)     
    nom              VARCHAR(160) 
    message          TEXT 
    datePublication  DATETIME   

    NE PAS OUBLIER: 
        EXPORTER LA BASE DE DONNEES EN FICHIER SQL 
        ET DE L'INCLURE DANS LE ZIP AVEC LE CODE PHP


### CREER LE CODE HTML POUR LE FORMULAIRE

    ON FAIT UN SITE DE PLUSIEURS PAGES:
    contact.php     IL Y A UNE PAGE POUR LE FORMULAIRE DE CONTACT

    ENSUITE CREER LE FICHIER 
    cms/traitement.php
    QUI VA RECEVOIR LES INFORMATIONS DE FORMULAIRE

    ENSUITE COPIER LE FICHIER mes-fonctions.php
    cms/php/mes-fonctions.php

    ATTENTION: NE PAS OUBLIER DE CHANGER LES INFOS DE CONNEXION A LA DATABASE

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
        $password   = "";               // ATTENTION AVEC MAMP => "root"
        $database   = "cms";            // ATTENTION: NE PAS OUBLIER DE CHANGER LA DATABASE
        $hostname   = "127.0.0.1";      // "localhost"


    ET ENSUITE UTILISER filtrerInput POUR RECUPERER $identifiantFormulaire


### TRAITEMENT DU FORMULAIRE

    CREER LE FICHIER php/controller/traitement-contact.php


## VISIBILITE ET PORTEE DES VARIABLES


    VARIABLES LOCALES ET GLOBALES EN PHP

    // EN JS, UNE VARIABLE GLOBALE PEUT ETRE UTILISEE DANS UNE FONCTION
    // EXPLICATION: HISTORIQUEMENT, JS ETAIT CONCU POUR ECRIRE DE PETITS PROGRAMMES
    // ET DANS CE CONTEXTE, C'EST PLUS PRATIQUE DE POUVOIR UTILISER UNE VARIABLE PARTOUT
    var texte = 'coucou';

    function afficherMessage ()
    {
        console.log(texte);     // 'coucou'
    }


    // MAUVAISE NOUVELLE
    // PHP FAIT LE CONTRAIRE
    // EXPLICATION: PHP EST UN LANGAGE PREVU POUR DE GROS PROGRAMMES
    // ET AVEC PLEIN DE DEVELOPPEURS
    // DANS CE CONTEXTE, C'EST PLUS PRATIQUE DE RESTREINDRE LA PORTEE DES VARIABLES

    $texte = "coucou";  // VARIABLE GLOBALE

    function afficherMessage ()
    {
        echo $texte;    // ERREUR
        // Notice: Undefined variable: texte in C:\xampp\htdocs\wf3-fullstack\exos\variables-locale.php on line 19
    }

    afficherMessage();

## VARIABLES SUPER GLOBALES, GLOBALES, LOCALES, LOCALES STATIC

    https://www.php.net/manual/fr/reserved.variables.php

    PHP PROPOSE DES VARIABLES SUPER GLOBALES
    => ON PEUT LES UTILISER PARTOUT, CA MARCHE
    => PAR CONTRE, ON NE PEUT PAS CREER DE NOUVELLES VARIABLES SUPER GLOBALES

    $_GET
    $_POST
    $_REQUEST
    $_SERVER
    ...

    ON PEUT CREER DES VARIABLES GLOBALES
    * SOIT ON CREE UNE VARIABLE EN DEHORS DES FONCTIONS
        => DANS CE CAS, ELLE EST GLOBALE

        $texte = "coucou";  // VARIABLE GLOBALE

        function afficherMessage ($param)
        {
            echo $param;    // ERREUR
            // Notice: Undefined variable: texte in C:\xampp\htdocs\wf3-fullstack\exos\variables-locale.php on line 19
        }

        afficherMessage($texte);

    DANS UNE FONCTION, LE PARAMETRES SONT CREES ET DETRUITS A CHAQUE APPEL DE FONCTION
    ET SI ON CREE DES VARIABLES A L'INTERIEUR D'UNE FONCTION, 
    ELLES SONT CREEES ET DETRUITES A CHAQUE APPEL DE LA FONCTION

### PHP PERMET DE GRUGER LES PORTEES DE VARIABLES GLOBALES

    EN PHP, DANS UNE FONCTION, ON PEUT UTILISER UNE VARIABLE GLOBALE
    SI ON LE DIT AVANT AVEC LE MOT global


    $texte = "coucou";  // VARIABLE GLOBALE
    function afficherMessage ()
    {
        // J'ANNONCE QUE JE VAIS UTILISER UNE VARIABLE GLOBALE
        global $texte;

        echo $texte;
    }

    afficherMessage();

### PHP EST TROP SYMPA: ON PEUT CREER DES VARIABLES GLOBALES D'UNE 2E MANIERE


    PHP PROPOSE UNE VARIABLE SUPER GLOBALE
    $GLOBALS

    CETTE VARIABLE CONTIENT UN TABLEAU ASSOCIATIF

    https://www.php.net/manual/fr/reserved.variables.globals.php

    $texte = "coucou";

    // PAREIL QUE SI ON AVAIT ECRIT
    $GLOBALS["texte"] = "coucou2";


    echo $texte;        // "coucou2"

    $texte = "coucou3";

    echo $GLOBALS["texte"]; // coucou3

    // ATTENTION AUSSI AUX $$


### PHP AJOUTE AUSSI LES VARIABLES LOCALES STATIC


    function afficherMessage()
    {
        // VARIABLE LOCALE
        $compteur = 0;
        
        // VARIABLE STATIC LOCALE
        static $compteur2 = 0;      
        // AJOUTER static DIT A PHP D'EXECUTER CE CODE SEULEMENT AU PREMIER APPEL
        // ET EN PLUS LA VARIABLE N'EST PAS DETRUITE A LA FIN DE L'APPEL

        echo "<h1>compteur: $compteur</h1>";
        echo "<h1>compteur2: $compteur2</h1>";

        $compteur++;
        $compteur2++;

        return $compteur2;
    }


    afficherMessage();
    afficherMessage();
    afficherMessage();



## TABLE SQL user


    CREER LA TABLE SQL user
        EN COLONNES
        id                  INT             INDEX=PRIMARY       A_I (AUTO_INCREMENT)
        login               VARCHAR(160)
        email               VARCHAR(160)
        password            VARCHAR(160)
        dateInscription     DATETIME
        level               INT


    note: ON DONNE UN level QUI EST UN NOMBRE
    level=0         => BANNI
    level=10        => MEMBRE
    level=50        => EDITEUR
    level=100       => ADMIN    
    level=1000      => SUPER-ADMIN    


    CREER UNE PAGE cms/inscription.php
    POUR AJOUTER UN FORMULAIRE DE CREATE SUR LA TABLE user

    ENSUITE AJOUTER LE CODE PHP QUI EFFECTUE LE TRAITEMENT DE CE FORMULAIRE

### CRYPTAGE vs HASHAGE

    ATTENTION: OBLIGATOIRE LEGALEMENT DE PROTEGER LES UTILISATEURS...


    https://www.cnil.fr/fr/authentification-par-mot-de-passe-les-mesures-de-securite-elementaires


    CRYPTAGE => NE DETRUIT PAS DE L'INFORMATION => DECRYPTAGE

    HASHAGE => DETRUIT DE L'INFORMATION => EMPECHE LE DECRYPTAGE

    dupont      => HASHAGE: ENLEVER LES VOYELLES => dpnt

    POUR LE LOGIN:
    LE VISITEUR DONNE SON EMAIL ET SON MOT DE PASSE (EN CLAIR)
    => AVEC L'EMAIL, ON PEUT RETROUVER LA LIGNE DANS LA TABLE SQL user 
        (email DOIT ETRE UNIQUE)
    => ON VA HASHER LE MOT DE PASSE ORIGINAL
        ET ON VA COMPARER LES HASHAGES

    POUR COMPLIQUER LA VIE AUX HACKERS,
    PHP AJOUTE UN "GRAIN DE SEL" EN PLUS DU MOT DE PASSE ORIGINAL

    dupont      => dupont + 4545HGFGH => HASH
    dupont      => dupont + 765746HJG => HASH2

    POUR VERIFIER LE MOT DE PASSE, PHP VA RETROUVER LE "GRAIN DE SEL" ET AVEC LE MOT DE PASSE ORIGINAL VA RECREER LE HASHAGE ET COMPARER SI LES 2 CORRESPONDENT



## READ SUR LA PAGE admin SUR LA TABLE user EN AFFICHAGE AVEC BALISE table


    AJOUTER LE CODE PHP POUR AFFICHER LA TABLE user 
    SUR LA PAGE admin.php

    ADAPTER LE BOUTON SUPPRIMER POUR AVOIR UN DELETE SUR LA TABLE user


### OPTIMISATION DE LA FONCTION envoyerRequeteSQL


traitement-user.php

    filtrerTexte
        lireTableSQL
            envoyerRequeteSQL
                $dbh        = new PDO($dsn, $user, $password);
    filtrerEmail
        lireTableSQL
            envoyerRequeteSQL
                $dbh        = new PDO($dsn, $user, $password);
    insererLigneSQL
        lireTableSQL
            envoyerRequeteSQL
                $dbh        = new PDO($dsn, $user, $password);


    ASTUCE: 
    EN UTILISANT UNE VARIABLE static DE FONCTION
    JE PEUX SEULEMENT CREER LA CONNEXION UNE FOIS


## CREATE SUR TABLE SQL contenu

    CREER LA TABLE SQL contenu
    AVEC LES COLONNES
        id              INT             INDEX=PRIMARY       A_I (AUTO_INCREMENT)
        titre           VARCHAR(160)
        photo           VARCHAR(160)
        description     TEXT
        datePublication DATETIME
        categorie       VARCHAR(160)

    SUR LA PAGE admin.php
        AJOUTER UNE SECTION AVEC LE FORMULAIRE CREATE SUR LA TABLE contenu

        POUR LE MOMENT, ON UTILISERA UNE BALISE input type="text" POUR LA COLONNE photo
        (...ON RENTRERA A LA MAIN LE CHEMIN VERS UNE PHOTO assets/upload/photo1.jpg)

        POUR LE MOMENT, POUR LA COLONNE categorie ON PEUT LAISSER UN input type="text"
        (MAIS VOUS POUVEZ CODER UNE BALISE select SI VOUS PREFEREZ...)

    AJOUTER LE CODE PHP POUR LE TRAITEMENT DE CE FORMULAIRE

    ET AUSSI AJOUTER DES PHOTOS DANS assets/upload/

## READ ADMIN SUR LA TABLE contenu

    ET ENSUITE DANS LA PAGE admin.php
    AJOUTER UNE SECTION POUR AFFICHER LES LIGNES DE LA TABLE contenu

## DELETE ADMIN SUR LA TABLE contenu

    SI ON CODE BIEN LE BOUTON supprimer CA MARCHE TOUT SEUL...
    
## READ PUBLIC SUR LA PAGE index.php

    AJOUTER L'AFFICHAGE DES CONTENUS DANS UNE SECTION











































