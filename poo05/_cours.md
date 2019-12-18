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



