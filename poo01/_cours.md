## POO JOUR 01

    Programmation 
    Orienté
    Objet

    Object
    Oriented
    Programming

    EVOLUTION QUI A SUIVI LA PROGRAMMATION FONCTIONNELLE
    RAPPEL:
    PROGRAMMATION FONCTIONNELLE: 
    JE CREE DES FONCTIONS 
    ET JE RANGE MON CODE DANS CES FONCTIONS
    => PROBLEMATIQUE DE RANGEMENT
    => ORGANISATION DE NOTRE CODE

    => PROBLEME QUI VIENT DU VOLUME DE CODE
    => UN DEVELOPPEUR PEUT ECRIRE 100.000 LIGNES DE CODE/AN

    => DANS LES PROJETS DEPUIS LES ANNEES 90
    => LA POO EST DEVENUE LE STANDARD POUR LES LANGAGES DE PROGRAMMATION

    IDEE:
    ON A BESOIN DE RANGER LES FONCTIONS QU'ON A CREE EN PROGRAMMATION FONCTIONNELLE
    => PROGRAMMATION FONCTIONNELLE < 10.000

    ON VA RANGER NOS FONCTIONS DANS D'AUTRES BOITES...


## PROGRAMMATION PAR CLASSE

    EN FAIT ON DEVRAIT PLUTOT PARLER DE PROGRAMMATION PAR CLASSE
    class
    => GROUPE DE FONCTIONS
    => CONVENTION DE NOMMAGE
    => LE NOM D'UNE CLASSE COMMENCE PAR UNE MAJUSCULE
            ET ENSUITE EN CamelCase

    class GroupeA
    {
        function faireA ()
        {
            // code de la fonction faireA
        }

        function faireB ()
        {
            // code de la fonction faireB
        }

    }

    class GroupeB
    {
        function faireC ()
        {
            // code de la fonction faireC
        }

    }

## MIGRATION ENTRE FONCTIONNEL ET OBJET

    IL Y A DES LANGAGES QUI PERMETTENT 
    D'AVOIR DU CODE FONCTIONNEL 
    ET DU CODE OBJET QUI COHABITENT
    EXEMPLE: C++, PHP, etc...

    VOCABULAIRE:
    UNE FONCTION QUI EST RANGEE DANS UNE CLASSE
    => ON VA APPELER CE CODE => UNE METHODE

    // => ON APPELLE UNE FONCTION
    function faireFonctionnel ()
    {

    }

    class GroupeB
    {
        // METHODE => FONCTION RANGEE DANS UNE CLASSE
        function faireC ()
        {
            // code de la fonction faireC
        }

    }

## APPEL DE METHODES

    // DECLARER/DEFINIR UNE FONCTION
    function afficherTexte ()
    {
        echo "<h1>TITRE1</h1>";
    }

    // POUR EXECUTER LE CODE DANS afficherTexte
    // => JE DOIS APPELER LA FONCTION
    afficherTexte();

    * LA MAUVAISE NOUVELLE AVEC LA POO
    * => PROGRAMMATION ORIENTE OBJET

    // ETAPE1: DECLARATION DE LA CLASSE
    class Page
    {
        // DECLARER LES METHODES
        function afficherTitre () 
        {
            echo "<h1>TITRE1</h1>";
        }

    }

    // CA MARCHE PAS
    // afficherTitre();

    // ETAPE2: IL FAUT PASSER PAR UNE ETAPE INTERMEDIAIRE
    // => JE DOIS CREER UN OBJET DEPUIS LA CLASSE
    // => INSTANCIATION D'OBJETS (VOCABULAIRE)
    // => UN OBJET EST UNE VALEUR
    $monObjet = new Page;

    // POUR CREER UN OBJET A PARTIR D'UNE CLASSE
    // => J'UTILISE L'OPERATEUR D'INSTANCIATION new
    // => APRES new ON DONNE LE NOM DE LA CLASSE Page

    // ETAPE3: 
    // GRACE A L'OBJET JE PEUX APPELER LA METHODE
    // -> SERT A ACCEDER A LA METHODE A TRAVERS L'OBJET
    $monObjet->afficherTitre();
    // AVEC DES ESPACES CA MARCHE AUSSI 
    $monObjet -> afficherTitre ();

