<?php
// AJOUTER LE CODE MANQUANT EN POO
// POUR PRODUIRE LE CODE HTML
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

$tabInfo = [
    "h1"        => new Info("TITRE1"),
    "section1"  => new Info("CONTENU DE MA SECTION1"),
    "section2"  => new Info("CONTENU DE MA SECTION2"),
    "section3"  => new Info("CONTENU DE MA SECTION3"),
    "bloc1"     => new Info("BLOC1"),
    "bloc2"     => new Info("BLOC2"),
    "bloc3"     => new Info("BLOC3"),
    "bloc4"     => new Info("BLOC4"),
    "bloc5"     => new Info("BLOC5"),
    "footer"    => new Info("TOUS DROITS RESERVES"),
];

$tabMenu = [
    new Menu("accueil", "index.php"),
    new Menu("galerie", "galerie.php"),
    new Menu("contact", "contact.php"),
];

$header->ajouterInfo($tabInfo, "h1");
$header->ajouterMenu($tabMenu);

$main->ajouterInfo($tabInfo);
$main->ajouterBloc("section1", ["bloc1", "bloc2"]);
$main->ajouterBloc("section2", ["bloc3", "bloc4", "bloc5"]);

$footer->ajouterInfo($tabInfo, "footer");

echo
<<<CODEHTML

$header
$main
$footer

CODEHTML;
