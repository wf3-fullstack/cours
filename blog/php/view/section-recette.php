<section>
    <h2>PAGE POUR UNE SEULE RECETTE</h2>
<?php

// JE DOIS RECUPERER LES INFOS ENVOYEES EN GET (DANS L'URL)
$id = filtrerInput("id");
// CONVERTIR EN NOMBRE
$id = intval($id);

/*

SELECT *
FROM recettes
WHERE id = :id

*/
$tabResultat = lireTableSQL("recettesshdfskj", "", "WHERE id = $id");

foreach($tabResultat as $tabAssoRecette)
{
    // ASTUCE DU extract => CREE LES VARIABLES AVEC LES NOMS DES COLONNES
    extract($tabAssoRecette);

    echo
<<<CODEHTML

    <article>
        <h3>$titre</h3>
        <img src="$image" alt="photo">
        <p>$ingredients</p>
        <p>$description</p>
        <p>$typeRecette</p>
        <p>$datePublication</p>
    </article>

CODEHTML;

}
// ET AVEC CES INFOS, JE VAIS RECUPERER DANS LA TABLE SQL recettes
// TOUS LES DETAILS DE LA RECETTE

?>

</section>