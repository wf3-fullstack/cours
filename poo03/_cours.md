## POO JOUR 03


## PROPRIETES ET METHODES STATIC DE CLASSE (COLLECTIF)

    // FONCTIONNEL
    $MaClasse_metier = "";
    echo $MaClasse_metier;

    class MaClasse
    {
        //-------------------------------------------
        // PROPRIETES DE CLASSE COLLECTIF (static)
        public static $metier = "";

        // METHODES DE CLASSE COLLECTIF (static)
        static function afficherMetier ()
        {
            echo MaClasse::$metier;
        }

        //-------------------------------------------
        // PROPRIETES D'OBJET INDIVIDUELLE (VARIABLES DANS CLASSE)
        public $nom = "";
        
        // METHODES D'OBJET INDIVIDUELLE (FONCTIONS DANS CLASSE)
        function afficherNom($param1)
        {
            // DANS UNE METHODE D'OBJET
            // JE PEUX UTILISER UNE PROPRIETE DE L'OBJET AVEC $this
            echo "$param1 {$this->nom} {$this->prenom}";
        }
    }

    $objet = new MaClasse;
    $objet->nom     = "philippe";
    $objet->prenom  = "catherine";
    $objet->afficherNom("coucou");  // $this = $objet ET $param1 = "coucou"

    $objet2 = new MaClasse;
    // ERREUR CAR $this->prenom N'A PAS DE VALEUR
    //$objet2->afficherNom("hello");  // $this = $objet2 ET $param1 = "hello"
    $objet2->nom     = "aucune";
    $objet2->prenom  = "idée";
    $objet2->afficherNom("hello");  // $this = $objet2 ET $param1 = "hello"


## VISIBILITE DES PROPRIETES ET DES METHODES


    // public/protected/private

    class Personnage
    {
        // PROPRIETE static
        public static       $quete      = "";
        protected static    $monde      = "";
        private static      $cheatMode  = "";

        // ON NE PEUT PAS UTILISER LA METHODE EN DEHORS DE LA CLASSE
        protected static function changerMonde ($nouveauMonde)
        {
            Personnage::$monde = $nouveauMonde;
        }

        // ON NE PEUT PAS UTILISER LA METHODE EN DEHORS DE LA CLASSE
        private static function changerCheatMode ($nouveauCheatMode)
        {
            Personnage::$cheatMode = $nouveauCheatMode;
        }

        // PROPRIETES INDIVIDUELLE (POUR CHAQUE OBJET)
        public      $nom        = "";
        protected   $niveau     = 0;
        private     $coupLethal = "";

        // METHODES
        public function __construct ($niveau, $coupLethal)
        {
            // JE SUIS DANS UNE METHODE DE LA CLASSE 
            // ET DONC JE PEUX ECRIRE DANS LES PROPRIETES protected OU private
            $this->niveau = $niveau;
            $this->coupLethal = $coupLethal;
        }

        public function attaquer ()
        {
            // ON PEUT UTILISER LES PROPRIETES protected OU private
            echo $this->niveau;
            echo $this->coupLethal;
        }

        protected function changerNiveau ()
        {
            $this->niveau++;
        }

        private function changerCoupLethal ($nouveauCoupLethal)
        {
            $this->coupLethal = $nouveauCoupLethal;
        }
    }


    $objet = new Personnage(0, "bombe");
    // JE PEUX ACCEDER DEPUIS L'EXTERIEUR DE L'OBJET A SA PROPRIETE nom (A TRAVERS L'OBJET)
    $objet->nom = "antoine";

    // Fatal error: Uncaught Error: Cannot access protected property Personnage::$niveau
    // JE NE PEUX ACCEDER A LA PROPRIETE niveau DEPUIS L'EXTERIEUR
    // $objet->niveau = 100;   // ERREUR

    // Fatal error: Uncaught Error: Cannot access private property Personnage::$coupLethal
    // $objet->coupLethal = "tartagueule";

    // ERREUR
    // $objet->changerNiveau();
    // $objet->changerCoupLethal("paf");

    Personnage::$quete = "tuer le monstre";
    // Fatal error: Uncaught Error: Cannot access protected property Personnage::$monde
    // Personnage::$monde = "terre du milieu";

    // Fatal error: Uncaught Error: Cannot access private property Personnage::$cheatMode
    // Personnage::$cheatMode = "secret";



    IDEE: SI JE LAISSE DES PROPRIETES EN public 
    ALORS TOUT LE MONDE PEUT LIRE ET ECRIRE SUR CES PROPRIETES

    ALORS QUE SI JE VEUX BLOQUER L'UTILISATION DE CES PROPRIETES DEPUIS L'EXTERIEUR
    ALORS JE DOIS UTILISER protected OU private



