<?php

// ETAPE1: RECUPERER LES INFORMATIONS DU FORMULAIRE (ET LES FILTRER)
$titre              = filtrerInput("titre");
$ingredients        = filtrerInput("ingredients");
$description        = filtrerInput("description");
$image              = filtrerInput("image");
$typeRecette        = filtrerInput("typeRecette");
$datePublication    = filtrerInput("datePublication");
// NE PAS OUBLIER POUR LE UPDATE
$id                 = filtrerInput("id");

// ETAPE2: VERIFIER SI LES INFORMATIONS SONT CORRECTES
$tabErreur = [];

// ... IL FAUDRAIT CHECKER PLEIN DE CHOSES

if (count($tabErreur) == 0) {
    // SI OUI
    // ETAPE3:
    // COMPLETER LES INFOS MANQUANTES
    // ON AJOUTE LES INFOS DANS UNE NOUVELLE LIGNE 
    // DE LA TABLE SQL recettes
    $tabAssoColonneValeur = [
        "titre"           => $titre,
        "ingredients"     => $ingredients,
        "description"     => $description,
        "image"           => $image,
        "typeRecette"     => $typeRecette,
        "datePublication" => $datePublication,
    ];
    $nomTable = "recettes";

    // IL SUFFIT D'APPELER LA FONCTION
    updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);

    // SI JE FAIS PAS DE AJAX
    // JE PEUX DEMANDER AU NAVIGATEUR DE FAIRE UNE REDIRECTION
    // https://www.php.net/manual/fr/function.header.php
    header("Location: admin-recettes.php");
}
