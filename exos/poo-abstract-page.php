<?php


// DEV GENERAL
// POUR TOUS LES PROJETS
abstract class Page
{

    // METHODE ABSTRAITE
    abstract function afficherContenu ();
    // 
    function afficherTitre1 ()
    {
        echo "<h1>" . $this->afficherContenu() . "</h1>";
    }
}

// DEV SUR UN PROJET
// SUR UN VRAI PROJET
class MaPage
    extends Page
{
   function afficherContenu()
   {
       // DANS MON PROJET
       return "MON SUPER SITE EN POO";
   }
    
}

$objetMaPage = new MaPage;
$objetMaPage->afficherTitre1();
