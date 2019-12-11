<?php

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*
<header>
    <h1>TITRE1</h1>
    <nav>
        <ul>
            <li><a href="index.php">accueil</a></li>
            <li><a href="galerie.php">galerie</a></li>
            <li><a href="contact.php">contact</a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        CONTENU DE MA SECTION1
    </section>
    <section>
        CONTENU DE MA SECTION2
    </section>
</main>
<footer>
    TOUS DROITS RESERVES
</footer>
*/


// CODE NON MODIFIABLE
$tabInfo = [
    "h1"        => new Info("TITRE1"),
    "section1"  => new Info("CONTENU DE MA SECTION1"),
    "section2"  => new Info("CONTENU DE MA SECTION2"),
    "section3"  => new Info("CONTENU DE MA SECTION3"),
    "footer"    => new Info("TOUS DROITS RESERVES"),
];

$tabMenu = [
    new Menu("accueil", "index.php"),
    new Menu("galerie", "galerie.php"),
    new Menu("contact", "contact.php"),
];


$header     = new Header($tabInfo, $tabMenu);
$main       = new MainMulti($tabInfo);
$footer     = new Footer($tabInfo);

$main->ajouter("section1");
$main->ajouter("section2");

echo
    <<<CODEHTML

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>mon title</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
$header
$main
$footer
    </body>
</html>

CODEHTML;
