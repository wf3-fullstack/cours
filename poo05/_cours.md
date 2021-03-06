## COURS POO JOUR 05


## EXERCICES SUR LES RELATIONS

SI ON A 2 TABLES SQL
    content
        id
        titre
        ...
        id_user     INT     (CLE ETRNAGERE VERS user)

    user
        id              INT             INDEX=PRIMARY       A_I
        email           VARCHAR(160)
        login           VARCHAR(160)
        password        VARCHAR(160)
        level           INT
        dateCreation    DATETIME
        ...

    * ONE TO MANY

    UNE LIGNE DE content EST CREEE PAR **UN** SEUL user     => ONE
    UN USER PEUT CREER **PLUSIEURS** LIGNES DE content      => MANY 

    ONE TO MANY
    => RAJOUTER UNE COLONNE DE CLE ETRANGERE SUR LA TABLE content
            id_user     INT     (CLE ETRANGERE VERS user)


    ON VEUT AFFICHER LA LISTE DES CONTENUS DANS LA categorie="blog"
    ET ON VEUT AUSSI AFFICHER LE login DE L'AUTEUR DU CONTENU

    https://sql.sh/cours/jointures/inner-join

        SELECT *
        FROM table1
        INNER JOIN table2 
        ON table1.id = table2.fk_id


        SELECT *
        FROM content 
        INNER JOIN user 
        ON content.id_user = user.id
        WHERE categorie='blog'


    * MANY TO MANY

    EXEMPLE: 
    UN USER PEUT LAISSER UN LIKE SUR **PLUSIEURS** CONTENUS => MANY
    UN CONTENU PEUT AVOIR DES LIKES DE **PLUSIEURS** USERS  => MANY

    MANY TO MANY
    => TABLE INTERMEDIAIRE DE JOINTURE
            content_user
    id              INT         INDEX=PRIMARY       A_I
    id_user         INT         (CLE ETRANGERE VERS user)
    id_content      INT         (CLE ETRANGERE VERS content)


    ON VEUT FAIRE UNE JOINTURE EN MANY TO MANY
    ENTRE 3 TABLES
        content         
        content_user
        user

        ET ON NE VEUT SELECTIONNER QUE LES CONTENUS DANS categorie='blog'
    REQUETE SQL:

    SELECT *
    FROM content_user
    INNER JOIN content 
    ON content_user.id_content = content.id 
    INNER JOIN user
    ON content_user.id_user = user.id
    WHERE content.categorie = 'blog'


## TABLES SQL


    CREATE TABLE `content` (
    `id` int(11) NOT NULL,
    `filename` varchar(160) NOT NULL,
    `titre` varchar(160) NOT NULL,
    `contenuPage` text NOT NULL,
    `photo` varchar(160) NOT NULL,
    `datePublication` datetime NOT NULL,
    `categorie` varchar(160) NOT NULL,
    `template` varchar(160) NOT NULL,
    `id_user` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


    CREATE TABLE `user` (
    `id` int(11) NOT NULL,
    `email` varchar(160) NOT NULL,
    `login` varchar(160) NOT NULL,
    `password` varchar(160) NOT NULL,
    `level` int(11) NOT NULL,
    `dateCreation` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


    CREATE TABLE `content_user` (
    `id` int(11) NOT NULL,
    `id_content` int(11) NOT NULL,
    `id_user` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


    --
    -- Index pour la table `content`
    --
    ALTER TABLE `content`
    ADD PRIMARY KEY (`id`);

    --
    -- Index pour la table `content_user`
    --
    ALTER TABLE `content_user`
    ADD PRIMARY KEY (`id`);

    --
    -- Index pour la table `user`
    --
    ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);


## GENERATEUR DE DOCUMENTATION PHP


    https://www.phpdoc.org/


    TELECHARGER LE FICHIER phpDocumentor.phar

    http://phpdoc.org/phpDocumentor.phar

    ET CREER LE DOSSIER doc-cmspoo
    ET ENSUITE LANCER DANS LE TERMINAL LA LIGNE DE COMMANDE SUIVANTE
    POUR ANALYSER LE CODE DANS cmspoo ET PRODUIRE LA DOC DANS doc-cmspoo

    php phpDocumentor.phar -d cmspoo -t doc-cmspoo



