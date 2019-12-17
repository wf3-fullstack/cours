## COURS POO JOUR 04

## RESUME DES SAISONS PRECEDENTES

    ON FAIT UNE FORMATION DE DEVELOPPEUR FULLSTACK

    --- FRONT -----------
    HTML            LANGAGE DECLARATIF
    CSS             LANGAGE DECLARATIF
    JS              LANGAGE DE PROGRAMMATION
    --- BACK -----------
    PHP             LANGAGE DE PROGRAMMATION
    MySQL           LANGAGE DE REQUETE


    PHP 
        PROGRAMMATION FONCTIONNELLE
            (JE RANGE MON CODE DANS DES FONCTIONS...)
        PROGRAMMATION ORIENTE OBJET
            (JE RANGE MON CODE DANS DES CLASSES... ET SES POTES A LUI...)
            => EN FAIT JS AUSSI EST DU ORIENTE OBJET

    CONSTAT: UN DEVELOPPEUR ACTUELLEMENT DOIT CONNAITRE LA POO

    SQL: VIEUX MAIS CA MARCHE... IL EST PAS ORIENTE OBJET
            IL EST RELATIONNEL
    NoSQL:  Not Only SQL
            CouchDB, Cassandra, etc...

    ORM:    Object Relationship Mapping
            => COMMENT JE PASSE DE PHP ORIENTE OBJET
                VERS SQL RELATIONNEL

```php
<?php

    class MaClasse
    {
        // PROPRIETES
        public $nom = "";

        // METHODES
        function faireUnTruc ()
        {

        }
    }

```

    AVEC PHP, ON VA CREER UN FICHIER PAR CLASSE

    NAMESPACE
    CHARGEMENT AUTOMATIQUE DE CLASSE

