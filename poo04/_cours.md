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

    class MaClasse
    {
        // PROPRIETES
        public $nom = "";

        // METHODES
        function faireUnTruc ()
        {

        }
    }


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


## NAMESPACE

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



## PHP ET PHP Standards Recommendations

    COMMENT CONCILIER AUTOLOAD ET NAMESPACE ???

    https://www.php-fig.org/psr/

    Symfony AIME BIEN SUIVRE LES PSRs...

    https://www.php-fig.org/psr/psr-4/

    https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md



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









