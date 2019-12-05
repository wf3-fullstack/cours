<?php

// ATTENTION: LA VERIF DES DOUBLONS 
// POUR LE UPDATE EST ENCORE PLUS PENIBLE...
$id             = filtrerNombre("id");
$nom            = filtrerTexte("nom");    // IL MANQUE LA VERIF DES DOUBLONS
$categorie      = filtrerTexte("categorie");    // IL MANQUE LA VERIF DES DOUBLONS
$description    = filtrerTexte("description");    // IL MANQUE LA VERIF DES DOUBLONS
$nbJoueur       = filtrerNombre("nbJoueur");
$difficulte     = filtrerNombre("difficulte");
$dateCreation   = filtrerTexte("dateCreation");    // IL MANQUE LA VERIF DES DOUBLONS


// PHOTO
$photo          = filtrerUpload("photo", false);    // false => NON OBLIGATOIRE
// SI PAS DE FICHIER UPLOADE ALORS $photo=""

if (count($tabErreur) == 0) {
    $tabAssoColonneValeur = [
        "nom"             => $nom,
        "categorie"       => $categorie,
        "description"     => $description,
        "nbJoueur"        => $nbJoueur,
        "difficulte"      => $difficulte,
        "dateCreation"    => $dateCreation,
    ];

    // SI $photo N'EST PAS VIDE, 
    // ALORS JE RAJOUTE LA COLONNE photo DANS LE TABLEAU $tabAssoColonneValeur
    if ($photo != "")
    {
        $tabAssoColonneValeur["photo"] = $photo;
    }

    $nomTable = "sport";
    updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);

    // SANS AJAX JE RAJOUTE UNE REDICRECTION
    // header("Location: revision.php");
} else {
    var_dump($tabErreur);
}
