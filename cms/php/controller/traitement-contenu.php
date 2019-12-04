<?php

$titre          = filtrerTexte("titre");
$photo          = filtrerUpload("photo");
$description    = filtrerTexte("description", 1, 10000);
$categorie      = filtrerTexte("categorie");

if (count($tabErreur) == 0) {
    $datePublication = date("Y-m-d H:i:s"); // FORMAT DATETIME SQL

    $tabAssoColonneValeur = [
        "titre"             => $titre,
        "photo"             => $photo,
        "description"       => $description,
        "datePublication"   => $datePublication,    // COOL PHP PERMET DE LAISSER LA VIRGULE
        "categorie"         => $categorie,
    ];
    $nomTable = "contenu";

    insererLigneSQL($nomTable, $tabAssoColonneValeur);
    // REDIRECTION => status code 302
    header("Location: admin.php");
} else {
    var_dump($tabErreur);
}
