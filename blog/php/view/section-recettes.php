<section>
    <h2>mes dernières recettes</h2>
    <div class="ligne x3col listeRecette">
<?php


// APPELER LA FONCTION POUR RECUPERER LES RESULTATS
$tabResultat = lireTableSQL("recettes", "ORDER BY datePublication DESC");

// echo "<pre>";
// print_r($tabResultat);
// echo "</pre>";


// ON VA FAIRE UNE BOUCLE POUR PARCOURIR LES ELEMENTS DU PREMIER TABLEAU
foreach($tabResultat as $indice => $tabAssoRecette)
{
    // DANS LE TABLEAU ASSOCIATIF $tabAssoRecette
    // LES CLES SONT LES NOMS DES COLONNES
    // ET LES VALEURS SONT LE VALEURS POUR CHAQUE RECETTE

    /*
    $titre              = $tabAssoRecette["titre"];
    $ingredients        = $tabAssoRecette["ingredients"];
    $description        = $tabAssoRecette["description"];
    $image              = $tabAssoRecette["image"];
    $typeRecette        = $tabAssoRecette["typeRecette"];
    $datePublication    = $tabAssoRecette["datePublication"];
    */
    // extract PARCOURT UN TABLEAU ASSOCIATIF $tabAssoRecette ET PREND CHAQUE CLE
    // ET POUR CHAQUE CLE, extract CREE UNE VARIABLE AVEC LE MEME NOM QUE LA CLE
    // https://www.php.net/manual/fr/function.extract.php
    // ATTENTION: extract CREE DES VARIABLES SANS NOUS LE DIRE
    extract($tabAssoRecette);

    // ON VA CONSTRUIRE LE CODE HTML AVEC CES INFORMATIONS
    // ET ON VA AFFICHER LE CODE HTML
    echo
<<<CODEHTML

        <article>
            <a href="recette.php?id=$id"><img src="$image" alt="photo"></a>
            <!-- FORGER UNE REQUETE: ON CONSTRUIT DIRECTEMENT LE LIEN SANS PASSER PAR LE FORMULAIRE  -->
            <h3><a href="recette.php?id=$id">$titre</a></h3>
            <!-- SI JE PASSE PAR UN FORMULAIRE GET -->
            <!--
            <form method="GET" action="recette.php">
                <button type="submit">$titre</button>
                <input type="text" name="id" value="$id">
            </form>
            -->    
            <p>$description</p>
        </article>

CODEHTML;


}

?>
<!--
        <article>
            <img src="assets/img/photo1.jpg" alt="photo">
            <h3>recette1</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt at molestiae quisquam minima asperiores vitae. Possimus accusantium natus et aliquid amet aliquam harum. Quasi at aspernatur ab impedit cumque minus.</p>
        </article>
        <article>
            <img src="assets/img/photo2.jpg" alt="photo">
            <h3>recette2</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt at molestiae quisquam minima asperiores vitae. Possimus accusantium natus et aliquid amet aliquam harum. Quasi at aspernatur ab impedit cumque minus.</p>
        </article>
        <article>
            <img src="assets/img/photo3.jpg" alt="photo">
            <h3>recette3</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt at molestiae quisquam minima asperiores vitae. Possimus accusantium natus et aliquid amet aliquam harum. Quasi at aspernatur ab impedit cumque minus.</p>
        </article>
        <article>
            <img src="assets/img/photo4.jpg" alt="photo">
            <h3>recette4</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt at molestiae quisquam minima asperiores vitae. Possimus accusantium natus et aliquid amet aliquam harum. Quasi at aspernatur ab impedit cumque minus.</p>
        </article>
        <article>
            <img src="assets/img/photo5.jpg" alt="photo">
            <h3>recette5</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt at molestiae quisquam minima asperiores vitae. Possimus accusantium natus et aliquid amet aliquam harum. Quasi at aspernatur ab impedit cumque minus.</p>
        </article>
        <article>
            <img src="assets/img/photo6.jpg" alt="photo">
            <h3>recette6</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt at molestiae quisquam minima asperiores vitae. Possimus accusantium natus et aliquid amet aliquam harum. Quasi at aspernatur ab impedit cumque minus.</p>
        </article>
-->        
    </div>
</section>

<section>
    <h2>Recettes</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem accusantium, suscipit et maxime libero, veritatis obcaecati sapiente voluptatum sequi facilis odio dolores distinctio debitis. Quis quia veritatis nisi quod vel?</p>
    <img src="assets/img/photo2.jpg" alt="cuisine">
</section>