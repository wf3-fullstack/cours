<?php
require_once "php/autoload.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form>* {
            display: block;
            margin: 0.25rem;
        }

        table {
            width: 100%;
        }

        table td {
            border: 1px solid #cccccc;
            padding: 0.25rem;
        }

        tr.admin td {
            background-color: orange;
        }

        section.create {
            margin-top: 2rem;
            border-top: 1rem solid #aaaaaa;
        }

        section#sectionDelete {
            background-color: orange;
            padding: 2rem;
        }
    </style>
</head>

<body>
    <header>
        <h1>MA PAGE ADMIN</h1>
        <nav>
            <a href="index.php">accueil</a>
            <a href="blog.php">blog</a>
            <a href="contact.php">contact</a>
            <!-- POUR LE DEV -->
            <a href="admin.php">admin</a>
        </nav>
    </header>
    <main>
        <section id="sectionDelete">
            <h2>FORMULAIRE DE DELETE GENERAL</h2>
            <!-- ON RESTE SUR LA MEME PAGE SI ON A action="" -->
            <form class="formDelete" action="#sectionDelete" method="POST">
                <input type="text" name="nomTable" required placeholder="nomTable">
                <input type="text" name="id" required placeholder="id">
                <button type="submit">SUPPRIMER UNE LIGNE</button>
                <input type="hidden" name="identifiantFormulaire" value="delete">
            </form>
        </section>

        <section class="create">
            <h2>FORMULAIRE CREATE SUR LA TABLE SQL ingredient_recette</h2>
            <!-- ON RESTE SUR LA MEME PAGE SI ON A action="" -->
            <form action="" method="POST">
                <input type="number" name="id_ingredient" required placeholder="id_ingredient">
                <input type="number" name="id_recette" required placeholder="id_recette">
                <input type="text" name="quantite" required placeholder="quantite">
                <button type="submit">PUBLIER UN ingredient_recette</button>
                <input type="hidden" name="identifiantFormulaire" value="ingredient_recette">
            </form>
        </section>

        <section class="sectionIngredientRecetteUpdate">
            <h2>FORMULAIRE UPDATE SUR LA TABLE SQL ingredient_recette</h2>
            <!-- ON RESTE SUR LA MEME PAGE SI ON A action="" -->
            <form class="formIngredientRecetteUpdate" action="" method="POST">
                <input type="number" name="id_ingredient" required placeholder="id_ingredient">
                <input type="number" name="id_recette" required placeholder="id_recette">
                <input type="text" name="quantite" required placeholder="quantite">
                <input type="number" name="id" placeholder="id" required>
                <button type="submit">MODIFIER UN ingredient_recette</button>
                <input type="hidden" name="identifiantFormulaire" value="ingredient_recetteUpdate">
            </form>
        </section>


        <section>
            <h2>READ SUR LA TABLE SQL ingredient_recette</h2>
            <table class="ingredient_recetteList">
                <tbody>
                    <?php
                    // CODE PHP POUR RECUPERER LES LIGNES DE LA TABLE SQL content
                    // READ
                    $objetModel = new Model;
                    $tabResultat = $objetModel->lireTableSQL("ingredient_recette", "ORDER BY id DESC");
                    foreach ($tabResultat as $tabLigne) {
                        $tabFiltre = array_map("htmlspecialchars", $tabLigne);
                        extract($tabFiltre);

                        echo
                            <<<CODEHTML
    <tr class="tr-$id">
        <td>$id</td>
        <td>$id_ingredient</td>
        <td>$id_recette</td>
        <td>$quantite</td>
        <td><button class="update" data-table="ingredient_recette" 
                    data-id="$id" data-id_content="$id_ingredient" data-id_user="$id_recette">modifier</button></td>
        <td><button class="delete" data-table="ingredient_recette" data-id="$id">supprimer</button></td>
    </tr>
CODEHTML;
                    }
                    ?>
                </tbody>
            </table>
        </section>


        <section class="create">
            <h2>FORMULAIRE CREATE SUR LA TABLE SQL user</h2>
            <!-- ON RESTE SUR LA MEME PAGE SI ON A action="" -->
            <form action="" method="POST">
                <input type="email" name="email" required placeholder="email">
                <input type="text" name="login" required placeholder="login">
                <input type="password" name="password" required placeholder="password">
                <input type="number" name="level" required placeholder="level">
                <button type="submit">PUBLIER UN USER</button>
                <input type="hidden" name="identifiantFormulaire" value="user">
            </form>
        </section>

        <section class="sectionUserUpdate">
            <h2>FORMULAIRE UPDATE SUR LA TABLE SQL user</h2>
            <!-- ON RESTE SUR LA MEME PAGE SI ON A action="" -->
            <form class="formUserUpdate" action="" method="POST">
                <input type="email" name="email" required placeholder="email">
                <input type="text" name="login" required placeholder="login">
                <input type="password" name="password" placeholder="password">
                <input type="number" name="level" required placeholder="level">
                <input type="number" name="id" placeholder="id" required>
                <button type="submit">MODIFIER UN USER</button>
                <input type="hidden" name="identifiantFormulaire" value="userUpdate">
            </form>
        </section>

        <section>
            <h2>READ SUR LA TABLE SQL ingredient</h2>
            <table class="userList">
                <tbody>
                    <?php
                    // CODE PHP POUR RECUPERER LES LIGNES DE LA TABLE SQL content
                    // READ
                    $objetModel = new Model;
                    $tabResultat = $objetModel->lireTableSQL("ingredient", "ORDER BY id DESC");
                    foreach ($tabResultat as $tabLigne) {
                        // https://www.php.net/manual/fr/function.array-map.php
                        // ON PASSE LE CONTENU DES COLONNES A TRAVERS UN FILTRE 
                        // POUR DESACTIVER LES BALISES HTML
                        // => PROTECTION CONTRE LES ATTAQUES XSS 
                        // XSS => CROSS SITE SCRIPTING
                        // http://htmlpurifier.org/comparison
                        // https://github.com/michelf/php-markdown

                        // https://www.php.net/manual/fr/function.array-map.php
                        // https://www.php.net/manual/fr/function.htmlentities.php
                        // https://www.php.net/manual/fr/function.htmlspecialchars.php
                        $tabFiltre = array_map("htmlspecialchars", $tabLigne);
                        extract($tabFiltre);

                        echo
                            <<<CODEHTML
        <tr class="tr-$id">
            <td>$id</td>
            <td>$email</td>
            <td>$login</td>
            <td>$password</td>
            <td>$level</td>
            <td>$dateCreation</td>
            <td><button class="update" data-table="user" 
                        data-id="$id" data-email="$email" data-login="$login"
                        data-level="$level">modifier</button></td>
            <td><button class="delete" data-table="user" data-id="$id">supprimer</button></td>
        </tr>
CODEHTML;
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section class="create">
            <h2>FORMULAIRE CREATE SUR LA TABLE SQL content</h2>
            <!-- ON RESTE SUR LA MEME PAGE SI ON A action="" -->
            <form action="" method="POST">
                <input type="text" name="filename" required placeholder="filename">
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="contenuPage" cols="60" rows="5" required placeholder="contenuPage"></textarea>
                <input type="text" name="photo" required placeholder="photo">
                <input type="text" name="categorie" required placeholder="categorie">
                <input type="text" name="template" placeholder="template">
                <input type="number" name="id_user" placeholder="id_user">
                <button type="submit">PUBLIER UN CONTENU</button>
                <input type="hidden" name="identifiantFormulaire" value="content">
            </form>
        </section>

        <section class="sectionContentUpdate">
            <h2>FORMULAIRE DE UPDATE SUR LA TABLE SQL content</h2>
            <!-- ON RESTE SUR LA MEME PAGE SI ON A action="" -->
            <form class="formContentUpdate" action="" method="POST">
                <input type="text" name="filename" required placeholder="filename">
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="contenuPage" cols="60" rows="5" required placeholder="contenuPage"></textarea>
                <input type="text" name="photo" required placeholder="photo">
                <input type="text" name="categorie" required placeholder="categorie">
                <input type="text" name="template" placeholder="template">
                <input type="number" name="id" placeholder="id" required>
                <input type="number" name="id_user" placeholder="id_user">
                <button type="submit">MODIFIER UN CONTENU</button>
                <input type="hidden" name="identifiantFormulaire" value="contentUpdate">
            </form>

        </section>

        <section>
            <h2>READ SUR LA TABLE SQL recette</h2>
            <table class="contentList">
                <tbody>
                    <?php
                    // CODE PHP POUR RECUPERER LES LIGNES DE LA TABLE SQL content
                    // READ
                    $objetModel = new Model;
                    $tabResultat = $objetModel->lireTableSQL("recette", "ORDER BY id DESC");
                    foreach ($tabResultat as $tabLigne) {
                        // https://www.php.net/manual/fr/function.array-map.php
                        // ON PASSE LE CONTENU DES COLONNES A TRAVERS UN FILTRE 
                        // POUR DESACTIVER LES BALISES HTML
                        // => PROTECTION CONTRE LES ATTAQUES XSS 
                        // XSS => CROSS SITE SCRIPTING
                        // http://htmlpurifier.org/comparison
                        // https://github.com/michelf/php-markdown

                        // https://www.php.net/manual/fr/function.array-map.php
                        // https://www.php.net/manual/fr/function.htmlentities.php
                        // https://www.php.net/manual/fr/function.htmlspecialchars.php
                        $tabFiltre = array_map("htmlspecialchars", $tabLigne);
                        extract($tabFiltre);

                        echo
                            <<<CODEHTML
        <tr class="$filename tr-$id">
            <td>$id</td>
            <td>$filename</td>
            <td>$titre</td>
            <td class="contenuPage">$contenuPage</td>
            <td>$photo</td>
            <td>$datePublication</td>
            <td>$categorie</td>
            <td>$template</td>
            <td>$id_user</td>
            <td><button class="update" data-table="content" 
                        data-id="$id" data-filename="$filename" data-titre="$titre"
                        data-photo="$photo" data-categorie="$categorie" data-template="$template" data-id_user="$id_user">modifier</button></td>
            <td><button class="delete" data-table="content" data-id="$id">supprimer</button></td>
        </tr>
CODEHTML;
                    }
                    ?>
                </tbody>
            </table>
        </section>

    </main>


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
        var tabButtonUserUpdate = document.querySelectorAll(".contentList button.update");
        tabButtonUserUpdate.forEach(function(button) {
            button.addEventListener("click", function(event) {
                console.log(event.target);
                // récupérer dans les attributs les infos qui m'intéressent
                var id = event.target.getAttribute("data-id");
                var filename = event.target.getAttribute("data-filename");
                var titre = event.target.getAttribute("data-titre");
                var photo = event.target.getAttribute("data-photo");
                var categorie = event.target.getAttribute("data-categorie");
                var template = event.target.getAttribute("data-template");
                var id_user = event.target.getAttribute("data-id_user");

                var selecteurTd = ".contentList tr.tr-" + id + " td.contenuPage";
                console.log(selecteurTd);
                var contenuPage = document.querySelector(selecteurTd);
                console.log(contenuPage);

                // copier les infos dans le formulaire
                var inputId = document.querySelector(".formContentUpdate input[name=id]");
                var inputFilename = document.querySelector(".formContentUpdate input[name=filename]");
                var inputTitre = document.querySelector(".formContentUpdate input[name=titre]");
                var inputPhoto = document.querySelector(".formContentUpdate input[name=photo]");
                var inputCategorie = document.querySelector(".formContentUpdate input[name=categorie]");
                var inputTemplate = document.querySelector(".formContentUpdate input[name=template]");
                var inputIdUser = document.querySelector(".formContentUpdate input[name=id_user]");

                var inputContenuPage = document.querySelector(".formContentUpdate [name=contenuPage]");

                inputId.value = id;
                inputFilename.value = filename;
                inputTitre.value = titre;
                inputPhoto.value = photo;
                inputCategorie.value = categorie;
                inputTemplate.value = template;
                inputIdUser.value = id_user;

                inputContenuPage.innerHTML = contenuPage.innerHTML;

                // ET EN PLUS ON VA AJOUTER LA CLASSE show SUR LA SECTION
                var sectionContentUpdate = document.querySelector(".sectionContentUpdate");
                sectionContentUpdate.classList.add("show"); // attention pas . car pas sélecteur
            });
        });


        // USER
        // AJOUTER LE CODE JS POUR GERER LE CLICK SUR LE BOUTON UPDATE
        var tabButtonUserUpdate = document.querySelectorAll(".userList button.update");
        tabButtonUserUpdate.forEach(function(button) {
            button.addEventListener("click", function(event) {
                console.log(event.target);
                // récupérer dans les attributs les infos qui m'intéressent
                var id = event.target.getAttribute("data-id");
                var login = event.target.getAttribute("data-login");
                var email = event.target.getAttribute("data-email");
                var level = event.target.getAttribute("data-level");


                // copier les infos dans le formulaire
                var inputId = document.querySelector(".formUserUpdate input[name=id]");
                var inputLogin = document.querySelector(".formUserUpdate input[name=login]");
                var inputEmail = document.querySelector(".formUserUpdate input[name=email]");
                var inputLevel = document.querySelector(".formUserUpdate input[name=level]");

                inputId.value = id;
                inputLogin.value = login;
                inputEmail.value = email;
                inputLevel.value = level;


                // ET EN PLUS ON VA AJOUTER LA CLASSE show SUR LA SECTION
                var sectionUserUpdate = document.querySelector(".sectionUserUpdate");
                sectionUserUpdate.classList.add("show"); // attention pas . car pas sélecteur
            });
        });

        // content_user
        // AJOUTER LE CODE JS POUR GERER LE CLICK SUR LE BOUTON UPDATE
        var tabButtonUserUpdate = document.querySelectorAll(".content_userList button.update");
        tabButtonUserUpdate.forEach(function(button) {
            button.addEventListener("click", function(event) {
                console.log(event.target);
                // récupérer dans les attributs les infos qui m'intéressent
                var id = event.target.getAttribute("data-id");
                var id_content = event.target.getAttribute("data-id_content");
                var id_user = event.target.getAttribute("data-id_user");


                // copier les infos dans le formulaire
                var inputId = document.querySelector(".formContentUserUpdate input[name=id]");
                var inputIdContent = document.querySelector(".formContentUserUpdate input[name=id_content]");
                var inputIdUser = document.querySelector(".formContentUserUpdate input[name=id_user]");

                inputId.value = id;
                inputIdContent.value = id_content;
                inputIdUser.value = id_user;


                // ET EN PLUS ON VA AJOUTER LA CLASSE show SUR LA SECTION
                var sectionUserUpdate = document.querySelector(".sectionContentUserUpdate");
                sectionUserUpdate.classList.add("show"); // attention pas . car pas sélecteur
            });
        });
    </script>
</body>

</html>