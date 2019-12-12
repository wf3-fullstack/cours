## COURS SQL JOUR 05

## JOINTURES


    https://sql.sh/cours/jointures

    https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/916084-les-jointures-entre-tables

    DANS CERTAINES SITUATIONS, IL EST INTERESSANT DE POUVOIR 
    MIXER LES DONNEES DE PLUSIEURS TABLES SQL 
    POUR CONSTRUIRE UNE TABLE DE RESULTATS AVEC UN SELECT.


    QUAND ON CREE DES TEMPLATES (MAQUETTES HTML, CSS), 
    => ON VA DETERMINER LES INFOS A AFFICHER DANS CHAQUE PAGE.

    ENSUITE, VOUS ALLEZ FAIRE LE MCD (MODELISATION CONCEPTUEL DES DONNEES)
    => CREER LES TABLES SQL ET LEURS COLONNES

    => REFLECHIR SUR LES REQUETES SELECT NECESSAIRE 
        POUR OBTENIR L'AFFICHAGE DES INFOS DANS CHAQUE TEMPLATE

    (DIVIDE AND CONQUER => DECOUPER ET RECOLLER)


## INNER JOIN

    https://sql.sh/cours/jointures/inner-join

        SELECT *
        FROM table1
        INNER JOIN table2 ON table1.id = table2.fk_id


    EN GENERAL:
    ON PEUT DEMANDER LA JOINTURE ENTRE N'IMPORTE QUELLES COLONNES
    => ATTENTION: ON PEUT OBTENIR DES RESULTATS SANS AUCUN SENS REEL...
    => C'EST VOTRE RESPONSABILITE DE DEV DE BIEN VERIFIER LE SENS DU RESULTAT


    EN PRATIQUE:
    ENTRE 2 TABLES table1 et table2 
    DANS LA PREMIERE TABLE, ON A LA COLONNE id QUI EST LA CLE PRIMAIRE (PRIMARY KEY)
    DANS LA DEUXIEME TABLE, ON A LA COLONNE table1_id QUI EST LA CLE ETRANGERE (FOREIGN KEY)

    POUR AJOUTER PLUS DE SECURITE, SQL PROPOSE UNE CONTRAINTE SUR LES COLONNES DE CLE ETRANGERE => SQL VA VERIFIER QUE LA VALEUR DE id EXISTE DANS LA TABLE table1

    ASTUCE: ATTENDRE LA FIN DU DEV POUR AJOUTER LES CONTAINTES DE CLE ETRANGERES

## LEFT JOIN

    https://sql.sh/cours/jointures/left-join

    SELECT *
    FROM table1
    LEFT JOIN table2 ON table1.id = table2.fk_id


## ET LES AUTRES...

    EN THEORIE, IL Y A PLEIN DE COMBINAISONS POSSIBLES...
    MAIS EN PRATIQUE, ON LES UTILISE ASSEZ RAREMENT...

    https://sql.sh/cours/jointures



## PHP PDO ET JOINTURES 


    PARFOIS, ON AURA BESOIN DE LA COLONNE id DE LA PREMEIERE TABLE SQL DANS LA JOINTURE
    MAIS AVEC PHP ET LES TABLEAUX ASSOCIATIFS, LE COLONNE id DEVIENT UNE CLE QUI DOIT ETRE UNIQUE
    => LA 2E COLONNE id VA ECRASER LA PREMIERE COLONNE id DANS LE TABLEAU ASSOCIATIF EN PHP
    => ASTUCE: AJOUTER UNE COLONNE SUPPLEMENTAIRE DANS LA REQUETE SQL 
                POUR DUPLIQUER LA PREMIERE COLONNE id SOUS UN AUTRE NOM

    SELECT *, table1.id as table1_id
    FROM table1
    LEFT JOIN table2
    ON table1.colonne1 = table2.colonne2


