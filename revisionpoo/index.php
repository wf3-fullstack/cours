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
</head>

<body>
    <header>
        <h1>MA PAGE ADMIN https://sql.sh/cours/jointures</h1>
        <nav>
            <a href="index.php">accueil</a>
            <a href="admin.php">admin</a>
        </nav>
    </header>
    <main>
        <section>
            <h3>AFFICHER LES RECETTES ET LEURS INGREDIENTS</h3>
            <div>
                <?php
                // CREER UN OBJET ET APPELER LA METHODE envoyerRequeteteSQL
                $requetePrepareeSQL =
                    <<<CODESQL

SELECT *
FROM ingredient_recette
INNER JOIN ingredient
ON ingredient_recette.id_ingredient = ingredient.id
INNER JOIN recette
ON ingredient_recette.id_recette = recette.id

CODESQL;

                $objetModel = new Model;
                $pdoStatement = $objetModel->envoyerRequeteSQL($requetePrepareeSQL, []);
                $tabResultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($tabResultat as $tabLigne) {
                    $tabLigne = array_map("htmlspecialchars", $tabLigne);
                    extract($tabLigne);
                    echo
                        <<<CODEHTML
    <article>
        <h3>$titre</h3>
        <h4>$quantite de $nom</h4>
    </article>
CODEHTML;
                }

                ?>
            </div>
        </section>
    </main>
</body>

</html>