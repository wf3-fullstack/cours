<?php

$titre          = filtrerTexte("titre");                    // <input type="text" name="titre">
$photo          = filtrerUpload("photo");                   // <input type="file" name="photo">
$description    = filtrerTexte("description", 1, 10000);    // <textarea name="description"></textarea>
$categorie      = filtrerTexte("categorie");                // <input type="text" name="categorie">

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
