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
            // SI DANS LA CLASSE ENFANT J'AI BESOIN D'APPELER LA METHODE PARENTE
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

    UNE CLASSE ABSTRAITE EST UNE CLASSE PAS FINIE...

    // Fatal error: Class MaClassePasFinie contains 1 abstract method and must therefore be declared abstract
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
    // JE VAIS CREER UNE CLASSE QUI SE UTILISE LES TRAITS

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












