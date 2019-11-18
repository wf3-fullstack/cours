<?php

$tableau = ["a", "b", "c", "d"];

echo "<h1>VERSION FOR</h1>";

// https://www.php.net/manual/fr/function.count.php
// la fonction count donne le nombre d'éléments dans le tableau
for ($indice = 0; $indice < count($tableau); $indice++) {
    // JE PEUX UTILISER $indice POUR ACCEDER AUX ELEMENTS DU TABLEAU
    $element = $tableau[$indice];
    // JE PEUX UTILISER $element POUR AFFICHER QUELQUE CHOSE
    echo "<h2>$element</h2>";
}

echo "<h1>VERSION WHILE</h1>";

$indice = 0;
while ($indice < count($tableau))
{
    $element = $tableau[$indice];
    echo "<h2>$element</h2>";
    $indice++;      // PIEGE: NE PAS OUBLIER
}

echo "<h1>VERSION FOREACH</h1>";

foreach ($tableau as $indice => $element) {
    echo "<h2>($indice) $element</h2>";
}

echo "<h1>VERSION FOREACH SANS INDICE</h1>";

foreach ($tableau as $element) {
    echo "<h2>$element</h2>";
}

?>