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

        <section>
            <h2>FORMULAIRE CREATE SUR LA TABLE SQL content</h2>
            <form action="" method="POST">
                <input type="text" name="filename" required placeholder="filename">
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="contenuPage" cols="60" rows="5" required placeholder="contenuPage"></textarea>
                <input type="text" name="photo" required placeholder="photo">
                <input type="text" name="categorie" required placeholder="categorie">
                <input type="text" name="template" placeholder="template">
                <button type="submit">PUBLIER UN CONTENU</button>
                <input type="hidden" name="identifiantFormulaire" value="content">
            </form>
        </section>

        <section class="sectionContentUpdate">
            <h2>FORMULAIRE DE UPDATE SUR LA TABLE SQL content</h2>
            <form class="formContentUpdate" action="" method="POST">
                <input type="text" name="filename" required placeholder="filename">
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="contenuPage" cols="60" rows="5" required placeholder="contenuPage"></textarea>
                <input type="text" name="photo" required placeholder="photo">
                <input type="text" name="categorie" required placeholder="categorie">
                <input type="text" name="template" placeholder="template">
                <input type="number" name="id" placeholder="id" required>
                <button type="submit">MODIFIER UN CONTENU</button>
                <input type="hidden" name="identifiantFormulaire" value="contentUpdate">
            </form>

        </section>

        <section>
            <h2>FORMULAIRE DE DELETE GENERAL</h2>
            <form class="formDelete" action="" method="POST">
                <input type="text" name="nomTable" required placeholder="nomTable">
                <input type="text" name="id" required placeholder="id">
                <button type="submit">SUPPRIMER UNE LIGNE</button>
                <input type="hidden" name="identifiantFormulaire" value="delete">
            </form>
        </section>

        <section>
            <h2>READ SUR LA TABLE SQL content</h2>
            <table class="contentList">
                <tbody>
                    <?php
                    // CODE PHP POUR RECUPERER LES LIGNES DE LA TABLE SQL content
                    // READ
                    $objetModel = new Model;
                    $tabResultat = $objetModel->lireTableSQL("content", "ORDER BY id DESC");
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
            <td><button class="update" data-table="content" 
                        data-id="$id" data-filename="$filename" data-titre="$titre"
                        data-photo="$photo" data-categorie="$categorie" data-template="$template">modifier</button></td>
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

                var inputContenuPage = document.querySelector(".formContentUpdate [name=contenuPage]");

                inputId.value = id;
                inputFilename.value = filename;
                inputTitre.value = titre;
                inputPhoto.value = photo;
                inputCategorie.value = categorie;
                inputTemplate.value = template;

                inputContenuPage.innerHTML = contenuPage.innerHTML;

                // ET EN PLUS ON VA AJOUTER LA CLASSE show SUR LA SECTION
                var sectionContentUpdate = document.querySelector(".sectionContentUpdate");
                sectionContentUpdate.classList.add("show"); // attention pas . car pas sélecteur
            });
        });
    </script>
</body>

</html>