## METHODES GETTER ET SETTER

    DANS LES RECOMMANDATIONS OFFICIELLES DANS LA POO...
    VOUS NE DEVRIEZ JAMAIS CREER DE PROPRIETES EN public
    => ON DEVRAIT TOUJOURS CREER DES PROPRIETES EN protected OU private
    => ET POUR LIRE ET ECRIRE DANS LES PROPRIETES
    => ON DEVRAIT CREER DES METHODES public POUR LA LECTURE ET L'ECRITURE


    class Personnage
    {
        // PROPRIETES D'OBJET
        protected $nom;

        // METHODE GETTER (LECTURE)
        public function getNom ()
        {
            // SECURITE POSSIBLE
            // ...
            return $this->nom;
        }

        // METHODE SETTER (ECRITURE)
        public function setNom ($nom)
        {
            // SECURITE POSSIBLE
            // filtrer le paramètre pour se protéger

            $this->nom = $nom;
        }
    }

    $objet = new Personnage;

    // PAS DANS LA RECOMMANDATION OFFICIELLE
    // public => OK
    // $objet->nom = "coucou";
    // echo $objet->nom;

    // LECTURE => GETTER
    echo $objet->getNom();
    // ECRITURE => SETTER
    $objet->setNom("coucou");

    EN PRATIQUE: DANS 99.9% DES CAS, ON NE MET JAMAIS DE SECURITE
    => LE DEV SE PREND LA TETE POUR RIEN...
    => (ET MEME LES COMPILATEURS ENLEVENT POUR REFAIRE UN ACCES DIRECT...)


## HERITAGE ENTRE CLASSES

    https://www.php.net/manual/fr/language.oop5.inheritance.php

    // CLASSE PARENTE
    class Metier
    {
        // PROPRIETES
        public      $nom                = "";
        protected   $niveau             = "";
        private     $techniqueSecrete   = "";

    }

    // CLASSE ENFANT
    class Conducteur
        extends Metier
    {
        // METHODE
        private function rouler ()
        {
            // DANS UNE METHODE DE LA CLASSE ENFANT
            // JE PEUX UTILISER LES PROPRIETES protected DE LA CLASSE PARENTE
            echo $this->niveau;

            // MAIS JE NE PEUX PAS UTILISER LES PROPRIETES private DE LA CLASSE PARENTE
            // ERREUR
            // echo $this->techniqueSecrete;

        }
    }


    class ChauffeurUber 
        extends Conducteur
    {
        function faireCourse ()
        {
            // ERREUR CAR LA METHODE rouler EST private
            // $this->rouler();
        }
    }

    // CLASSE ENFANT
    class Chanteur
        extends Metier
    {
        // PROPRIETES
        // ???

        // METHODES
        function chanter ()
        {

        }
    }


    $objetChanteur = new Chanteur;
    // JE PEUX UTILISER LES PROPRIETES DE LA CLASSE Metier
    // COMME SI CES PROPRIETES FAISAIENT PARTIE DE LA CLASSE Chanteur
    $objetChanteur->nom = "soprano";
    // ERREUR CAR protected
    // $objetChanteur->niveau = 100;
    // ERREUR CAR private
    // $objetChanteur->techniqueSecrete = "coup de marteau";

    // POUR EVITER LA REPETITION
    // ON CENTRALISE LE CODE
    // MAIS ON EST EN POO
    // => MON CODE EST DANS UNE CLASSE
    // => ET J'AI BESOIN DE RELIER 2 CLASSES ENSEMBLE
    // => HERITAGE
    // => ON AJOUTE LE MOT extends APRES NOM DE LA CLASSE
    //      ET ON DONNE LA CLASSE PARENTE



    UNE CLASSE PARENTE PEUT AVOIR PLEIN DE CLASSES ENFANTS
    MAIS UNE CLASSE ENFANT NE PEUT HERITER QUE D'UNE CLASSE PARENTE
    (MAIS ON POURRA FAIRE DES TRUCS TORDUS AUTREMENT...)



