<?php

// IL SIMULE LE SERVEUR QUI RENVOIE DU JSON
$tabAsso = [];
$tabAsso["cle1"] = "valeur1";

// EN PHP ON UTILISE DES TABLEAUX ASSOCIATIFS
// json_encode VA CONVERTIR EN OBJETS JS
$tabAsso["tabEntite1"] = [];
foreach(range(1, mt_rand(2, 10)) as $index)
{
    $tabAsso["tabEntite1"][] = [ "titre" => md5(uniqid()) ];
}

echo json_encode($tabAsso);