<?php

// EST-CE QUE JE PEUX UTILISER UNE BOUCLE ET UN TABLEAU ???
/*
$tableau = [
    "assets/img/photo1.jpg",
    "assets/img/photo2.jpg",
    "assets/img/photo3.jpg",
    "assets/img/photo4.jpg",
    "assets/img/photo5.jpg",
    "assets/img/photo6.jpg",
];
*/

?>

<section>
    <h2>GALERIE DE PHOTOS</h2>

    <figure class="galerie">
<?php

// https://www.php.net/manual/fr/function.glob.php
$tableau = glob("assets/img/*.jpg");

foreach($tableau as $indice => $image)
{
    // JE VEUX ALTERNER ENTRE blue ET orange
    if ($indice % 2)
    {
        // SCENARIO orange
        $couleur = "orange";
    }
    else
    {
        // SCENARIO blue
        $couleur = "blue";

    }

    echo        // NE PAS OUBLIER echo POUR AFFICHER UN TEXTE PHP
<<<TOTO
        <img class="$couleur" src="$image" alt="photo">
TOTO;

    // AU LIEU DE CONCATENER AVEC .
    // '<img class="' . $couleur . '" src="' . $image . '" alt="photo">'
}

?>
<!--
        <img src="assets/img/photo1.jpg" alt="photo">
        <img src="assets/img/photo2.jpg" alt="photo">
        <img src="assets/img/photo3.jpg" alt="photo">
        <img src="assets/img/photo4.jpg" alt="photo">
        <img src="assets/img/photo5.jpg" alt="photo">
        <img src="assets/img/photo6.jpg" alt="photo">
-->        
    </figure>

</section>


<section>
    <h2>SECTION SERVICES</h2>
    <img src="assets/img/photo3.jpg" alt="">
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, distinctio! Quod fugiat minima voluptatibus consequuntur, alias quasi et autem laudantium esse numquam ipsam eos inventore quaerat voluptatem iure, excepturi asperiores.</p>
</section>