<?php

$texte = "coucou";

var_dump($GLOBALS); // "coucou"

$GLOBALS["texte"] = "coucou2";

var_dump($GLOBALS); // "coucou2"

echo "<h2>$texte</h2>";

function afficherMessage ()
{
    // JE N'AI PLUS BESOIN D'AJOUTER global AVANT

    echo $GLOBALS["texte"];
}


$bout1 = "tex";
$bout2 = "te";

echo $GLOBALS["$bout1$bout2"];    // coucou2

$nomVariable = "texte";

// ATTENTION : AUX VARIABLES DE VARIABLES AVEC $$
echo $$nomVariable;     // echo $texte  // "coucou2"