## COTE PHILOSOPHIQUE DE LA POO

    EN PROGRAMMATION FONCTIONNELLE
    => ON PARLE AUSSI DE PROGRAMMATION IMPERATIVE

    POUR APPELER UNE FONCTION
    calculerPrixTTC(100, 20);
    // => NOM DE LA FONCTION    => VERBE
    // => PARAMETRES            => COMPLEMENTS

    EN PROGRAMMATION ORIENTE OBJET

    $objet -> faireTravail ($param1, $param2);
    // OBJET        => SUJET
    // METHODE      => VERBE
    // PARAMETRES   => COMPLEMENTS
    // LE COTE COOL DE LA POO
    // C'EST QU'ON ECRIT DU CODE
    // SOUS LA FORME SUJET VERBE COMPLEMENT

    $site -> afficherPage("accueil");

    $section -> ajouter("galerie");

    DANS LES ETAPES POUR UN PROJET WEB
    => LE DEV VA VOIR LE CLIENT
    => ENSEMBLE ILS REDIGENT LE CAHIER DES CHARGES
    => EN FRANCAIS

    exemple:
    JE VEUX UN SITE VITRINE
    IL Y A AURA TANT DE PAGES
    * Accueil
    * contact
    * ...

    SUR LA PAGE D'ACCUEIL, IL Y AURA UNE SECTION QUI VA AFFICHER UNE GALERIE

    ENSUITE A PARTIR DU CAHIER DES CHARGES (EN FRANCAIS)
    => LE TRAVAIL DU DEVELOPPEUR CONSISTE A TRADUIRE EN CODE
    => CE SERAIT SYMPA D'AVOIR UN OUTIL QUI FASSE CE TRAVAIL TOUT SEUL...

    (UML Unified Modelling Language => Rational Rose...)

    (ATTENTION AVEC L'INTELLIGENCE ARTIFICIELLE... 
    CA RISQUE DE BOUGER DANS LES PROCHAINES ANNEES 2020+...)


## LA POO ET LES GRANDES ENTREPRISES


    class GroupeA
    {
        // METHODES
        function faireTravailA()
        {
            // LES ACTIONS A REALISER POUR EFFECTUER LE TRAVAIL A
        }
    }

    class GroupeB
    {
        // METHODES
        function faireTravailB()
        {
            // LES ACTIONS A REALISER POUR EFFECTUER LE TRAVAIL B
        }
    }

    $objetA = new GroupeA;
    $objetA -> faireTravailA();

    $objetB = new GroupeB;
    $objetB -> faireTravailB();


    // METIER BOULANGER
    // SAVOIR FAIRE: petrirPate, cuirePain, etc...
    class Boulanger
    {
        // METHODES
        function petrirPate ($farine, $eau)
        {

        }

        function cuirePain ($temperature)
        {

        }
    }

    // VOTRE BOULANGER
    $lucien = new Boulanger;
    $lucien -> petrirPate (1000, 100);
    $lucien -> cuirePain (180);

    => LA POO PERMET DE CONCEVOIR SON PROJET ET SON CODE
    => COMME UNE ENTREPRISE SEPAREE EN DIFFERENTS SERVICES
    => ET CHAQUE SERVICE A SES RESPONSABILITES

## EN JAVASCRIPT EST COMPLETEMENT ORIENTE OBJET...


    (MAIS ON N'EN PARLE PAS AUX DEBUTANTS...)
    (APPROCHE PAR PROTOTYPES ET PAS PAR CLASSE...)

    var texte = "coucou";
    var longueur = texte . length;

    // EN JS
    // . C'EST L'OPERATEUR D'ACCES (EN PHP -> )
    // objet . propriete
    // objet . methode ()


## EN PRATIQUE: LA POO AVEC PHP


    EN PHP, ON VERRA PLUS TARD QU'IL Y A UN MECANISME DE CHARGEMENT AUTOMATIQUE DE CLASSE...
    POUR QUE CE MECANISME FONCTIONNE CORRECTEMENT
    => ON VA CREER UN FICHIER .php PAR CLASSE

    => COMME CONVENTION: DANS LE NOM DU FICHIER ON MET LE NOM DE LA CLASSE
    => LE PLUS SIMPLE: SI J'AI UNE CLASSE Boulanger SON CODE SERA DANS UN FICHIER Boulanger.php
    => (ATTENTION: LA PREMIERE LETTRE EST EN MAJUSCULE...)

    DANS NOTRE FRAMEWORK, POUR DISTINGUER LA POO DU FONCTIONNEL
    => ON PEUT CREER UN DOSSIER php/class/
    => ET ON RANGERA TOUTES NOS CLASSES DANS CE DOSSIER
    => AVANTAGE: POUR SAVOIR SI ON FAIT DE LA POO: EST-CE QUE NOTRE CODE EST DANS php/class/


    QUAND ON TRAVAILLE EN EQUIPE, VOUS ALLEZ UTILISER git
    => git GERE DES FICHIERS
    => UNE CLASSE = UN FICHIER
    => CHAQUE DEV DOIT POUVOIR CODER SUR SES FICHIERS SANS CREER DE CONFLITS AVEC LES AUTRES DEV












