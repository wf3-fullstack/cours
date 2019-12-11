<?php

// AJOUTER LE CODE MANQUANT EN POO
// POUR PRODUIRE LE CODE SOURCE HTML
// (ON VOIT CE CODE SI ON AFFICHE LE CODE SOURCE DE LA PAGE...)

/*
<header>
    <h1>TITRE1</h1>
</header>
<main>
    <section>
        CONTENU DE MA SECTION
    </section>
</main>
<footer>
    TOUS DROITS RESERVES
</footer>
*/


// CODE NON MODIFIABLE
$h1         = new Info("TITRE1");
$section    = new Info("CONTENU DE MA SECTION");
$copyright  = new Info("TOUS DROITS RESERVES");

$header = new Header($h1);
$main   = new Main($section);
$footer = new Footer($copyright);

echo
    <<<CODEHTML

$header
$main
$footer

CODEHTML;
