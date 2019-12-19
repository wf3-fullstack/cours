<?php
/*
    COMPRENDRE QUE LES PROPRIETES STATIC DE CLASSE PERMETTENT
    DE PARTAGER UNE INFO ENTRE TOUS LES OBJETS DE LA MEME CLASSE
*/

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*
(CODE DU HEADER)
(CODE DE LA SECTION1)
(CODE DE LA SECTION2)
(CODE DU FOOTER)
*/

// CODE NON MODIFIABLE
$objet1 = new PageV2;
$objet1->ajouter("header", "(CODE DU HEADER)");

$objet2 = new PageV2;
$objet2->ajouter("footer", "(CODE DU FOOTER)");

$objet3 = new PageV2;
$objet3->ajouter("section1", "(CODE DE LA SECTION1)");

$objet4 = new PageV2;
$objet4->ajouter("section2", "(CODE DE LA SECTION2)");

$objet5 = new PageV2;
$objet5->afficherTab(["header", "section1", "section2", "footer"]);
