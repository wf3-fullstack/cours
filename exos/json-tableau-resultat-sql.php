<?php

// fetchAll VA PRODUIRE UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
$tabResultat = [
    ["titre" => "titre1", "description" => "description1" ],
    ["titre" => "titre2", "description" => "description2"],
    ["titre" => "titre3", "description" => "description3"],
    ["titre" => "titre4", "description" => "description4"],
];

$codeHTML = "";
foreach($tabResultat as $indice => $tabAssoRecette)
{
    extract($tabAssoRecette);   // CREE LA VARIABLE $titre

    // AU LIEU DE FAIRE echo JE CONCATENE DANS UNE VARIABLE
    $codeHTML .=
<<<CODEHTML

    <article>
        <h3>$titre</h3>
    </article>

CODEHTML;

}
// AVEC AJAX
$tabAssoJSON = [];
$tabAssoJSON["reponseServeur"] = "OUI TOUT VA BIEN";
// JE PEUX AJOUTER DIRECTEMENT $tabResultat
// DANS $tabAssoJSON
$tabAssoJSON["tabResultat"] = $tabResultat;
$tabAssoJSON["codeHTML"] = $codeHTML;

// ON VA OBTENIR UN TABLEAU D'OBJETS EN JAVASCRIPT
echo json_encode($tabAssoJSON);