## CHARGEMENT AUTOMATIQUE DE CLASSE


    https://www.php.net/manual/fr/language.oop5.autoload.php
    https://www.php.net/manual/fr/function.spl-autoload-register.php


    EN PHP, ON VA CREER UN FICHIER PAR CLASSE
    => MOTIVATION: ON VA POUVOIR ACTIVER LE CHARGEMENT AUTOMATIQUE DE CLASSE
            PHP VA CHARGER TOUT SEUL LE CODE DE LA CLASSE DONT IL A BESOIN
            => OPTIMISER LE CHARGEMENT DE CODE 
            => POUR NE PAS CHARGER PLUS DE CLASSE QUE NECESSAIRE

    (NOTE: N'EXISTE PAS DANS LES AUTRES LANGAGES ORIENTE-OBJET...)

    * DANS L'ORDRE DE CODAGE

```php
<?php
    // ------------- php/class/Developpeur.php 
    // SI ON RANGE NOTRE CLASSE DANS UN FICHIER Developpeur.php
    // ETAPE 1: DEFINIR LA CLASSE
    Class Developpeur
    {

    }

    // ------------- index.php
    // CHARGER LE CODE AVEC require_once
    require_once "php/class/Developpeur.php";

    // ETAPE 2: ON PEUT CREER UN OBJET A PARTIR DE LA CLASSE (INSTANCIATION)
    $objet = new Developpeur;       // OPERATEUR new



    // AVEC L'AUTOLOAD DE CLASSE


    // ON AJOUTE UNE FONCTION DE CALLBACK SUR LE new
    // https://www.php.net/manual/fr/function.spl-autoload-register.php
    // CETTE FONCTION EST APPELEE PAR PHP SI IL NE CONNAIT PAS DEJA LA CLASSE
    spl_autoload_register(function($nomClasse){
        // echo "(AUTOLOAD:$nomClasse)";
        // IL FAUT CHARGER ICI LE CODE DE LA CLASSE
        $cheminClasse = "php/class/$nomClasse.php";
        if (is_file($cheminClasse))
        {
            require_once "$cheminClasse";
        }
        else
        {
            // LE FICHIER DE LA CLASSE N'EXISTE PAS
            // ET SI ON LE CREAIT ???
            // CODE LE POUR MOI
            // https://www.php.net/manual/fr/function.file-get-contents.php
            // LIRE LE CODE DANS LE FICHIER Vide.php
            $codeReference = file_get_contents("php/class/Vide.php");
            // JE REMPLACE Vide PAR $nomClasse
            $codeClasse = str_replace("Vide", $nomClasse, $codeReference);
            // CREER LE FICHIER A LA PLACE DU FLEMMARD DE DEV
            // https://www.php.net/manual/fr/function.file-put-contents.php
            file_put_contents($cheminClasse, $codeClasse);

            // MAINTENANT QUE LE FICHIER EXISTE
            // JE VAIS POUVOIR LE CHARGER
            require_once "$cheminClasse";

        }
    });

    // NOTE: PHP EST CAPABLE DE GENERER DU CODE PHP ET DE LE CHARGER POUR L'EXECUTER...

```

## NAMESPACE

    // ON PEUT RANGER NOS CLASSES DANS DES NAMESPACES
    // https://www.php.net/manual/fr/language.namespaces.php
    // => POUR PERMETTRE DE GERER DES GRANDS PROJETS 
    //      AVEC DES CODES D'ENTREPRISES DIFFERENTES


```php
<?php
    namespace MonNameSpace
    {
        class MaClasse
        {

            // CONSTRUCTEUR
            function __construct ()
            {
                echo "(MonNameSpace,MaClasse)";
            }

            // METHODES
            function faireUnTruc ()
            {

            }
        }

    }


    namespace MonNameSpace2
    {
        class MaClasse
        {
            function __construct ()
            {
                echo "(MonNameSpace2,MaClasse)";
            }

            // METHODES
            function faireUnTruc2 ()
            {

            }
        }
    }


    // COMMENT JE CREE DES OBJETS AVEC LES NAMESPACES ???
    $objet = new MonNameSpace\MaClasse;
    $objet2 = new MonNameSpace2\MaClasse;

```

## PHP ET PHP Standards Recommendations

    COMMENT CONCILIER AUTOLOAD ET NAMESPACE ???

    https://www.php-fig.org/psr/

    Symfony AIME BIEN SUIVRE LES PSRs...

    https://www.php-fig.org/psr/psr-4/

    https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md


```php
<?php
    /**
    * An example of a project-specific implementation.
    *
    * After registering this autoload function with SPL, the following line
    * would cause the function to attempt to load the \Foo\Bar\Baz\Qux class
    * from /path/to/project/src/Baz/Qux.php:
    *
    *      new \Foo\Bar\Baz\Qux;
    *
    * @param string $class The fully-qualified class name.
    * @return void
    */
    spl_autoload_register(function ($class) {

        // project-specific namespace prefix
        $prefix = 'Foo\\Bar\\';

        // base directory for the namespace prefix
        $base_dir = __DIR__ . '/src/';

        // does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            return;
        }

        // get the relative class name
        $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // if the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    });


```

## use POUR RACCOURCIR LE CODE AVEC new

    SI ON NE VEUT PAS DONNER LE CHEMIN COMPLET A CHAQUE new
    ON PEUT AJOUTER UNE LIGNE use AVANT

    ET use PERMET AUSSI DE DONNER UN ALIAS POUR CHANGER LE NOM DE LA CLASSE
    (A MANIPULER AVEC PRECAUTIONS...)


## PROJET CMSPOO


    CHAQUE CONTENU DE PAGE DU SITE SERA UNE LIGNE DANS UNE TABLE SQL

        content
            id                  INT             INDEX=PRIMARY       A_I (AUTO_INCREMENT)
            filename            VARCHAR(160)
            titre               VARCHAR(160)
            contenuPage         TEXT
            photo               VARCHAR(160)
            datePublication     DATETIME
            categorie           VARCHAR(160)


    AVEC PHP, ON CONNAIT LE filename DEMANDE PAR LE NAVIGATEUR
    ET A PARTIR DU filename JE VAIS CHERCHER DANS LA TABLE SQL content
    LA LIGNE QUI CONTIENT LE filename CORRESPONDANT


    SELECT * 
    FROM content
    WHERE
    filename = :filename


    $tabAssoColonneValeur = [ "filename" => $filename ];


##  SYMFONY JOUR 02

    ROUTE
        ASSOCIER
            UNE URL (DEMANDEE PAR LE NAVIGATEUR)
            AVEC UNE METHODE D'UNE CLASSE src/Controller/...Controller.php

    => C'EST VOTRE ORGANISATION DE DECIDER 
        COMBIEN DE CLASSE CONTROLLERS VOUS AVEZ BESOIN
    => ENSUITE RANGER LES METHODES ASSOCIEES AU ROUTES DANS CES CLASSES

    POUR CREER LE CODE DE BASE D'UN CONTROLLER
    ON UNE LIGNE DE COMMANDE
        
        OUVRIR UN TERMINAL DANS LE DOSSIER symfony01/

    ET ENSUITE VOUS LANCEZ LA LIGNE DE COMMANDE

        php bin/console make:controller

    ENSUITE IL FAUT FOURNIR LE NOM DE LA CLASSE QU'ON VEUT CREER...

        MainController

    created: src/Controller/MainController.php
    created: templates/main/index.html.twig


    SI ON FAIT UN SITE BLOG
    COMMENCER A LISTER LES PAGES DU SITE

    MainController:
                            URL             METHODE
        route1: accueil     /               index       
        route4: contact     /contact        contact

    Controller2:
        route2: blog
        route3:     chaque article aura sa page

    Controller3:
        route5: admin


## TEMPLATES AVEC TWIG


### HERITAGE (REMPLISSAGE)


    SITE OFFICIEL
    https://twig.symfony.com/


    COMMENT ON TRAVAILLE AVEC TWIG ???

    NOUS ON TRAVAILLAIT AVEC DU DECOUPAGE
        header
        section
        footer

    TWIG TRAVAILLE EN REMPLISSAGE
        ON CREE UNE STRUCTURE AVEC DES TROUS
        ET ENSUITE ON REMPLIT LES TROUS

    ON A UN TEMPLATE PARENT
        templates/base.html.twig

    ON DEFINIT DES "BLOCKS"
    SONT DES ZONES VIDES QUI SERONT REMPLIS PAR LE TEMPLATE ENFANT

            {% block stylesheets %}{% endblock %}
            {% block body %}{% endblock %}
            {% block javascripts %}{% endblock %}

```twig

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>{% block title %}Welcome!{% endblock %}</title>
            {% block stylesheets %}{% endblock %}
        </head>
        <body>
            {% block coucou %}{% endblock %}

            {% block body %}{% endblock %}
            {% block javascripts %}{% endblock %}
        </body>
    </html>

```

### DECOUPAGE (include)

    ON PEUT AUSSI UTILISER LA FONCTION include 
    POUR RECOMPOSER DES TEMPLATES DECOUPES

```twig

    {% include 'commun/header.html.twig' %}
    {% include 'main/section.html.twig' %}
    {% include 'commun/footer.html.twig' %}

    {# https://twig.symfony.com/doc/3.x/tags/include.html #}

```

## URL AVEC TWIG

    https://symfony.com/doc/current/reference/twig_reference.html#url
    https://symfony.com/doc/current/reference/twig_reference.html#path

    ON UTILISE LE NOM DE LA ROUTE POUR OBTENIR L'URL
    => IL FAUT QUE LES NOMS DES ROUTES SOIENT UNIQUES

    DANS LE FICHIER src/Controller/...Controller.php

```php
<?php
        /**
        * @Route("/", name="index")
        */
        public function index()

```

    ET DANS LES FICHIERS TWIG, ON UTILISE LA FONCTION 
        url
        path

        <nav>
            <a href="{{ url('index') }}">accueil</a>
            <a href="{{ url('contact') }}">contact</a>
        </nav>



## CSS, JS, etc...

    ON PASSE PAR DES FONCTIONS DE TWIG
        absolute_url
        asset

    https://symfony.com/doc/current/templates.html#linking-to-css-javascript-and-image-assets


```twig

    <link rel="stylesheet" href="{{ absolute_url(asset('assets/css/style.css')) }}">

```


## GIT ET SYMFONY


    QUAND VOUS ALLEZ TRAVAILLER SUR VOTRE PROJET
    => VOUS ALLEZ CENTRALISER LE CODE DANS UN REPOSITORY github
    => AVEC LA FORMULE GRATUITE DE git, VOUS POUVEZ CREER UN REPOSITORY PRIVE
        ET INVITER 3 COLLABORATEURS EN PLUS
    => UNE PERSONNE DANS L'EQUIPE VA CREER LE REPOSITORY
        ET ELLE INVITE LES AUTRES COMME ADMIN DU REPOSITORY

    ENSUITE UN DEV INSTALLE SYMFONY SUR SON ORDI
    ET LE PUSH SUR LE REPO GIT
    => MAUVAISE SURPRISE... 
        SYMFONY INCLUT DES FICHIERS .gitignore
    => IL VA MANQUER DES DOSSIERS NECESSAIRES
        /vendor/
        ...

    => LES AUTRES QUI VONT FAIRE LE clone/pull

        git clone ...

    IL VA MANQUER DES DOSSIERS /vendor/
    => POUR COMPLETER IL FAUT LANCER LA COMMANDE
    => OUVRIR UN TERMINAL DANS LE DOSSIER QUI CONTIENT LE FICHIER composer.json

        composer install

    => RECREER LE DOSSIER /vendor/        


## EXERCICES POUR CET APRES-MIDI


    FAIRE UN SITE VITRINE AVEC SYMFONY

    FAIRE UN SITE POO SANS SYMFONY 
    (EXAM VENDREDI... CRUD...)

    BONUS: EXERCICES EN ORIENTE-OBJET