## SURCHARGE DE METHODES    

    https://www.php.net/manual/fr/language.oop5.paamayim-nekudotayim.php
    => OPERATEUR DE RESOLUTION DE PORTEE
    => parent

    https://www.php.net/manual/fr/language.oop5.overloading.php
    => OVERLOAD

    DANS DES CLASSES PARENT ET ENFANT
    ON PEUT AVOIR DES METHODES AVEC LA MEME SIGNATURE (NOM ET PARAMETRES)
    => LA PRIORITE SUR DES OBJETS DES CLASSES ENFANT 
    EST DONNEE SUR LES METHODES DE LA CLASSE ENFANT



    class MaClasseParent
    {
        // METHODES
        function afficherInfo()
        {
            echo "(MaClasseParent::afficherInfo)";
        }
    }


    class MaClasseEnfant
        extends MaClasseParent
    {
        // METHODES
        function afficherInfo()
        {
            echo "(MaClasseEnfant::afficherInfo)";
            // SI DANS LA CLASSE ENFANT J'AI BESOIN D'APPELER LA METHODE PARENTE
            parent::afficherInfo();
        }
    }

    class PetitEnfant
        extends MaClasseEnfant
    {
        function afficherInfo()
        {
            echo "(PetitEnfant::afficherInfo)";
            // SI DANS LA CLASSE ENFANT J'AI BESOIN D'APPELER 
            // DIRECTEMENT LA METHODE PARENTE DE LA CLASSE MaClasseParent
            MaClasseParent::afficherInfo();
        }
        
    }

    $objetEnfant = new MaClasseEnfant;
    $objetEnfant->afficherInfo();   // ?? LAQUELLE METHODE EST APPELEE
    // COMME L'OBJET EST DE LA CLASSE MaClasseEnfant
    // LA PRIORITE EST SUR LA METHODE DE LA CLASSE MaClasseEnfant

    $objetPetitEnfant = new PetitEnfant;
    $objetPetitEnfant->afficherInfo();



    class Employe
    {
        // METHODE
        function travailler ()
        {

        }
    }

    class Graphiste
        extends Employe
    {

        // METHODE
        function travailler ()
        {
            echo "(JE DESSINE)";
        }
    }


    class Developpeur
        extends Employe
    {
        // METHODE
        function travailler ()
        {
            echo "(JE CODE)";
        }

    }

    // SI ON SE PLACE DU POINT DE VUE DU DIRECTEUR
    // IL A DES EMPLOYES
    $tabEmploye = [
        "graphiste"     => new Graphiste,
        "developpeur"   => new Developpeur,
    ];

    foreach($tabEmploye => $employe)
    {
        $employe->travailler();
    }



    class Enseignant
    {
        // METHODE
        function faireCours ()
        {
            echo "(faireCours)";
        }
    }

    class ProfSki
        extends Enseignant
    {
        // LA METHODE ENFANT SPECIALISE LA METHODE PARENTE
        function faireCours ()
        {
            // ECHAUFFEMENT
            echo "(echauffez-vous d'abord)";

            parent::faireCours();

            // RANGER LES SKIS
            echo "(e)tirez-vous...";
        }
    }


    $profCode = new Enseignant;
    $profCode->faireCours();

    $profSki = new ProfSki;
    $profSki->faireCours();


    $tabCours = [
        "math"  => new Enseignant,
        "ski"   => new ProfSki,
    ];

    foreach($tabCours as $prof)
    {
        $prof->faireCours();
    }


## DANS LES DELIRES DE LA POO...


### CLASSES ABSTRAITES

    https://www.php.net/manual/fr/language.oop5.abstract.php

    UNE CLASSE ABSTRAITE EST UNE CLASSE PAS FINIE...

    // Fatal error: Class MaClassePasFinie contains 1 abstract method 
    //                  and must therefore be declared abstract
    // ATTENTION: IL FAUT AUSSI AJOUTER abstract DEVANT LA CLASSE
    abstract class MaClassePasFinie
    {
        // PROPRIETES

        // METHODES

        // METHODES PAS FINIES
        // DECLAREE MAIS PAS DEFINIE
        abstract public function faireTravail();
        // SI ON MET abstract ET {}
        // Fatal error: Abstract function MaClassePasFinie::faireTravail() cannot contain body
        // ATTENTION: abstract AU DEBUT ET PAS DE {}

    }

    // COMME LA CLASSE N'EST PAS FINIE
    // => ON NE PEUT CREER D'OBJET AVEC
    $objet = new MaClassePasFinie;
    // => ERREUR
    // Fatal error: Uncaught Error: Cannot instantiate abstract class MaClassePasFinie

    // TECHNIQUE UTILE POUR LE TRAVAIL EN EQUIPE 
    // ET POUR REUTILISER SON CODE SUR DIFFERENTS PROJETS


