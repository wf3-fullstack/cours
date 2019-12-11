<?php


class Balise
{
    // METHODE MAGIQUE
    // RENVOIE LA VERSION TEXTE QUI REPRESENTE L'OBJET
    // CONVERTIT UN OBJET EN TEXTE
    function __toString()
    {
        return "<h2>TEXTE</h2>";
    }

    function renvoyerTexte ()
    {
        return "<h3>afficherTexte</h3>";
    }
}


$objetBalise = new Balise;

$texte = $objetBalise->renvoyerTexte();



echo
    <<<CODEHTML
<header>
(header)
</header>
<main> 
    $objetBalise
    $texte
</main>
<footer>
(footer)
</footer>

CODEHTML;


echo $objetBalise;  // echo AFFICHE DU TEXTE => DECLENCHE __toString POUR CONVERTIR L'OBJET EN TEXTE