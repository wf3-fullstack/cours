## COURS SQL 03


### SPA SINGLE PAGE APPLICATION

WEB2.0
WEBAPP
SPA

exemple: google maps, booking.com, airbnb.com, discord, facebook, etc...

=> BEAUCOUP DE JS ET D'AJAX
=> PERMET DE RESTER SUR UNE SEULE PAGE
=> GOOGLE PERMET DE FAIRE CROIRE QU'UNE WEBAPP EST UNE APPLICATION ANDROID

### CREATE DES RECETTES


    * SUR LA PAGE admin-recettes.php
    * CREER LE FORMULAIRE POUR CREATE SUR LA TABLE SQL recettes

    id                  INT             INDEX=primary       A_I (AUTO_INCREMENT)
    titre               VARCHAR(160)
    ingredients         TEXT    
    description         TEXT
    image               VARCHAR(160)
    typeRecette         VARCHAR(160)
    datePublication     DATETIME
    -- OPTIONNEL SI VOUS VOULEZ PLUS CODE --
    urlVideo            VARCHAR(160)
    difficulte          TINYINT
    nbPersonne          TINYINT
    tempsPreparation    TINYINT


## TRI DES RESULTATS EN SQL


SELECT * FROM recettes
ORDER BY datePublication DESC


ASC     => ORDRE CROISSANT (ASCENDANT)
DESC    => ORDRE DECROISSANT (DESCENDANT)