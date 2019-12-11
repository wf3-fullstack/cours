<?php


// 
class Titre1 
{
    // CONSTRUCTEUR
    function __construct ()
    {
        echo "<h1>";
    }

    // DESTRUCTEUR
    function __destruct()
    {
        echo "</h1>";
    }

    // METHODE
    function afficher($texte)
    {
        echo $texte;
    }
}





$objetTitre1 = new Titre1;
$objetTitre1->afficher("COUCOU");
$objetTitre1->afficher("TOTO");
