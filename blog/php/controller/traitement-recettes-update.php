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

    function updateLigneSQL ($nomTable, $id, $tabAssoColonneValeur)
    {
        // ME PROTEGER EN CONVERTISSANT $id EN NOMBRE
        // $id             = intval($id);

        /*

UPDATE recettes
SET
titre = :titre, description = :description, ingredients = :ingredients
WHERE
id = :id

        */
        // ON VA CONSTRUIRE LA LISTE COLONNE TOKEN EN PARCOURANT LES CLES DU TABLEAU ASSOCIATIF
        $listeColonneToken = "";
        // ON FAIT UNE BOUCLE
        $compteur = 0;
        foreach($tabAssoColonneValeur as $nomColonne => $valeur)
        {
            if ($compteur > 0)
            {
                // ON N'EST PAS SUR LE PREMIER
                $listeColonneToken .= ", $nomColonne = :$nomColonne";
                // $compteur = 1
            }
            else
            {
                // ON EST SUR LE PREMIER
                $listeColonneToken .= "$nomColonne = :$nomColonne";
                $compteur++;    // $compteur = 1
            }
        }

        $requetePrepareeSQL =
<<<CODESQL

UPDATE $nomTable
SET
$listeColonneToken
WHERE
id = :id

CODESQL;

        // JE RAJOUTE LE TOKEN DANS LE TABLEAU ASSOCIATIF POUR $id
        $tabAssoColonneValeur["id"] = $id;

        $pdoStatement = envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
        return $pdoStatement;
    }

    // IL SUFFIT D'APPELER LA FONCTION
    updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);

    // SI JE FAIS PAS DE AJAX
    // JE PEUX DEMANDER AU NAVIGATEUR DE FAIRE UNE REDIRECTION
    // https://www.php.net/manual/fr/function.header.php
    header("Location: admin-recettes.php");
}
