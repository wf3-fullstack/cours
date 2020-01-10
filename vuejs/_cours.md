## VUEJS

    FRAMEWORK JS CREE EN 2014

    https://vuejs.org/


    DOCUMENTATION EN FRANCAIS ET BIEN PRATIQUE

    https://fr.vuejs.org/v2/guide/index.html

    TUTORIELS VIDEO...

    https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/

    COMBINAISON AVEC LARAVEL...

    https://laracasts.com/skills/vue


    FRAMEWORK POUR FACILITER LA CREATION D'INTERFACE UTILISATEURS (User Interface)

    => WEB APPS Web Applications
    => CRITERE ACCES AUX FONCTIONNALITES DU SMARTPHONE/TABLETTE
    => PERFORMANCES PEUVENT ETRE MOINDRES AVEC UNE WEB APP

    APPLICATION NATIVE
        Java/Kotlin         POUR ANDROID
        ObjectiveC/Swift    POUR IOS

    WEB APPS                TECHNO WEB (HTML, CSS, JS)  
                                => NAVIGATEUR 
                                => EMBEDDED VIEW
                                => IMBRIQUE DANS UNE APPLICATION NATIVE

## CONCURRENTS PRINCIPAUX

    REACTJS                     JSX
    ANGULAR (en baisse)         TypeScript
    VUEJS   (en hausse)         JS/sauceVueJS

## VARIABLES AVEC VUEJS

    ON PEUT DEFINIR DES VARIABLES VueJS

## CONDITIONS ET BOUCLES

    ON PEUT AJOUTER DU CODE VueJS DANS LE HTML POUR FAIRE 
    DES CONDITIONS (if...else)
    DES BOUCLES (for...)

## SPA Single Page Application

    TOUT TIENT EN UNE SEULE PAGE
    => QUAND L'UTILISATEUR CLIQUE SUR UN LIEN, 
            IL CROIT CHANGER DE PAGE
            (FAUX => DETRUIT LA PAGE ACTUELLE ET RECREE LA NOUVELLE PAGE)
        EN FAIT, ON RESTE SUR LA MEME PAGE ET ON CHANGE LE CONTENU DE LA PAGE...

    ATTENTION: AVEC VUEJS, ON RAJOUTE DU CODE QUI N'EST PAS VALIDE EN HTML5
        => RISQUE DE PERDRE DU REFERENCEMENT AVEC LES MOTEURS DE RECHERCHE

        DANS LES PARTIES BACK-OFFICE:
            PROTEGEES ET DONC PAS ACCESSIBLES AUX MOTEURS DE RECHERCHE
            ET EN PLUS ON S'EN FICHE DU REFERENCEMENT
        => ON PEUT SE LACHER AVEC VUEJS        


## DATA BINDING MVVM => Model View ViewModel

    BINDING => ATTACHER 2 CHOSES ENSEMBLES
    DATA BINDING => ATTACHE LES DONNEES AUX AFFICHAGES
    SYNCHRONISATION AUTOMATIQUE
    => QUAND LE MODELE CHANGE => AUTOMATIQUEMENT LA VUE CHANGE POUR RESTER SYNCHRONISEE

    ET CA MARCHE AUSSI DANS LE SENS INVERSE
    => QUAND LA VUE CHANGE => ALORS LE MODELE EST AUSSI SYNCHRONISE


## jQuery vs VueJS

    jQuery EST EN PHASE RETRAITE...
    VueJS EST UN BON REMPLACANT POUR LES WebApps MODERNES


## COMPOSANTS UI BASES SUR VueJS

    https://vuetifyjs.com/fr-FR/

    CHERCHER SUR GOOGLE...

## EXEMPLE PAGE HTML

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAGE AVEC VUEJS</title>
    <style>
html, body {
    font-size:16px;    
}

* {
    box-sizing: border-box;
}

.containerUpdate {
    width:100%;
    height:100%;
    position:fixed;
    top:0;
    left:0;
    z-index:999;
    background-color:rgba(0, 0, 0, 0.8);
    color: white;
    padding:10vmax 10vmax;
}

.containerUpdate input {
    width:100%;
}

form input, form textarea {
    display: block;
}

article {
    border:1px solid #cccccc;
    padding:0.25rem;
    margin:0.25rem;
}
    </style>
