## LES BUNDLES DANS SYMFONY

    LE CODE DE SYMFONY EST ORGANISE EN "BUNDLES"
    => SYMFONY 2 
        => TOUT EST BUNDLE
        => IL FAUR CREER DES BUNDLES POUR RANGER LES DIFFERENTES PARTIES DE SON CODE
    => SYMFONY 3
        => UN SEUL BUNDLE SUFFIT POUR TOUTE SON APPLICATION
    => SYMFONY 4
        => LE BUNDLE App EST DEJA LA DES L'INSTALLATION
        => ON AJOUTE DES BUNDLES POUR AJOUTER DU CODE DANS SON PROJET SYMFONY


## LA PARTIE MODEL DANS SYMFONY


    COMMENT ON UTILISE UNE BASE DE DONNEES SQL AVEC SYMFONY ?
    => CRUD, etc...

    SYMFONY CENTRALISE LA GESTION DE LA BDD DANS LE CODE PHP
    ON VA AVOIR DE OUTILS SYMFONY POUR CREER LA DATABASE 
    ET AUSSI LES TABLES
        ET AUSSI LES COLONNES

    https://symfony.com/doc/current/doctrine.html#configuring-the-database


    CHANGER LES INFOS DE CONNEXION A SQL DANS LE FICHIER .env

    # DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
    DATABASE_URL=mysql://root:@127.0.0.1:3306/symfony?serverVersion=5.7

    ENSUITE ON PEUT LANCER LA LIGNE DE COMMANDE DANS UN TERMINAL OUVERT DANS LE DOSSIER SYMFONY

        php bin/console doctrine:database:create

    SI TOUT VA BIEN, ON OBTIENT CETTE REPONSE...

        Created database `symfony` for connection named default


