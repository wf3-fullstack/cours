<?php

// DECLARER MES FONCTIONS
// JE VEUX MAINTENANT RANGER MON CODE DANS UNE FONCTION
// ETAPE1: DECLARER/DEFINIR LA FONCTION
function afficherGalerie()
{
    // https://www.php.net/manual/fr/function.glob.php
    // la fonction glob construit le tableau avec les chemins des fichiers .jpg
    // $tableau = glob("assets/img/*.jpg");
    $tableau = glob("assets/img/*.{jpg,gif,png,jpeg}", GLOB_BRACE);
    foreach ($tableau as $indice => $image) {
        // JE VEUX ALTERNER ENTRE blue ET orange
        if ($indice % 2) {
            // SCENARIO orange
            $couleur = "orange";
        } else {
            // SCENARIO blue
            $couleur = "blue";
        }

        echo        // NE PAS OUBLIER echo POUR AFFICHER UN TEXTE PHP
            <<<TOTO
        <img class="$couleur" src="$image" alt="photo">

TOTO;

        // AU LIEU DE CONCATENER AVEC .
        // '<img class="' . $couleur . '" src="' . $image . '" alt="photo">'
    }
}


// SI JE VEUX FAIRE DE LA PROGRAMMATION FONCTIONNELLE
// DECLARATION / DEFINITION DE LA FONCTION
function creerMenu()
{
    // ICI JE VAIS RANGER MON CODE
    // ON VA UTILISER UN TABLEAU ASSOCIATIF ET UNE BOUCLE
    $tableauMenu = [
        "accueil"   => "index.php",
        "services"  => "services.php",
        "contact"   => "contact.php",       // PHP EST COOL, ON PEUT LAISSER LA VIRGULE A LA FIN
    ];

    foreach ($tableauMenu as $cle => $valeur) {
        echo
            <<<CODEHTML
            <a href="$valeur">$cle</a>

CODEHTML;
    }
}



?>