</head>
<body>
    <!-- balise racine dans laquelle VueJS va agir -->
    <div id="app">
        <header>
            <h1 :title="message">TITRE1</h1>
            {{ message }}
            <nav>
                <a href="#page1" @click="sectionActive = 'section1'">page1</a>
                <a href="#page2" @click="sectionActive = 'section2'">page2</a>
                <a href="#page3" @click="sectionActive = 'section3'">page3</a>
            </nav>
        <header>

        <section v-if="sectionActive == 'section1'">
            <h3>SECTION1: CRUD SUR UNE ENTITE1</h3>
            <button class="chargerEntite1" @click="chargerAjax">CHARGER LA LISTE</button>
            <h4>IL Y A {{ tabEntite1.length }} ELEMENTS DANS LA LISTE</h4>
            <div class="listeEntite1">
                <article v-for="entite1 in tabEntite1">
                    <h3>{{ entite1.titre }}</h3><button @click="clickUpdateEntite1(entite1)">MODIFIER</button>
                </article>
            </div>

            <div class="containerUpdate" v-if="updateEntite1">
                <h4>FORMULAIRE DE MODIFICATION</h4>
                <button @click="updateEntite1=null">fermer la popup</button>
                <input type="text" v-model="updateEntite1.titre">
            </div>
        </section>

        <section v-if="sectionActive == 'section2'">
            <h3>SECTION2: CRUD SUR UNE ENTITE2</h3>
            <input type="text" v-model="texteSaisi">
            <input type="text" v-model="texteSaisi2">
            <input type="text" v-model="texteSaisi">
            <p>{{ texteSaisi }}</p>
            <p>{{ texteSaisi2 }}</p>
            <p>NOMBRE TOTAL LETTRES: {{ texteSaisi.length + texteSaisi2.length }}</p>
        </section>

        <section v-if="sectionActive == 'section3'">
            <h3>SECTION3: CRUD SUR UNE ENTITE3</h3>
            <form action="">
                <input type="text" name="titre" v-model="titre5">
                <textarea name="contenu" v-model="contenu"></textarea>
            </form>
            <div>
                <h4>PREVISUALISATION</h4>
                <h5 :title="titre5">{{ titre5 }}</h5>
                <p>{{ contenu }}</p>
            </div>
        </section>


        <footer>
            <p>tous droits réservés</p>
        </footer>
    </div>

    <!-- CHARGEMENT DE CODE DE VUEJS -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- AJOUTER VOTRE CODE JS -->
    <script>
        var app = new Vue({
                // ON PEUT CHANGER DE DELIMITEUR POUR NE PAS ETRE EN CONFLIT AVEC TWIG
                // delimiters: ['${', '}'], 
                el: '#app', // ASSOCIE VUEJS AVEC VOTRE HTML
                methods: {
                    clickUpdateEntite1: function (entite1){
                        console.log(entite1);
                        // JE COPIE enite1 DANS updateEntite1
                        app.updateEntite1 = entite1;
                    },
                    // ICI JE VAIS CREER MES FONCTIONS POUR VUEJS
                    chargerAjax: function () {
                        fetch('ajax.php')
                            .then(function (response) {
                                return response.json();
                            })
                            .then(function (objetResponse) {
                                console.log(objetResponse);
                                // ON VA COPIER LE TABLEAU RECU DU SERVEUR DANS LA VARIABLE VueJS
                                app.tabEntite1 = objetResponse.tabEntite1;
                                // IL FAUT REMETTRE A JOUR LA LISTE DES ARTICLES
                            })
                    }
                },
                data: {
                    // ICI ON CREE NOS VARIABLES VUEJS
                    message: 'Hello Vue !',
                    sectionActive: 'section1',
                    tabEntite1: [],
                    texteSaisi: '',
                    texteSaisi2: '',
                    updateEntite1: null,
                    titre5: '',
                    contenu:''

                    /*
                    tabEntite1: [ 
                        {
                            titre: 'titre1'
                        }, 
                        {
                            titre: 'titre2'
                        }, 
                        {
                            titre: 'titre3'
                        }, 
                        {
                            titre: 'titre4'
                        }
                    ]
                    */
                }
            })
    </script>

    <script>        
        // EN JS CLASSIQUE
        // var boutonEntite1 = document.querySelector(".chargerEntite1");
        // boutonEntite1.addEventListener("click", app.chargerAjax);
    </script>
</body>
</html>

```









