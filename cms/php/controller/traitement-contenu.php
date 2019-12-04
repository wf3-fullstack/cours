<?php

function filtrerUpload ($nameInput)
{
    $cheminFichierUpload = "";

    // QUICK AND DIRTY
    $dossierUpload = "assets/upload";

    // debug
    print_r($_FILES);
    // $_FILES EST UN TABLEAU ASSOCIATIF DE TABLEAU ASSOCIATIF
    // QUI SERT UNIQUEMENT AUX FICHIERS UPLOADES PAR UN FORMULAIRE
    // LES CLES DE CE TABLEAU ASSOCIATIF SONT LES ATTRIBUTS name DU HTML
    // <input type="file" name="photo">

    // https://www.php.net/manual/fr/function.isset.php
    if (isset($_FILES[$nameInput])) {
        extract($_FILES[$nameInput]);    
        // CREE LES VARIABLES AVEC LES CLES
        // $tmp_name
        // $error
        // $name
        // $type
        // $size

        // OK JE PRENDS LE FICHIER ET JE LE RANGE DANS LE DOSSIER assets/upload
        // https://www.php.net/manual/fr/function.move-uploaded-file.php
        move_uploaded_file($tmp_name, "$dossierUpload/$name");
    }

    return $cheminFichierUpload;
}

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
    // header("Location: admin.php");
} else {
    var_dump($tabErreur);
}
