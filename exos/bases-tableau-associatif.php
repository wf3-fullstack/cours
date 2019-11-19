<?php

$tableauAssociatif = ["cle1" => "a", "cle2" => "b", "cle3" => "c",];
// JE CHANGE LA VALEUR ASSOCIEE A "cle2"
$tableauAssociatif["cle2"] = "nouvelle valeur";
// JE RAJOUTE UN 4e ELEMENT
$tableauAssociatif["cle4"] = "valeur4";

foreach ($tableauAssociatif as $cle => $valeur) {
    echo "<h2>($cle)($valeur)</h2>";
}


?>