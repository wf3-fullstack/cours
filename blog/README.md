## PROJET SITE BLOG

    DU BLOG ON IRA VERS LE CMS
    (HISTOIRE DE WORDPRESS)

    C'EST UN SITE OU L'AUTEUR DU SITE PEUT SE CONNECTER A UN ESPACE ADMIN
    ET DANS CET ESPACE ADMIN, L'AUTEUR PEUT CREER DES ARTICLES

    SUR LA PARTIE PUBLIQUE DU SITE, SUR LA PAGE blog.php, 
    LES VISITEURS POURRONT VOIR LES ARTICLES.
    EN PLUS CHAQUE ARTICLE AURA SA PROPRE PAGE


* PERSONA CLIENT

2 JOURNALISTE           QUI VEUT PUBLIER SON MAGAZINE
5 PERSONNE              QUI VOUDRAIT PUBLIER DES PHOTOS DE VOYAGE
0 ECRIVAIN              QUI VOUDRAIT PUBLIER DES NOUVELLES OU DES ARTICLES
2 ARTISTE               QUI VEUT PUBLIER SES CREATIONS
==> 6 CUISINIERE        QUI VEUT PUBLIER DES RECETTES
1 ASSOCIATION           QUI VEUT PUBLIER POUR COMMUNIQUER AVEC SES ADHERENTS
0 EDITEUR LIVRES        QUI VEUT PUBLIER LES NOUVELLES SORTIES OU LES SALONS
0 INFLUENCEUSE/EUR      QUI VEUT UN BLOG DE MODE OU DE SORTIES


ON VA FAIRE UN SITE POUR UNE CUISINIERE 
Martine
39 ans
A LA CAMPAGNE
martine-cuisine.fr

ELLE VEUT PUBLIER DES RECETTES DE CUISINE SUR SON SITE


* PERSONA VISITEURS (1 OU 2)

DES ETUDIANTS DE 15-30 ANS
QUI VIVENT EN VILLE
ETUDIANTS AVEC BUDGET RESTREINT 
ET QUAND MEME BIEN SE NOURRIR

* ANALYSE DES BESOINS ET CAHIER DES CHARGES

accueil                             index.php
recettes                            recettes.php
* CHAQUE RECETTE AURA SA PAGE       recette.php
contact                             contact.php
login                               login.php
admin-recettes                      admin-recettes.php (A PROTEGER)
credits                             credits.php
mentions-legales                    mentions-legales.php

* FORMULAIRES

formulaire de newsletter
formulaire de contact
formulaire de login
formulaire de création de recettes
formulaire de commentaire pour une recette
formulaire de recherche d'une recette (ajax sur la page recettes)

## FORMULAIRES ET BASES DE DONNEES

DANS PHPMYADMIN:
* CREER UNE BASE DE DONNEES (BDD)     
    blog
    utf8mb4_general_ci
* (note: sur un vrai hébergement, la création de la BDD sera dans l'espace client...)


* ENSUITE DANS LA BDD blog, ON VA CREER LES TABLES SQL
* ON VA COMMENCER PAR LA TABLE newsletter
        ET COMME COLONNES
    id                  INT             INDEX=PRIMARY       A_I (AUTO_INCREMENT)
    nom                 VARCHAR(160)
    email               VARCHAR(160)
    dateInscription     DATETIME

* ON VA COMMENCER PAR LA TABLE contact
        ET COMME COLONNES
    id                  INT             INDEX=PRIMARY       A_I (AUTO_INCREMENT)
    nom                 VARCHAR(160)
    email               VARCHAR(160)
    message             TEXT
    dateMessage         DATETIME

* ENSUITE AJOUTER LE CODE HTML SUR LA PAGE accueil
    => DANS LE FICHIER section-index.php
    => POUR DISTINGUER LES FORMULAIRES, NE PAS OUBLIER DE RAJOUTER 
            
            <input type="hidden" name="identifiantFormulaire" value="newsletter">

* ENSUITE AJOUTER LE CODE PHP POUR TRAITER LE FORMULAIRE
    => CREER LE FICHIER traitement.php

    










