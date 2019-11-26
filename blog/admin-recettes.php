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
            <h2>READ DES RECETTES</h2>
            <div class="ligne x3col listeRecette">
<?php
// JE VAIS APPELER MA FONCTION
$tabResultat = lireTableSQL("recettes", "ORDER BY id DESC");
// JE PARCOURS LE TABLEAU AVEC UNE BOUCLE
foreach($tabResultat as $indice => $tabAssoRecette)
{
    // AFFICHER CHAQUE RECETTE
    // ASTUCE extract
    // => CA VA ME CREER DES VARIABLES A PARTIR DU NOM DES COLONNES
    extract($tabAssoRecette);

    // JE PEUX UTILISER LES VARIABLES POUR CONSTRUIRE LE CODE THML
    // ET AFFICHER LE CODE HTML
    echo
<<<CODEHTML

    <article>
        <strong>$id</strong>
        <h3>$titre</h3>
        <p>$description</p>
        <button>modifier</button>
        <button>supprimer</button>
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
</body>

</html>