<?php

// CHARGER MES FONCTIONS POUR POUVOIR LES APPELER
require_once "php/mes-fonctions.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Recettes</title>

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="admin">
    <header>
        <h1>ADMIN RECETTES</h1>
        <nav>
            <a href="recettes.php">recettes</a>
            <a href="admin-recettes.php">admin-recettes</a>
        </nav>
    </header>
    <main>
        <section>
            <h3>CREATE DES RECETTES</h3>
            <form action="traitement.php" method="POST">
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="ingredients" cols="80" rows="6" required placeholder="ingredients"></textarea>
                <textarea name="description" cols="80" rows="6" required placeholder="description"></textarea>
                <!-- POUR LE MOMENT, ON NE PROPOSE PAS L'UPLOAD -->
                <!-- ON VA SIMPLEMENT PROPOSER DE CHOISIR PARMI UNE LISTE DE PHOTOS DEJA PRETES -->
                <select name="image">
                    <option value="assets/img/photo1.jpg">la photo 1</option>
                    <option value="assets/img/photo2.jpg">la photo 2</option>
                    <option value="assets/img/photo3.jpg">la photo 3</option>
                    <option value="assets/img/photo4.jpg">la photo 4</option>
                    <option value="assets/img/photo5.jpg">la photo 5</option>
                    <option value="assets/img/photo6.jpg">la photo 6</option>
                </select>
                <input type="text" name="typeRecette" required placeholder="typeRecette">
                <button type="submit">PUBLIER LA RECETTE</button>
                <!-- partue technique -->
                <input type="hidden" name="identifiantFormulaire" value="recettes">
            </form>
        </section>

        <section>
            <h3>UPDATE DES RECETTES</h3>
            <form class="formUpdate" action="traitement.php" method="POST">
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="ingredients" cols="80" rows="6" required placeholder="ingredients"></textarea>
                <textarea name="description" cols="80" rows="6" required placeholder="description"></textarea>
                <!-- POUR LE MOMENT, ON NE PROPOSE PAS L'UPLOAD -->
                <!-- ON VA SIMPLEMENT PROPOSER DE CHOISIR PARMI UNE LISTE DE PHOTOS DEJA PRETES -->
                <select name="image">
                    <option value="assets/img/photo1.jpg">la photo 1</option>
                    <option value="assets/img/photo2.jpg">la photo 2</option>
                    <option value="assets/img/photo3.jpg">la photo 3</option>
                    <option value="assets/img/photo4.jpg">la photo 4</option>
                    <option value="assets/img/photo5.jpg">la photo 5</option>
                    <option value="assets/img/photo6.jpg">la photo 6</option>
                </select>
                <input type="text" name="typeRecette" required placeholder="typeRecette">
                <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s") ?>" placeholder="datePublication">
                <button type="submit">MODIFIER LA RECETTE</button>
                <!-- partue technique -->
                <input type="hidden" name="identifiantFormulaire" value="recettes-update">
                <input type="text" name="id" value="" placeholder="id">
            </form>
        </section>


        <section>
            <h2>READ DES RECETTES</h2>
            <div class="ligne x3col listeRecette">
                <?php
                // JE VAIS APPELER MA FONCTION
                $tabResultat = lireTableSQL("recettes", "ORDER BY id DESC");
                // JE PARCOURS LE TABLEAU AVEC UNE BOUCLE

                foreach ($tabResultat as $indice => $tabAssoRecette) {
                    // AFFICHER CHAQUE RECETTE
                    // https://www.php.net/manual/fr/function.extract.php
                    // ASTUCE extract
                    // => CA VA ME CREER DES VARIABLES A PARTIR DU NOM DES COLONNES
                    extract($tabAssoRecette);

                    // JE PEUX UTILISER LES VARIABLES POUR CONSTRUIRE LE CODE THML
                    // ET AFFICHER LE CODE HTML
                    echo
                        <<<CODEHTML

    <article>
        <h3 class="id" contentEditable="true">$id</h3>
        <h3 class="titre" contentEditable="true">$titre</h3>
        <p class="ingredients" contentEditable="true">$ingredients</p>
        <p class="description" contentEditable="true">$description</p>
        <p class="typeRecette" contentEditable="true">$typeRecette</p>
        <p class="datePublication" contentEditable="true">$datePublication</p>
        <img class="image" src="$image">
        <button class="recupModif">modifier</button>
        <form method="POST" action="traitement.php">
            <button type="submit">supprimer</button>
            <input type="hidden" name="identifiantFormulaire" value="delete">
            <input type="hidden" name="nomTable" value="recettes">
            <input type="hidden" name="id" value="$id">
        </form>
    </article>

CODEHTML;
                }

                ?>
            </div>
        </section>
    </main>
    <footer>
        tous droits réservés
    </footer>

    <script>
        // on a un bouton "modifier" par recette 
        var listeBoutonModif = document.querySelectorAll(".recupModif");
        // https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Array/forEach
        listeBoutonModif.forEach(function(boutonModifier) {
            // sur chaque bouton, je rajoute un event listener sur le click
            boutonModifier.addEventListener("click", function(event) {
                // je dois copier les informations de la recette dans le formulaire de UPDATE
                console.log(event.target);
                console.log(event.target.parentNode);
                // JE REMONTE AU PARENT
                var baliseArticle = event.target.parentNode;
                // JE REDESCEND SUR LES BALISES ENFANTS
                var titre = baliseArticle.querySelector(".titre").innerHTML;
                console.log(titre);

                var formUpdate = document.querySelector(".formUpdate");
                var inputTitre = formUpdate.querySelector("input[name=titre]");
                // COPIER LE TITRE DANS LE CHAMP DU FORMULAIRE
                inputTitre.value = titre;

                // IL FAUT LE FAIRE SUR LES AUTRES INFOS...
                // ...
            })
        });
    </script>
</body>

</html>