## RELATION ET CARDINALITE ENTRE TABLES SQL

    CARDINALITE => QUANTITE (NOMBRE)

    ONE TO ONE
    ONE TO MANY
    MANY TO MANY

    UNE FOIS QUE VOUS AVEZ DEFINI VOS TABLES SQL
    IL FAUT SE POSER LA QUESTION DES RELATIONS ENTRE LES TABLES 2 PAR 2

    POUR UNE LIGNE DE LA TABLE table1
    COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE table2 ?

    POUR UNE LIGNE DE LA TABLE table2
    COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE table1 ?

    EXEMPLE:

    POUR UNE LIGNE DE LA TABLE utilisateur
    COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE commande ?
    => POUR UN UTILISATEUR IL PEUT Y AVOIR PLUSIEURS COMMANDES
    => UN => PLUSIEURS
    => ONE TO MANY

    POUR UNE LIGNE DE LA TABLE commande
    COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE utilisateur ?
    => POUR UNE COMMANDE IL PEUT Y AVOIR UN SEUL UTILISATEUR
    => ONE TO ONE

    ATTENTION: DANS CERTAINS SCENARIOS LE ZERO EST POSSIBLE
        (OPTIONNEL ET PAS OBLIGATOIRE...)

## ONE TO ONE

    EXEMPLE 
    user ET newsletter
    SUR email
    email UNIQUE DANS user ET newsletter
    AU PLUS ON PEUT ASSOCIER UN email DE user AVEC UN email DE newsletter

    EXEMPLE:

    user ET profil
    UN user A UN profil ASSOCIE
    UN profil A UN user ASSOCIE


    DANS CES 2 CAS, ON PEUT LE GERER AVEC UNE CLE ETRANGERE
    ONE TO MANY: LA COLONNE DE CLE ETRANGERE DOIT ETRE DANS LA TABLE DU MANY
    ONE TO ONE: LA COLONNE DE CLE ETRANGERE SERA DANS LA TABLE "SECONDAIRE"

## MANY TO MANY

    SCENARIO PENIBLE
    => DEMANDE DE CREER UNE TABLE "TECHNIQUE"
    => DETECTER LES RELATIONS MANY-TO-MANY VITE 
        POUR CREER CETTE TABLE SUPPLEMENTAIRE

    EXEMPLE:
    prof ET eleve
    UN prof A PLUSIEURS eleve
    UN eleve A PLUSIEUS prof
    => MANY TO MANY

    => SOLUTION: IL FAUT CREER UNE 3EME TABLE INTERMEDIAIRE
    => ON VA DECOUPER MANY-TO-MANY EN 2 ONE-TO-MANY

    prof_eleve
        id          PRIMARY KEY
        prof_id     FOREIGN KEY VERS prof
        eleve_id    FOREIGN KEY VERS eleve

    prof
        id      nom     
        1       fred
        2       achref
        3       armand
        4       nicolas

    eleve
        id      nom
        1       arnaud
        2       mariama
        3       delhia
        4       fouad

    prof_eleve
        id      prof_id     eleve_id
        1       1           2
        2       1           4
        3       2           2
        4       2           1

    POUR RETOUVER LES RELATIONS, ON VA DEVOIR CREER UNE REQUETE SQL AVEC PLUSIEURS JOINTURES...

    SELECT * 
    FROM prof_eleve
    INNER JOIN prof
    ON prof.id = prof_eleve.prof_id
    INNER JOIN eleve
    ON eleve.id = prof_eleve.eleve_id





## MANY TO MANY COMPLIQUE AVEC DES QUANTITES ET DES QUALITES

    EXEMPLE: MARTINE ET SES RECETTES DE CUISINE


    recette


    ingredient

    POUR UNE recette IL Y A PLUSIEURS ingredient
    POUR UN ingredient ON PEUT L'UTILISER DANS PLUSIEURS recette

    => MANY TO MANY

    MOELLEUX    => 6 oeufs
    TIRAMISU    => 3 oeufs 

    recette
        1       moelleux
        2       tiramisu

    ingredient 
        1       oeufs
        2       farine

    recette_ingredient
        id      recette_id      ingredient_id   quantite    qualite
        1       1               1               6           nombre
        2       2               1               3           nombre
        3       2               2               100         grammes


    EXEMPLE:
    INSTAGRAM

    POUR UN user IL PEUT LAISSER PLUSIEURS APPRECIATIONS SUR photo
    POUR UNE photo IL PEUT Y AVOIR PLUSIEURS APPRECIATIONS DE user
    => MANY TO MANY

    user
        1       john
        2       julie

    photo
        2       vacances
        3       dejeuner

    user_photo
        id      user_id     photo_id    appreciation
        1       1           2           like
        2       1           3           dislike
        3       2           3           like



