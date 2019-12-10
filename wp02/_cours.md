## WORDPRESS DEVELOPPEUR


### INSTALLER UN 2E WORDPRESS DANS UN DOSSIER wordpress2

    INSTALLER DE ZERO (PAS DE COPIER COLLER...)
    UN NOUVEAU SITE wordpress2/
    AVEC UNE DATABASE MySQL wordpress2
    (AVEC LE CHARSET utf8mb4_general_ci)

    ET PARAMETRER LE SITE 
    * TITRE DU SITE Mon Portfolio
    * DESACTIVER LES COMMENTAIRES
    * VERIFIER LES PERMALIENS
    * DESACTIVER LE REFERENCEMENT (SI CA N'A PAS ETE FAIT LORS DE L'INSTALLATION)

    ENSUITE CREER UN MENU POUR 3 PAGES
    Accueil
    Compétences
    Actus
    Contact

    * METTRE LA PAGE D'ACCUEIL EN RACINE DU SITE
    * ET LA PAGE Actus EN PAGE DES ARTICLES
    * ET ENSUITE AJOUTER UN PARAGRAPHE DE TEXTE SUR CHAQUE PAGE
        (SAUF LA PAGE Actus... qui affiche les articles...)

    => UN CMS EST CENTRE SUR LE CONTENU
    => IL FAUT UN MINIMUM DE CONTENU POUR POUVOIR COMMENCER A TRAVAILLER
        (SINON IL N'Y A RIEN A AFFICHER...)


    long-hai
    HP(92v4OQBXJZ9gXVE

## STRUCTURE DES FICHIERS WORDPRESS

    LE FICHIER wp-config.php
    EST LE FICHIER QUI CONTIENT LES INFOS DE CONNEXION A LA DATABASE MySQL
    => CE FICHIER A ETE CREE LORS DE L'INSTALLATION
        (PAS PRESENT DANS L'ARCHIVE zip)

    wp-admin/       => TOUT LE CODE DE LA PARTIE ADMIN (BACK-OFFICE...)
                        => NE JAMAIS MODIFIER CE CODE DIRECTEMENT
    wp-includes/    => TOUT LE CODE DE WORDPRESS
                        => NE JAMAIS MODIFIER CE CODE DIRECTEMENT
    wp-content/             => TOUS LES FICHIERS SPECIFIQUES A VOTRE SITE
    wp-content/uploads/     => TOUS LES FICHIERS UPLOADES DANS WORDPRESS
    wp-content/plugins/     => LE DOSSIER QUI CONTIENT LE CODE DES PLUGINS DE NOTRE SITE
    wp-content/themes/      => LE DOSSIER QUI CONTIENT LE CODE DES THEMES DE NOTRE SITE


## CREER SON THEME DE ZERO DANS WORDPRESS

    COMBO TRES PUISSANT
    => LAISSER LE CLIENT UTILISER LE BACK-OFFICE
    => LAISSER LE DEVELOPPEUR CODER LE HTML, CSS ET JS QU'IL VEUT

    CHAQUE THEME EST DANS SON DOSSIER wp-content/themes/

    CREER UN NOUVEAU DOSSIER wp-content/themes/supersupertheme/

    VOTRE INSTINCT DE DEVELOPPEUR VOUS DONNE COMME INDICE
    => IL FAUDRAIT CREER UN FICHIER style.css
    => DIRECTEMENT DANS LE DOSSIER 
            wp-content/themes/supersupertheme/style.css

    => WORDPRESS DEMANDE ENSUITE UN FICHIER index.php
    => DIRECTEMENT DANS LE DOSSIER 
            wp-content/themes/supersupertheme/index.php

    => ON UTILISE MAINTENANT WORDPRESS EN MODE FRAMEWORK
    => IL FAUT CREER DES FICHIERS DANS DES DOSSIERS PRECIS ET AVEC UN NOM OBLIGATOIRE


    => ON PEUT ACTIVER LE THEME
    => SI ON RETOURNE SUR LA PARTIE PUBLIQUE
    => ON A UNE BELLE PAGE TOUTE VIDE
        => IMPORTANT A COMPRENDRE: WORDPRESS DELEGUE COMPLETEMENT LE CODE PUBLIC AU THEME

## DOCUMENTATION OFFICIELLE DE WORDPRESS

    * SITE HISTORIQUE ET DOCUMENTATION OFFICIELLE
    https://codex.wordpress.org/

    * SITE PLUS RECENT DOCUMENTATION SUR LES FONCTIONS DE L'API WORDPRESS
    https://developer.wordpress.org/

    * CREER UN THEME
    https://codex.wordpress.org/Theme_Development



## AJOUTER DU CODE HTML DANS index.php

    SI ON AJOUTE DU CODE HTML DANS index.php
    => ALORS WORDPRESS L'UTILISE POUR AFFICHER LES PAGES PUBLIQUES
    => TEMPLATE (MODELE DE PAGE...)
    => ON CREE DANS LE THEME DES TEMPLATES 
        ET WORDPRESS UTILISE CES TEMPLATES POUR AFFICHER LES PAGES DU SITE

    => IL FAUT INSERER DANS NOS TEMPLATES DU CODE PHP 
        POUR QUE WORDPRESS PUISSE AUSSI AJOUTER SON CODE DANS NOS TEMPLATES


### wp_head ET wp_footer

    ON UTILISE 2 FONCTIONS DE WORDPRESS 
    POUR PERMETTRE D'AJOUTER LE CODE POUR LE BANDEAU NOIR

    https://codex.wordpress.org/Function_Reference/wp_header

    https://developer.wordpress.org/reference/functions/wp_header/

    https://codex.wordpress.org/Function_Reference/wp_footer

    https://developer.wordpress.org/reference/functions/wp_footer/


## RETROUVER LE MENU POUR NAVIGUER ENTRE LES PAGES

    LES MENUS SONT GERES A 2 ENDROITS DIFFERENTS
    * DECLARATION DES ZONES DE MENU POUR NOTRE THEME
        => CREER UN FICHIER functions.php

    * AFFICHAGE DU MENU DANS LE CODE HTML DES TEMPLATES


## AJOUTER L'AFFICHAGE DU CONTENU DE CHAQUE PAGE

    THE LOOP => LA BOUCLE

    https://codex.wordpress.org/The_Loop


    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 
            //
            // Post Content here
            //
        } // end while
    } // end if


    * VERSION PLUS POPULAIRE:

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post() ?>
                    <?php
                            // POUR LES PAGES, EN FAIT, ON NE PASSE QU'UNE FOIS DANS LA BOUCLE
                            // IMPORTANT: PARCE C'EST the_post QUI FAIT LE READ SQL
                            //
                            // Post Content here
                            // ICI ON PEUT UTILISER LES CONTENUS DES COLONNES DE LA TABLE SQL wp_posts
                            // POUR AFFICHER LE TITRE
                            ?>
                    <h3><?php the_title() ?></h3>
                    <p><?php the_content() ?></p>
                <?php endwhile; ?>
            <?php endif; ?>

## AJOUTER DU CSS ET DU JS

    https://developer.wordpress.org/reference/functions/get_theme_file_uri/

    A UTILISER POUR CHARGER LE CSS, JS, IMAGES, etc...

    EXEMPLES:

    <link rel="stylesheet" href="<?php echo get_theme_file_uri("/style.css") ?>">
    ...
    <img src="<?php echo get_theme_file_uri("/assets/img/photo1.jpg") ?>" alt="">
    ...
    <script src="<?php echo get_theme_file_uri("/assets/js/main.js") ?>"></script>


## CREER PLUSIEURS TEMPLATES DE PAGE


    https://developer.wordpress.org/themes/template-files-section/page-template-files/#file-organization-of-page-templates


    * CREER UN SOUS-DOSSIER page-templates/
    * ON AURA wp-content/themes/supersupertheme/page-templates/
    * DANS CE DOSSIER ON VA AJOUTER LE CODE PHP POUR NOS AUTRES TEMPLATES DE PAGE


## DECOUPER SON CODE EN TRANCHES 

    * CREER UN SOUS-DOSSIER template-parts
    * ON AURA wp-content/themes/supersupertheme/template-parts/

    * ATTENTION: 
    * header.php ET footer.php DOIVENT RESTER DANS LE DOSSIER DU THEME
    * (ET PAS DANS LE DOSSIER template-parts/)

    ON VA RECOMPOSER LES MORCEAUX AVEC LES FONCTIONS DE WORDPRESS

    https://developer.wordpress.org/reference/functions/get_header/
    https://developer.wordpress.org/reference/functions/get_template_part/
    https://developer.wordpress.org/reference/functions/get_footer/


    get_header();
    get_template_part("template-parts/section-index");
    get_footer();


## EXERCICE POUR CET APRES-MIDI

    SOUVENEZ VOUS DE FRED...
    ET RETROUVER UNE MAQUETTE HTML ET CSS (ET JS)
    => TRANSFORMER CETTE MAQUETTE EN THEME WORDPRESS

    * POSSIBILITES

    * CHOIX 1
    * CREER UN NOUVEAU THEME DE ZERO
    (PERMET DE GARDER LE CODE DE supersupertheme...)

    * CHOIX 2
    * CONTINUER A CODER DANS supersupertheme/
    (MON CODE DE REFERENCE EST AUSSI DISPONIBLE...)


## COMMENT MIGRER SON SITE WORDPRESS

    PAR EXEMPLE DE localhost VERS SON HEBERGEMENT

    CONSEIL
    UTILISER L'EXTENSION DUPLICATOR

    https://fr.wordpress.org/plugins/duplicator/

    * TUTORIELS EN LIGNE...
    https://wpformation.com/migrer-wordpress-duplicator/





