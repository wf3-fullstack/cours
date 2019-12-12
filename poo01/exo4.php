<?php

// SI BESOIN
// CONFIGURER L'AFFICHAGE DES ERREURS
// AFFICHER LES ERREURS PHP
// https://www.php.net/manual/fr/function.error-reporting.php
// https://www.php.net/manual/fr/function.ini-set.php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*

(header)
(SECTION1)
(SECTION2)
(SECTION3)
(footer)

*/
// Fatal error: Uncaught Error: Class 'Page' not found
class Page 
{
    // PROPRIETE D'OBJET
    //public $content = "";
    public $tabContent = [];

    function __construct ()
    {
        //echo "(header)";
    }

    function __destruct()
    {
    }

    // Fatal error: Uncaught Error: Call to undefined method Page::ajouterContenu()
    function ajouterContenu ($content)
    {
        // echo "($content)";
        //$this->content .= "($content)";
        $this->tabContent[] = $content;
    }

    // Fatal error: Uncaught Error: Call to undefined method Page::afficherListe()
    function afficherListe ()
    {
        echo "(header)";
        // JE DOIS AFFICHER LES 3 SECTIONS
        // echo "{$this->content}";
        foreach($this->tabContent as $content)
        {
            echo "($content)";
        }
        echo "(footer)";
    }
}



// CODE NON MODIFIABLE
$objetPage = new Page;                      // __construct
$objetPage->ajouterContenu("SECTION1");
$objetPage->ajouterContenu("SECTION2");
$objetPage->ajouterContenu("SECTION3");
$objetPage->afficherListe();

// DESTRUCTION                              // _destruct


