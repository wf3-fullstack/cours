<?php


// unset
// https://www.php.net/manual/fr/function.unset.php

$texte = "coucou";
echo "<h2>$texte</h2>";
echo "<h2>je supprime la variable</h2>";
unset($texte);
echo "<h2>$texte</h2>";
// Notice: Undefined variable: texte in C:\xampp\htdocs\wf3-fullstack\exos\bases-unset.php on line 11

echo "<h2>TABLEAU ORDONNE</h2>";

$tableau = ["a", "b", "c"];
var_dump($tableau);
echo "<h2>TABLEAU ORDONNE SANS ELEMENT INDICE 1</h2>";
unset($tableau[1]);
var_dump($tableau);

for($compteur=0; $compteur<3; $compteur++)
{
    $element = $tableau[$compteur] ?? "valeur par défaut";
    echo "<h3>$element</h3>";
}
?>