### INTERFACES 

    https://www.php.net/manual/fr/language.oop5.interfaces.php

    // ATTENTION: ON CHANGE CE N'EST PLUS class MAIS interface
    interface MonInterface
    {
        // IL N'Y A QUE DES METHODES ABSTRAITES
        // AUCUN BLOC D'ACCOLADES
        function faireA ($param1, $param2);
        function faireB ($param1, $param2, $param3);
    }

    // UNE INTERFACE EST UN "CONTRAT" QUE LE DEVELOPPEUR S'ENGAGE A RESPECTER SUR LES METHODES

    class MaClasse
        implements MonInterface // VOUS VOUS ENGAGEZ A DEFINIR TOUTES LES METHODES DE L'INTERFACE
    {
        function faireA ($param1, $param2)
        {

        }

        function faireB ($param1, $param2, $param3)
        {

        }

    }



    class MaClasseParent
    {
        function faireA ($param1, $param2)
        {

        }  
    }

    class MaClasseEnfant
        extends MaClasseParent,
        implements MonInterface
    {
        function faireB ($param1, $param2, $param3)
        {

        }
    }

### TRAITS

    https://www.php.net/manual/fr/language.oop5.traits.php

    SI ON VEUT FAIRE DES BOUTS DE CLASSE
    ET LES RECOLLER ENSEMBLE

    // ENCORE UN NOUVEAU MOT trait ET PAS class
    trait MonTraitA
    {
        // PROPRIETES
        public $nom = "";

        // METHODES
        function faireA ()
        {

        }
    }

    trait MonTraitB
    {
        // PROPRIETES
        public $age = "";

        // METHODES
        function faireB ()
        {

        }
    }

    // COMME C'EST UN TRAIT, ON NE PEUT INSTANCIER D'OBJET
    // $objet = new MonTraitA;  // ERREUR
    // $objet = new MonTraitB;  // ERREUR

    // POUR UTILISER LE CODES DANS LES TRAITS
    // JE VAIS CREER UNE CLASSE QUI UTILISE LES TRAITS (COMPOSITION)

    class MaClasse
    {
        // ATTENTION: ON EST DANS LE BLOC {}
        use MonTraitA, MonTraitB;
    }

    $objet = new MaClasse;
    $objet->nom = "coucou";
    $objet->age = 21;
    $objet->faireA();
    $objet->faireB();

    // ON SE RETROUVE AVEC PLEIN DE PROBLEMES POSSIBLES...

## POSSIBILITES POUR LES PROCHAINES ETAPES


### COMMENCER SYMFONY CET APRES MIDI

    ET ENSUITE, CONTINUER SYMFONY 
    ET AUSSI FAIRE DU FRAMEWORK SANS SYMFONY
    (PREPARER EXAMEN...)



### SYMFONY

    https://symfony.com/

    FRAMEWORK PHP+SQL
    => BACK END

    PUBLIE EN 2005
    LICENCE MIT
    => LOCIGIEL LIBRE ET OPEN-SOURCE

    CREE PAR UN FRANCAIS: Fabien POTENCIER
    => ENTREPRISE QUI CHAPEAUTE LE DEVELOPPEMENT DE SYMFONY
    https://sensiolabs.com/fr/

    CERTIFICATIONS OFFICIELLES SUR SYMFONY
    https://university.sensiolabs.com/fr/trainings


    https://openclassrooms.com/fr/courses/3619856-developpez-votre-site-web-avec-le-framework-symfony
    (ATTENTION COURS SUR SYMFONY 3...)

    ACCES PREMIUM SOLO AVEC POLE EMPLOI
    https://openclassrooms.com/fr/partners/pole-emploi/offers

    COURS UDEMY (PAYANT)
    https://www.udemy.com/course/symfony-par-la-pratique/

    COURS GRATUIT (ET PAYANT AUSSI...)
    https://www.grafikart.fr/formations/symfony-4-pratique


    https://trends.builtwith.com/framework/Laravel
    https://trends.builtwith.com/framework/symfony-PHP-Framework
    https://trends.builtwith.com/framework/Zend-Framework-Debugger

    AU NIVEAU INTERNATIONAL
    LARAVEL     => LE PLUS POPULAIRE CAR LE PLUS SIMPLE
                => https://laravel.com/
                => PLUTOT TOUT SEUL OU PETITES EQUIPES

    SYMFONY     => PLUS ORIENTE GROS PROJETS EN EQUIPE
                => https://symfony.com/what-is-symfony
                => ET FRANCAIS

    ZEND FRAMEWORK       
                => ON UTILISE LE MOTEUR PHP DE ZEND 
                => LE PLUS COMPLIQUE
                => https://framework.zend.com/


    ARCHITECTURE A 2 NIVEAUX
    * BIBLIOTHEQUE DE CODE
    * FRAMEWORK

    LE FRAMEWORK SYMFONY S'APPUIE SUR DES BIBLIOTHEQUES SYMFONY 
    MAIS AUSSI D'AUTRES BIBLIOTHEQUES

    LE FRAMEWORK LARAVEL S'APPUIE SUR DES BIBLIOTHEQUES LARAVEL
    MAIS AUSSI SUR D'AUTRES BIBLIOTHEQUES (DONT SYMFONY...)

    https://www.openhub.net/p/symfony


    * MIGRATION DE DAILYMOTION VERS SYMFONY
    https://www.yumpu.com/fr/document/read/35951612/symfony-et-dailymotion-une-migration-racussie


