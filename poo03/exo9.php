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
$page     = new PageMax;

$page
    ->ajouterInfo("h1",         "TITRE1")
    ->ajouterInfo("footer",     "TOUS DROITS RESERVES")
    ->ajouterInfo("section1",   "TITRE DE MA SECTION1")
    ->ajouterInfo("section2",   "TITRE DE MA SECTION2")
    ->ajouterInfo("bloc1",      "BLOC1")
    ->ajouterInfo("bloc2",      "BLOC2")
    ->ajouterInfo("bloc3",      "BLOC3")
    ->ajouterInfo("bloc4",      "BLOC4")
    ->ajouterInfo("bloc5",      "BLOC5")

    ->ajouterMenu("accueil",    "index.php")
    ->ajouterMenu("galerie",    "galerie.php")
    ->ajouterMenu("contact",    "contact.php")

    ->ajouterBloc("section1",   ["bloc1", "bloc2"])
    ->ajouterBloc("section2",   ["bloc3", "bloc4", "bloc5"])

    ->afficherHTML();
