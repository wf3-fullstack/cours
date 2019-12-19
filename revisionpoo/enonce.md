## REVISION POO ET SQL RELATIONS

### TABLE 1

### TABLE 2

### MANY TO MANY TABLE 3 (JOINTURE)


## PROJET 1: SITE MARTINE POUR LES RECETTES

    recette
        id          INT             INDEX=PRIMARY       A_I
        titre       VARCHAR(160)
        description TEXT
        ...

    ingredient
        id          INT                 INDEX=PRIMARY       A_I
        nom
        description
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
        description TEXT

    photo_produit
        id              INT             INDEX=PRIMARY       A_I
        id_photo        INT
        id_produit      INT


## CREER UNE PAGE ADMIN POUR LE CRUD

    CHOISIR UN PROJET
    
    CREER UNE PAGE ADMIN
    ET AJOUTER LES CRUD POUR LES 3 TABLES

    ET ENSUITE SUR UNE PAGE ACCUEIL
    AFFICHER DES JOINTURES

        EXEMPLE:
        AFFICHER LES RECETTES AVEC LEURS INGREDIENTS
        OU
        AFFICHER LES PRODUITS AVEC LEURS PHOTOS






