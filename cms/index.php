<?php
require_once "php/mes-fonctions.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site CMS</title>
    <style>
        article img {
            max-width: 400px;
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header>
        <h1>SITE CMS</h1>
        <nav>
            <?php afficherMenuDynamique("menu") ?>
        </nav>
    </header>
    <main>

        <section>
            <h2>ACCUEIL</h2>
            <div class="listeContenu">
                <?php
                $tabContenu = lireTableSQL("contenu", "ORDER BY datePublication DESC", "WHERE categorie='accueil'");
                foreach ($tabContenu as $indice => $tabAssoContenu) {
                    extract($tabAssoContenu);

                    echo
                        <<<CODEHTML

    <article>
        <h3>$titre</h3>
        <img src="$photo">
        <p>$description</p>
    </article>

CODEHTML;
                }
                ?>
            </div>
        </section>

        <section>
            <h2>GALERIE</h2>
            <div class="listeContenu">
                <?php
                $tabContenu = lireTableSQL("contenu", "ORDER BY datePublication DESC", "WHERE categorie='galerie'");
                foreach ($tabContenu as $indice => $tabAssoContenu) {
                    extract($tabAssoContenu);

                    echo
                        <<<CODEHTML

    <article>
        <img src="$photo">
    </article>

CODEHTML;
                }
                ?>
            </div>
        </section>


        <section>
            <h2>SERVICES</h2>
            <div class="listeContenu">
                <?php
                $tabContenu = lireTableSQL("contenu", "ORDER BY datePublication DESC", "WHERE categorie='services'");
                foreach ($tabContenu as $indice => $tabAssoContenu) {
                    extract($tabAssoContenu);

                    echo
                        <<<CODEHTML

    <article>
        <img src="$photo">
    </article>

CODEHTML;
                }
                ?>
            </div>
        </section>

    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>

</html>