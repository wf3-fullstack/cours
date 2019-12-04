<?php

// CHARGER MES FONCTIONS AU DEBUT
require_once "php/mes-fonctions.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN CMS</title>
    <style>
        html,
        body {
            font-size: 16px;
        }

        .nodisplay {
            display: none;
        }

        table {
            width: 100%;
        }

        td {
            border: 1px solid #123456;
            padding: 0.2rem;
        }

        /* LIGHTBOX SUR sectionUserUpdate */
        .sectionUserUpdate {
            display: none;
            transition: all 5s linear;
            opacity: 0;
        }

        /* LA BALISE DOIT AVOIR LES 2 CLASSES (AND) */
        .sectionUserUpdate.show {
            opacity: 1;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.8);
            width: 100%;
            height: 100%;
        }

        .sectionUserUpdate h2 {
            color: #cccccc;
        }

        .sectionUserUpdate form {}

        table {
            width: 100%;
            max-width: 100%;
        }

        table img {
            width: 100%;
            object-fit: cover;
            max-width: 200px;
        }
    </style>
</head>

<body>
    <header>
        <h1>ADMIN CMS</h1>
        <nav>
            <a href="index.php">accueil</a>
            <a href="contact.php">contact</a>
            <a href="admin.php">admin</a>
            <a href="inscription.php">inscription</a>
        </nav>
    </header>
    <main>

        <section>
            <h2>FORMULAIRE CREATE SUR TABLE SQL contenu</h2>
            <!-- 
                LE NAVIGATEUR VA AJOUTER DES DELIMITEURS 
                POUR MIEUX SEPARER LE CONTENU DU FICHIER 
                DES AUTRES INFORMATIONS DU FORMULAIRE 
            -->
            <form action="traitement.php" method="POST" enctype="multipart/form-data">
                <!-- PARTIE PUBLIQUE VISIBLE DU FORMULAIRE-->
                <label>
                    <div>titre</div>
                    <input type="text" name="titre" required placeholder="votre titre" maxlength="160">
                </label>
                <label>
                    <div>photo</div>
                    <!-- permet de choisir un fichier -->
                    <input type="file" name="photo" required placeholder="votre photo" maxlength="160">
                </label>
                <label>
                    <div>description</div>
                    <textarea name="description" required cols="80" rows="8" placeholder="votre description"></textarea>
                </label>
                <label>
                    <div>categorie</div>
                    <input type="text" name="categorie" required placeholder="votre categorie" maxlength="160">
                </label>
                <div>
                    <button type="submit">PUBLIER VOTRE CONTENU</button>
                </div>
                <!-- PARTIE TECHNIQUE INVISIBLE DE NOTRE FRAMEWORK -->
                <input type="hidden" name="identifiantFormulaire" value="contenu">
                <div class="alert">
                    <!-- ICI AVEC AJAX, JE POURRAI AFFICHER LE MESSAGE DE CONFIRMATION -->
                </div>
            </form>
        </section>


        <section>
            <h2>READ SUR TABLE SQL contenu</h2>
            <h3>IL Y A <?php echo countSQL("contenu") ?> LIGNES DANS LA TABLE</h3>
            <div class="contenuList">
                <table>
                    <tbody>
                        <?php
                        // IL FAUT ALLER LIRE LES LIGNES DANS LA TABLE SQL contact
                        // JE VAIS UTILISER LA FONCTION lireLigneSQL
                        // => NE PAS OUBLIER DE CHARGER LE FICHIER mes-fonctions.php AVANT
                        // require_once "php/mes-fonctions.php";

                        $tabContact = lireTableSQL("contenu", "ORDER BY datePublication DESC");
                        // PARCOURIR LES ELEMENTS DU TABLEAU
                        foreach ($tabContact as $indice => $tabAssoContact) {
                            // ASTUCE: ON UTILISE extract
                            extract($tabAssoContact);
                            // => CREE LES VARIABLES AVEC LE NOM DES COLONNES
                            echo
                                <<<CODEHTML

                    <tr data-id="$id" class="art$id">
                        <td>$categorie</td>
                        <td>$titre</td>
                        <td><img src="$photo"></td>
                        <td><pre>$description</pre></td>
                        <td>$datePublication</td>
                        <td><button data-table="contenu" data-id="$id" class="delete">supprimer</button></td>
                    </tr>

CODEHTML;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </section>


        <section class="nodisplay">
            <h2>FORMULAIRE DE DELETE SUR TABLE SQL</h2>
            <form class="formDelete" action="traitement.php" method="POST">
                <input type="text" name="nomTable" required placeholder="nomTable">
                <input type="text" name="id" required placeholder="id de ligne">
                <button type="submit">supprimer</button>
                <!-- partie technique -->
                <input type="hidden" name="identifiantFormulaire" value="delete">
                <div class="alert">
                    <!-- ici on va afficher la confirmation-->
                </div>
            </form>
        </section>


        <section>
            <h2>READ SUR TABLE SQL contact</h2>
            <div class="contactList">
                <table>
                    <tbody>
                        <?php
                        // IL FAUT ALLER LIRE LES LIGNES DANS LA TABLE SQL contact
                        // JE VAIS UTILISER LA FONCTION lireLigneSQL
                        // => NE PAS OUBLIER DE CHARGER LE FICHIER mes-fonctions.php AVANT
                        // require_once "php/mes-fonctions.php";

                        $tabContact = lireTableSQL("contact", "ORDER BY datePublication DESC");
                        // PARCOURIR LES ELEMENTS DU TABLEAU
                        foreach ($tabContact as $indice => $tabAssoContact) {
                            // ASTUCE: ON UTILISE extract
                            extract($tabAssoContact);
                            // => CREE LES VARIABLES AVEC LE NOM DES COLONNES
                            echo
                                <<<CODEHTML

                    <tr data-id="$id" class="art$id">
                        <td>$email</td>
                        <td>$nom</td>
                        <td><pre>$message</pre></td>
                        <td>$datePublication</td>
                        <td><button data-table="contact" data-id="$id" class="delete">supprimer</button></td>
                    </tr>

CODEHTML;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="sectionUserUpdate">
            <h2>UPDATE SUR TABLE SQL user</h2>
            <form class="formUserUpdate" action="traitement.php" method="POST">
                <!-- PARTIE PUBLIQUE VISIBLE DU FORMULAIRE-->
                <label>
                    <div>email</div>
                    <input type="email" name="email" required placeholder="votre email" maxlength="160">
                </label>
                <label>
                    <div>login</div>
                    <input type="text" name="login" required placeholder="votre login" maxlength="160">
                </label>
                <label>
                    <div>level</div>
                    <input type="number" name="level" required placeholder="votre level">
                </label>
                <div>
                    <button class="cancel">annuler</button>
                    <button type="submit">MODIFIER LE COMPTE</button>
                </div>
                <!-- PARTIE TECHNIQUE INVISIBLE DE NOTRE FRAMEWORK -->
                <!-- ATTENTION: POUR LE UPDATE IL FAUT id POUR SELECTIONNER LA BONNE LIGNE -->
                <input type="hidden" name="id" value="" required>
                <input type="hidden" name="identifiantFormulaire" value="user-update">
                <div class="alert">
                    <!-- ICI AVEC AJAX, JE POURRAI AFFICHER LE MESSAGE DE CONFIRMATION -->
                </div>
            </form>
        </section>

        <section>
            <h2>READ SUR TABLE SQL user</h2>
            <div class="userList">
                <table>
                    <tbody>
                        <?php
                        // IL FAUT ALLER LIRE LES LIGNES DANS LA TABLE SQL contact
                        // JE VAIS UTILISER LA FONCTION lireLigneSQL
                        // => NE PAS OUBLIER DE CHARGER LE FICHIER mes-fonctions.php AVANT
                        // require_once "php/mes-fonctions.php";

                        $tabUser = lireTableSQL("user", "ORDER BY dateInscription DESC");
                        // PARCOURIR LES ELEMENTS DU TABLEAU
                        foreach ($tabUser as $indice => $tabAssoUser) {
                            // ASTUCE: ON UTILISE extract
                            extract($tabAssoUser);
                            // => CREE LES VARIABLES AVEC LE NOM DES COLONNES
                            echo
                                <<<CODEHTML

                    <tr data-id="$id" class="art$id">
                        <td>id: $id</td>
                        <td>$email</td>
                        <td>$login</td>
                        <td>$level</td>
                        <td><pre>$password</pre></td>
                        <td>$dateInscription</td>
                        <td><button class="update" data-id="$id" data-level="$level" data-login="$login" data-email="$email">modifier</button></td>
                        <td><button data-table="user" data-id="$id" class="delete">supprimer</button></td>
                    </tr>

CODEHTML;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </section>



    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>

    <script>
        // AJOUTER LE CODE JS POUR GERER LE CLICK SUR LE BOUTON DELETE
        var tabButtonDelete = document.querySelectorAll("button.delete");
        tabButtonDelete.forEach(function(button) {
            button.addEventListener("click", function(event) {
                // debug
                // event.target donne le bouton qui a activé la fonction
                console.log(event.target);
                // recupérer dans les attributs les infos nécessaires
                var nomTable = event.target.getAttribute("data-table");
                var id = event.target.getAttribute("data-id");
                // remplir le formulaire avec ces infos
                var inputNomTable = document.querySelector(".formDelete input[name=nomTable]");
                var inputId = document.querySelector(".formDelete input[name=id]");
                inputNomTable.value = nomTable;
                inputId.value = id;

                // MAINTENANT ON PEUT ENVOYER LE FORMULAIRE QUI EST REMPLI
                var formDelete = document.querySelector(".formDelete");
                // https://www.w3schools.com/jsref/met_form_submit.asp
                formDelete.submit();
            });
        });

        // AJOUTER LE CODE JS POUR GERER LE CLICK SUR LE BOUTON UPDATE
        var tabButtonUserUpdate = document.querySelectorAll(".userList button.update");
        tabButtonUserUpdate.forEach(function(button) {
            button.addEventListener("click", function(event) {
                console.log(event.target);
                // récupérer dans les attributs les infos qui m'intéressent
                var id = event.target.getAttribute("data-id");
                var email = event.target.getAttribute("data-email");
                var login = event.target.getAttribute("data-login");
                var level = event.target.getAttribute("data-level");
                // copier les infos dans le formulaire
                var inputId = document.querySelector(".formUserUpdate input[name=id]");
                var inputEmail = document.querySelector(".formUserUpdate input[name=email]");
                var inputLogin = document.querySelector(".formUserUpdate input[name=login]");
                var inputLevel = document.querySelector(".formUserUpdate input[name=level]");

                inputId.value = id;
                inputEmail.value = email;
                inputLogin.value = login;
                inputLevel.value = level;

                // ET EN PLUS ON VA AJOUTER LA CLASSE show SUR LA SECTION
                var sectionUserUpdate = document.querySelector(".sectionUserUpdate");
                sectionUserUpdate.classList.add("show"); // attention pas . car pas sélecteur
            });
        });

        // on va cacher la popup si on clique sur annuler
        var buttonCancel = document.querySelector("button.cancel");
        buttonCancel.addEventListener("click", function(event) {
            event.preventDefault();
            // ET EN PLUS ON VA ENLEVER LA CLASSE show SUR LA SECTION
            var sectionUserUpdate = document.querySelector(".sectionUserUpdate");
            sectionUserUpdate.classList.remove("show"); // attention pas . car pas sélecteur
        })
    </script>
</body>

</html>