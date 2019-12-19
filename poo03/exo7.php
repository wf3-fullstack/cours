<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

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


// MON CODE

// CODE NON MODIFIABLE
new Info("h1",      "TITRE1");
new Info("section1", "CONTENU DE MA SECTION1");
new Info("section2", "CONTENU DE MA SECTION2");
new Info("section3", "CONTENU DE MA SECTION3");
new Info("footer",  "TOUS DROITS RESERVES");

new Menu("accueil", "index.php");
new Menu("actus", "actus.php");
new Menu("galerie", "galerie.php");
new Menu("contact", "contact.php");

$header     = new Header;
$main       = new MainMulti;
$footer     = new Footer;

$main->ajouter("section1");
$main->ajouter("section2");
$main->ajouter("section3");

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