### DOCTRINE

    LE CODE DE SYMFONY QUI GERE LA PARTIE MODEL EST RASSEMBLEE DANS UN "BUNDLE"
    QUI S'APPELLE DOCTRINE

    https://www.doctrine-project.org/

    Object
    Relationship
    Mapping

    Correspondance
    Objet                   => PHP ORIENTE OBJET
    Relationnel             => SQL (ONE TO ONE, ONE TO MANY, MANY TO MANY)


    PHP ORIENTE OBJET               SQL
    Classe                          Table
        proprietes                      Colonnes

    objets                              lignes

                                    User
                                        id      email           password
                                        1       toto@mail.me    1234    
                                        2       titi@mail.me    abcd

    class User
    {
        // PROPRIETES
        protected $id = 0;
        protected $email = "";
        protected $password = "";

        // METHODES GETTERS ET SETTERS
    }

    $user1           = new User;
    $user1->id       = 1;
    $user1->email    = "toto@mail.me";
    $user1->password = "1234";


    DOCTRINE VA PROPOSER LE CODE POUR GERER LE CRUD AVEC SQL
    => DBAL (DataBase Abstraction Layer) 
        (EN FRANCAIS: COUCHE INTERMEDIAIRE D'ACCES A LA DATABASE)
    => ET LA PARTIE ORM ASSURE LA GESTION EN ORIENTE OBJET


## LES ENTITES DOCTRINE


    https://symfony.com/doc/current/doctrine.html#creating-an-entity-class

    UNE ENTITE EST UN MODELISATION EN PHP DE LA PARTIE MODELE (LA DATABASE SQL POUR NOUS)
    LE DEVELOPPEUR DEVRAIT GERER DES ENTITES PHP
    ET LES ENTITES GERENT LA PARTIE "PERSISTENCE"
    (=> CRUD AVEC LA BASE DE DONNEES SQL)
    (LE DEVELOPPEUR N'EST PAS CENSE S'EN PREOCCUPER...)
    (EN PRATIQUE: LA PERSISTENCE => STOCKER LES INFOS DANS DES FICHIERS ET PAS SEULEMENT EN RAM)

    OUVRIR UN TERMINAL DANS NOTRE DOSSIER SYMFONY

        php bin/console make:entity


    User
        email                   string
        username                string
        level                   integer
        dateCreation            datetime

    => CETTE ETAPE CREE LE CODE PHP
            src/Entity/...
            src/Repository/...    

    => MAIS ON N'A PAS CREE LES TABLES A CETTE ETAPE

    POUR POUVOIR CREER LES TABLES, IL FAUT LANCER UNE LIGNE DE COMMANDE

        php bin/console make:migration

    => CREE LE CODE SQL POUR CREER LA TABLE
    => MAIS CE CODE SQL N'EST PAS ENCORE EXECUTE...
    Next: Review the new migration "src/Migrations/Version20200102111543.php"

    POUR CREER LA TABLE SQL, IL FAUT LANCER LA COMMANDE DANS LA CONSOLE

        php bin/console doctrine:migrations:migrate

    => VA LANCER LA COMMANDE ET CREER LES TABLES SQL


## CRUD SUR UNE ENTITE SYMFONY

    SQL
        produit
                    id
                    nom                 VARCHAR(160)
                    prix                DECIMAL(10,2)
                    description         TEXT
                    image               VARCHAR(160)
                    date_publication    DATETIME

    Entite      
        Produit     
                    (id)
                    nom                 string(160)
                    prix                decimal(10,2)
                    description         text
                    image               string(160)
                    datePublication     datetime


    ON LANCE LE TERMINAL DANS LE DOSSIER SYMFONY
    ET ON LANCE LA COMMANDE
    php bin/console make:entity

    => REMPLIR LES QUESTIONS POUR CREER LES PROPRIETES DE L'ENTITE

    ET ENSUITE LANCER LA COMMANDE 

    php bin/console make:migration

    => CREE LE FICHIER PHP DE MIGRATION AVEC LE CODE 

    => ENSUITE LANCER LA MIGRATION POUR SYNCHRONISER LA BASE DE DONNEES SQL

    php bin/console doctrine:migrations:migrate

    ASTUCE:
        AJOUTER DANS LE FICHIER .gitignore
        /src/Migrations/


## GENERATION DU CRUD A PARTIR D'UNE ENTITE SYMFONY

    https://symfony.com/blog/new-and-improved-generators-for-makerbundle

    DANS LE TERMINAL, LANCER LA COMMANDE

    php bin/console make:crud

    => VA GENERER LE CODE PHP ET TWIG POUR L'ENTITE Produit

    created: src/Controller/ProduitController.php
    created: src/Form/ProduitType.php
    created: templates/produit/_delete_form.html.twig
    created: templates/produit/_form.html.twig
    created: templates/produit/edit.html.twig
    created: templates/produit/index.html.twig
    created: templates/produit/new.html.twig
    created: templates/produit/show.html.twig


    /**
    * @Route("/produit")
    */
    class ProduitController extends AbstractController


    => TOUTES LES URLS DANS LA CLASSE CONTROLLER ONT LE PREFIXE /produit


    /**
     * @Route("/", name="produit_index", methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository): Response

    => COMME URL
        http://localhost/.../public/produit/


            /public/produit/new



## EXERCICE POUR CET APRES-MIDI


    CREER UNE ENTITE    
        Annonce
            (id)
            titre               string(160)
            contenu             text
            datePublication     datetime
            prix                decimal(10,2)
            ville               string(160)
            (auteur... POUR PLUS TARD)

    php bin/console make:entity
    .. REPONDRE AUX QUESTIONS...

    php bin/console make:migration
    ... GENERE LE FICHIER Version...

    php bin/console doctrine:migrations:migrate
    ... CREER LA TABLE SQL...

    ET ENSUITE CREER LE CRUD POUR POUVOIR GERER LE CRUD SUR CETTE ENTITE

    php bin/console make:crud
    ... CREE LES FICHIERS POUR LES PAGES CRUD...



## THEME BOOTSTRAP POUR LES FORMULAIRES


https://symfony.com/doc/current/forms.html#rendering-forms

twig:
    default_path: '%kernel.project_dir%/templates'
    form_themes: ['bootstrap_4_layout.html.twig']


https://getbootstrap.com/docs/4.4/getting-started/introduction/

    ET AJOUTER LE CODE DANS base.html.twig

    POUR RENDRE LA PAGE RESPONSIVE

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    POUR CHARGER LE CSS

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    POUR CHARGER LE JS

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


## LOGIN ET USER AVEC SYMFONY


https://symfony.com/blog/new-in-makerbundle-1-8-instant-user-login-form-commands


ON VA RECREER UNE ENTITE User AVEC LA COMMANDE 

    php bin/console make:user

    => REPONDRE AUX QUESTIONS (LAISSER LES VALEURS PAR DEFAUT...)

    created: src/Entity/User.php
    created: src/Repository/UserRepository.php
    updated: src/Entity/User.php
    updated: config/packages/security.yaml


LES FICHIERS .yaml SONT INDENTES AVEC 4 ESPACES EXACTEMENT PAR INDENTATION


UNE FOIS QU'ON A LA BASE POUR L'ENTITE User
ON VA COMPLETER AVEC LE FORMULAIRE DE LOGIN

    php bin/console make:auth


Next:
 - Customize your new authenticator.
 - Finish the redirect "TODO" in the App\Security\LoginFormAuthenticator::onAuthenticationSuccess() method.
 - Review & adapt the login template: templates/security/login.html.twig.



ENSUITE, ON VA COMPLETER AVEC UN make:crud SUR User
POUR POUVOIR CREER DES User

    php bin/console make:crud User


 created: src/Controller/UserController.php
 created: src/Form/UserType.php
 created: templates/user/_delete_form.html.twig
 created: templates/user/_form.html.twig
 created: templates/user/edit.html.twig
 created: templates/user/index.html.twig
 created: templates/user/new.html.twig
 created: templates/user/show.html.twig



IL FAUT SYNCHRONISER LA BASE DE DONNEES SQL

    php bin/console make:migration     

    php bin/console doctrine:migrations:migrate



    SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax  
  ; check the manual that corresponds to your MariaDB server version for the right syntax to u  
  se near 'JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP username, DROP level, DR' a  
  t line 1  