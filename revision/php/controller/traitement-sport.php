<?php

$nom            = filtrerTexte("nom");                      // <input type="text" name="titre">
$categorie      = filtrerTexte("categorie");                // <input type="text" name="categorie">
$description    = filtrerTexte("description", 1, 10000);    // <textarea name="description"></textarea>
$photo          = filtrerUpload("photo");                   // <input type="file" name="photo">
// ATTENTION: NE PAS OUBLIER DE CREER LE DOSSIER assets/upload/
$nbJoueur       = filtrerNombre("nbJoueur");                      // <input type="text" name="titre">
$difficulte     = filtrerNombre("difficulte");                      // <input type="text" name="titre">
$dateCreation   = filtrerTexte("dateCreation");                      // <input type="text" name="titre">


if (count($tabErreur) == 0) {

    $tabAssoColonneValeur = [
        "nom"               => $nom,
        "categorie"         => $categorie,
        "description"       => $description,
        "photo"             => $photo,    // COOL PHP PERMET DE LAISSER LA VIRGULE
        "nbJoueur"          => $nbJoueur,
        "difficulte"        => $difficulte,
        "dateCreation"      => $dateCreation,
    ];
    $nomTable = "sport";

    insererLigneSQL($nomTable, $tabAssoColonneValeur);
    // REDIRECTION => status code 302
    // SEULEMENT APRES QUE LE CREATE MARCHE
    header("Location: revision.php");
} else {
    var_dump($tabErreur);
}