## DOCUMENTATION DE SYMFONY


    https://symfony.com/doc/current/index.html

## VERSIONS DE SYMFONY

    SEMVER (SEMANTIC VERSIONING)
    VERSION MAJEURE . VERSION MINEURE . VERSION DEBUG

    3.4.1
    3 => VERSION MAJEURE    => CA PEUT CASSER DU CODE EXISTANT
    4 => VERSION MINEURE
    1 => VERSION DEBUG

    SI ON RESTE SUR LA MEME MAJEURE, LE CODE ACTUEL NE CASSE PAS

    PAR CONTRE, ENTRE UNE VERSION MAJEURE ET LA SUIVANTE
    => PEUT-ETRE QUE LE CODE ACTUEL NE FONCTIONNERA PAS...

    SYMFONY 2
    => CA CASSE (LA STRUCTURE A ETE SIMPLIFIEE)
    SYMFONY 3
    => CA CASSE (LA STRUCTURE A ETE BIEN SIMPLIFIEE)
    SYMFONY 4
    => VOUS AVEZ DE LA CHANCE (NORMALEMENT CA CASSE PAS...)
    SYMFONY 5

    https://symfony.com/releases

    BONNE NOUVELLE: LA VERSION LONG TERM SUPPORT (LTS 2 ANS)
    VIENT DE SORTIR => C'EST LA VERSION 4.4

    ET EN MEME TEMPS LA VERSION 5 EST AUSSI DISPONIBLE
    => ON A DE LA CHANCE, LE CODE SYMFONY 4 ET SYMFONY 5 SONT COMPATIBLES...

## INSTALLATION DE SYMFONY


    https://symfony.com/doc/current/setup.html

    ATTENTION: VERSION PHP MINIMUM 7.2.5

    CREER UN FICHIER info.php
    AVEC LE CODE 

        <?php phpinfo() ?>


### INSTALLER COMPOSER

    https://getcomposer.org/download/

    OUVRIR UN TERMINAL
    ET TESTER LA COMMANDE

        composer -v

    (SUR WINDOWS)
    SI composer N'EST PAS INSTALLE 
    ALORS IL FAUT TELECHARGER LE FICHIER D'INSTALLATION
    https://getcomposer.org/Composer-Setup.exe


    INSTALLER composer-Setup.exe
    (BIEN CHOISIR LA VERSION DE PHP QUI EST AU MINIMUM 7.2.5+)

    ET ENSUITE, REFERMER LE TERMINAL 
    ET EN OUVRIR UN NOUVEAU
    ET TESTER LA COMMANDE

        composer -v

    ET ON DEVRAIT VOIR UN AFFICHAGE COMME SUIT...

    ______
    / ____/___  ____ ___  ____  ____  ________  _____
    / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
    / /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
    \____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                        /_/
    Composer version 1.9.1 2019-11-01 17:20:17



