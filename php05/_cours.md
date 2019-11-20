## COURS DU MERCREDI 20/11

## DIFFERENCES EN GET ET POST

    * GET
    LIMITE A QUELQUES KO (4Ko SUIVANT LES NAVIGATEURS)
    LES INFOS SONT VISIBLES DANS L'URL
    => JAMAIS D'INFOS CONFIDENTIELLES AVEC GET
        MOT DE PASSE
        NUMERO DE CB
    => LE NAVIGATEUR GARDE LES URLS DANS SON HISTORIQUE

    => UTILE: FACILE DE CONSTRUIRE DES URLS EN GET
            FORGER DES REQUETES GET PLUS FACILEMENT

    * POST
    LIMITE A PLUSIEURS GO
    => ATTENTION: PARAMETRAGE DE PHP php.ini
            SOUVENT LE PARAMETRAGE PAR DEFAUT EST A 2Mo SUR VOS ORDI...
            upload_max_filesize
            post_max_size
            (A VERIFIER)
    => UPLOAD DE FICHIERS (IMAGES)

## EXEMPLES DE FORMULAIRES DANS LES SITES

    AJOUTER LE CODE PHP 
    POUR POUVOIR GERER PLUSIEURS FORMULAIRES SUR UN SITE
    => BIEN ORGANISER SON CODE SUIVANT LE DECOUPAGE MVC

    POUR DISTINGUER LES FORMULAIRES, ON VA AJOUTER UN CHAMP 
    input type="hidden" name="identifiantFormulaire" value="XXX"
    DANS CHAQUE FORMULAIRE
    CE QUI PERMETTRA, EN PHP DE RECUPERER CETTE INFORMATION 
    POUR DISTINGUER LE FORMULAIRE A TRAITER

    BIEN FAIRE ATTENTION: 
    ON MET EN PLACE DES CONVENTIONS DE NOMMAGE ENTRE HTML ET PHP
    => ON EST EN TRAIN DE CONSTRUIRE NOTRE FRAMEWORK

    * formulaire de contact
    * formulaire d'inscription à la newsletter

    ON AURA BESOIN DE LA BASE DE DONNEES SQL POUR DES FORMULAIRES PLUS COMPLEXES

    * formulaire de création de compte              => PAGE inscription.php

    * formulaire de confirmation d'inscription      => PAGE activation.php
            FORMULAIRE QUI DEMANDE UN EMAIL ET LA CLE D'ACTIVATION ASSOCIEE

    * formulaire de login/connexion                 => PAGE login.php

    * formulaire de mot de passe oublié

    * formulaire de changement de mot de passe      => PAGE changement-mot-de-passe.php
            FORMULAIRE QUI DEMANDE email, clé temporaire et le nouveau mot de passe

    * formulaire de commentaire sur une page ou un article
    * formulaire d'évaluation
    * formulaire de recherche                       => PAGE recherche.php
    * formulaire pour valider une commande
    * formulaire de paiement
    * formulaire de publication (article de blog, annonces, photos, videos, etc...)


## BONUS EN JS:

    AMELIORER LE CODE JS 
    POUR POUVOIR ENVOYER LES FORMULAIRES QUI ONT LA CLASSE ajax
    EN AJAX SANS RECHARGER LA PAGE

## CONTINUER LES EXERCICES

    ON POURRA CORRIGER LES EXERCICES PROGRESSIVEMENT


