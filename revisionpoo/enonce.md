## REVISION POO ET SQL RELATIONS

### TABLE 1

### TABLE 2

### MANY TO MANY TABLE 3 (JOINTURE)


## PROJET 1: SITE MARTINE POUR LES RECETTES

    recette
        id          INT                 INDEX=PRIMARY       A_I
        titre       VARCHAR(160)
        description TEXT
        ...

    ingredient
        id          INT                 INDEX=PRIMARY       A_I
        nom         VARCHAR(160)
        conseil     TEXT
        ...

    ingredient_recette
        id              INT             INDEX=PRIMARY       A_I
        id_ingredient   INT
        id_recette      INT
        quantite        VARCHAR(160)


### PROJET 2: SITE ECOMMERCE (LE BON COIN)

    produit
        id              INT             INDEX=PRIMARY       A_I
        titre           VARCHAR(160)
        description     TEXT
        ...

    photo
        id          INT                 INDEX=PRIMARY       A_I
        nom         VARCHAR(160)
        legende     TEXT

    photo_produit
        id              INT             INDEX=PRIMARY       A_I
        id_photo        INT
        id_produit      INT


## CREER UNE PAGE ADMIN POUR LE CRUD



    CHOISIR UN PROJET

    CREER UNE DATABASE revisionpoo
        AVEC CHARSET utf8mb4_general_ci

    ATTENTION: 
    SI VOUS UTILISEZ LE POINT D'ENTREE UNIQUE VERS index.php
    => NE PAS OUBLIER DE CHANGER LE FICHIER .htaccess
    => ET DONNER LE BON DOSSIER POUR LES REWRITE RULES

    ATTENTION2:
    SI VOUS UTLISEZ LA CLASSE View
    => IL FAUT AUSSI CHANGER LES TEXTES "/wf3-fullstack/cmspoo/"

        if ($path == "/wf3-fullstack/cmspoo/") {
            $path = "/wf3-fullstack/cmspoo/index.php";
        }

    CREER UNE PAGE ADMIN
    ET AJOUTER LES CRUD POUR LES 3 TABLES

    AJOUTER DES LIGNES DANS LES 3 TABLES POUR OBTENIR DES JOINTURES

    ET ENSUITE SUR UNE PAGE ACCUEIL
    AFFICHER DES JOINTURES

        EXEMPLE:
        AFFICHER LES RECETTES AVEC LEURS INGREDIENTS
        OU
        AFFICHER LES PRODUITS AVEC LEURS PHOTOS






