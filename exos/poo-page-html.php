<?php

class Page
{
    // CONSTRUCTEUR
    function __construct ()
    {
        echo "<header>(HEADER)</header>";
    }
    // DESTRUCTEUR
    // CONSTRUCTEUR
    function __destruct()
    {
        echo "<footer>(FOOTER)</footer>";
    }


    function afficherContenu ($contenu)
    {
        echo "<div>$contenu</div>";
    }
}



$objetPage = new Page;
$objetPage->afficherContenu("COUCOU");