### INSTALLER LE PROGRAMME symfony

    TELECHARGER LE PROGRAMME symfony cli

    https://get.symfony.com/cli/setup.exe


    ET ESSAYER LA COMMANDE

        symfony -v

    ET ON DEVRAIT VOIR LE MESSAGE:

        Symfony CLI version v4.11.3 (c) 2017-2019 Symfony SAS


    ET ON VERIFIE ENSUITE

        symfony check:requirements

    ON DEVRAIT VOIR CE MESSAGE S'AFFICHER...

        [OK]
        Your system is ready to run Symfony projects


    OUVRIR UN TERMINAL ET VERIFIER QU'ON EST DANS LE BON DOSSIER (wf3-fullstack/)

    ET ENSUITE ON PEUT LANCER LA COMMANDE POUR INSTALLER symfony

        symfony new symfony01 --full

    SI TOUT SE PASSE BIEN...

        [OK] Your project is now ready in C:\xampp\htdocs\wf3-fullstack\symfony01

    ENSUITE DANS LE NAVIGATEUR, ALLER DANS LE DOSSIER symfony01/public/

    SUR MON ORDINATEUR

        http://localhost/wf3-fullstack/symfony01/public/


    AU BESOIN REDEMARRER LE SERVEUR WEB AVEC LA BONNE VERSION DE PHP 
    (CELLE QUI A ETE ASSOCIEE A composer...)
    (EXEMPLE 7.3.5)


## CODE DE public/index.php

    // https://www.php.net/manual/fr/language.operators.bitwise.php


    $kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
    // => JE CREE UN OBJET $kernel DEPUIS LA CLASSE Kernel

    $request = Request::createFromGlobals();
    // => JE FAIS APPEL A UNE METHODE static DE CLASSE Request

    $response = $kernel->handle($request);
    // JE FAIS APPEL A LA METHODE handle SUR L'OBJET $kernel
    // ET LA METHODE handle RETOURNE COMME VALEUR UN OBJET $response

    $response->send();
    // JE FAIS APPEL A LA METHODE send SUR L'OBJET $response

    $kernel->terminate($request, $response);
    // JE FAIS APPEL A LA METHODE terminate SUR L'OBJET $kernel

## FIN D'INSTALLATION AVEC APACHE

    https://symfony.com/doc/current/setup/web_server_configuration.html#adding-rewrite-rules

    ON DOIT AJOUTER UN FICHIER .htaccess POUR AVOIR LES REWRITE RULES AVEC APACHE


    POUR CELA, ON VA OUVRIR UN TERMINAL DANS LE DOSSIER symfony01/
    (LE DOSSIER QUI CONTIENT LE FICHIER composer.json...)

    ET ENSUITE LANCER LA COMMANDE DANS LE TERMINAL

        composer require symfony/apache-pack

    SI ON N'A PAS LE FICHIER public/.htaccess
    ALORS IL FAUT ENLEVER LE PACKAGE ET ENSUITE LE RE-INSTALLER

        composer remove symfony/apache-pack
        composer require symfony/apache-pack


## CREER DES PAGES AVEC SYMFONY


    https://symfony.com/doc/current/page_creation.html

    https://openclassrooms.com/fr/courses/3619856-developpez-votre-site-web-avec-le-framework-symfony/3620885-le-routeur-de-symfony

    UNE ROUTE ASSOCIE UNE URL DEMANDEE PAR LE NAVIGATEUR
    AVEC UNE METHODE D'UNE CLASSE Controller


    <?php

    namespace App\Controller;
    // JE RANGE MA CLASSE DANS LE NAMESPACE APp\Controller

    // JE VAIS UTILISER LA CLASSE Response
    // QUI EST DANS LE NAMESPACE SUIVANT
    use Symfony\Component\HttpFoundation\Response;

    // ATTENTION: ON VA UTILISER LA CLASSE Route DANS L'ANNOTATION
    use Symfony\Component\Routing\Annotation\Route;

    class FirstPageController
    {
        // METHODE

        /**
        * @Route("/page01")
        */
        function afficherPage ()
        {
            $codeHTML =
    <<<CODEHTML

            <body>
            <h1>ON DIT QUE C'EST LE CODE HTML DE MA PAGE</h1>
            </body>

    CODEHTML;

            $objetResponse = new Response($codeHTML);

            return $objetResponse;
        }

    }


### GENERATION DE CODE Controller


    https://symfony.com/doc/current/controller.html#generating-controllers


    OUVRIR UN TERMINAL DANS LE DOSSIER symfony01/

    ET ENSUITE ENTRER LA LIGNE DE COMMANDE

        php bin/console make:controller

    ENSUITE IL FAUT DONNER LE NOM DE LA CLASSE Controller A CREER


    ET LA CONSOLE ME CREE DES FICHIERS DE CODE...
    DONT LA PARTIE VIEW EST MAINTENANT A PART DANS TWIG

    https://twig.symfony.com/


    ASTUCE: AJOUTER LES EXTENSIONS A VISUAL STUDIO CODE

    PHP Namespace Resolver
    Twig