## EXERCICE PRATIQUE POUR CET APRES MIDI


    CREER UNE DATABASE cmspoo AVEC LE CHARSET utf8mb4_general_ci

    ET ENSUITE CREER LES TABLES SQL

    user
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        email           VARCHAR(160)
        login           VARCHAR(160)
        password        VARCHAR(160)
        dateCreation    DATETIME
        level           INT

    film
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        titre           VARCHAR(160)
        synopsis        TEXT    
        genre_id        INT                                         (CLE ETRANGERE VERS genre)
        user_id         INT                                         (CLE ETRANGERE VERS user)
        critique        TEXT
        dateSortie      DATE

    relation
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        table1_id       INT                                         (ON PERD LA CLE ETRANGERE)
        table1          VARCHAR(160)
        table2_id       INT
        table2          VARCHAR(160)                                (ON PERD LA CLE ETRANGERE)
        quantite        INT
        qualite         VARCHAR(160)

    acteur_film
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        acteur_id       INT                                         (CLE ETRANGERE VERS user)
        film_id         INT                                         (CLE ETRANGERE VERS film)
        personnage      VARCHAR(160)


    acteur_photo
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        acteur_id       INT                                         (CLE ETRANGERE VERS acteur)
        photo_id        INT                                         (CLE ETRANGERE VERS photo)


    acteur
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        nom             VARCHAR(160)
        prenom          VARCHAR(160)
        biographie      TEXT

    film_photo
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        film_id         INT                                         (CLE ETRANGERE VERS film)
        photo_id        INT                                         (CLE ETRANGERE VERS photo)

    photo
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        url             VARCHAR(160)
        description     TEXT

    genre
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        label           VARCHAR(160)
        description     TEXT

    commentaire
        id              INT             INDEX=PRIMARY       A_I     (CLE PRIMAIRE)
        user_id         INT                                         (CLE ETRANGERE VERS user)
        message         TEXT
        datePublication DATETIME
        film_id         INT




    RELATION ENTRE user ET film
    POUR UN user COMBIEN DE film ?
    => ZERO OU UN OU PLUSIEURS          => MANY
    POUR UN film COMBIEN DE user ?
    => UN                               => ONE

    ONE TO MANY
    user ET film


    film
        id      titre
        1       harry potter
        2       le seigneur des anneaux
        3       la cité de la peur

    acteur
        id      nom
        1       robert de niro
        2       alain chabat
        3       louis de funès


    photo
        id      url
        1       robert.jpg
        2       chabat.jpg
        3       chabat2.jpg
        4       funes.jpg

    acteur_film
        id      acteur_id       film_id
        1       1               1    
        2       1               3
        3       2               3
        4       2               2
        5       2               1

    acteur_photo
        id      acteur_id       photo_id        
        1       1               1
        2       2               2
        3       2               3
        4       3               4


    * VERSION PLUS COMPACTE (MAIS HORS SECURITE SQL DE CLES ETRANGERES...)

    relation
        id      table1  table1_id       table2  table2_id
        1       acteur  1               film    1
        2       acteur  1               film    3
        ...
        6       acteur  1               photo   1
        7       acteur  2               photo   2
        ...


    cle_valeur
        id      relation_id     cle     valeur
        1       1               role    john
        2       1               duree   10min
        3       1               prix    meilleur acteur


## AUTRE PROJET A MODELISER

    SI ON VEUT CREER UN SITE DE PETITES ANNONCES

    IL Y A DES UTILISATEURS (ADMIN/MEMBRES)

    TABLE SQL user
        id
        email   
        login
        ...

    TABLE SQL annonce
        id
        titre
        description
        datePublication
        user_id                 CLE ETRANGERE VERS user
        categorie_id            CLE ETRANGERE VERS categorie

    photo
        id
        titre
        url
        user_id                 CLE ETRANGERE VERS user
        annonce_id              CLE ETRANGERE VERS annonce

    categorie
        id
        label
        description
        categorie_id            (PARENT CLE_ETRANGERE VERS categorie)

    commande
        id
        reference
        dateCommande

    annonce_commande (panier)
        id
        annonce_id
        commande_id


    

