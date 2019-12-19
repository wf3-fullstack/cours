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
        <h2>TITRE DE LA SECTION1</h2>
        <div class="container">
            <div>
                BLOC1
            </div>
            <div>
                BLOC2
            </div>
        </div>
    </section>
    <section>
        <h2>TITRE DE LA SECTION2</h2>
        <div class="container">
            <div>
                BLOC3
            </div>
            <div>
                BLOC4
            </div>
            <div>
                BLOC5
            </div>
        </div>
    </section>
</main>
<footer>
    TOUS DROITS RESERVES
</footer>
*/



// CODE NON MODIFIABLE
$header     = new Header;
$main       = new MainV2;
$footer     = new Footer;


new Info("h1",      "TITRE1");
new Info("footer",  "TOUS DROITS RESERVES");

new Info("section1", "TITRE DE MA SECTION1");
new Info("section2", "TITRE DE MA SECTION2");

new Info("bloc1",   "BLOC1");
new Info("bloc2",   "BLOC2");
new Info("bloc3",   "BLOC3");
new Info("bloc4",   "BLOC4");
new Info("bloc5",   "BLOC5");

new Menu("accueil", "index.php");
new Menu("galerie", "galerie.php");
new Menu("contact", "contact.php");



$main->ajouterBloc("section1", ["bloc1", "bloc2"]);
$main->ajouterBloc("section2", ["bloc3", "bloc4", "bloc5"]);


echo
<<<CODEHTML

$header
$main
$footer

CODEHTML;
