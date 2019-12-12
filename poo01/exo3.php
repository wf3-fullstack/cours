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
// (header)
// (LE CONTENU DE MA PAGE)
// (footer)

// Fatal error: Uncaught Error: Class 'Page' not found
class Page 
{
    // JE CREE UNE PROPRIETE D'OBJET
    // ELLE EXISTE TANT QUE L'OBJET EXISTE
    // => PRATIQUE CA PERMET DE PARTAGER UNE INFORMATIONS ENTRE PLUSIEURS APPELS DE METHODE
    public $content = "";

    // Fatal error: Uncaught Error: Call to undefined method Page::setContenu()
    // => METHODE SETTER => ECRITURE
    function setContenu ($content)
    {
        // JE DOIS MEMORISER LA VALEUR DE $content
        // POUR POUVOIR L'UTILISER PLUS TARD DANS UNE AUTRE METHODE
        // ON VA UTILISER UNE VARIABLE
        // => EN FONCTIONNEL
        // locale => PAS BON DETRUIT A LA FIN DE LA FONCTION
        // static => PAS BON GARDE A L'INTERIEUR DE LA FONCTION setContenu 
        // globale => PAS BON PARCE QU'ON VEUT FAIRE DE LA POO
        // => EN POO
        // propriété d'objet à la classe
        // NOTE: $this DONNE L'OBJET QUI A SERVI A APPELER LA METHODE
        $this->content = $content;
    }    

    // Fatal error: Uncaught Error: Call to undefined method Page::afficher()
    function afficher ()
    {
        echo "<h1>(header)</h1>";
        echo "<h1>{$this->content}</h1>";
        echo "<h1>(footer)</h1>";
    }
}


// CODE NON MODIFIABLE
$objetPage = new Page;                              // ON PEUT JOUER AVEC __construct
$objetPage->setContenu("LE CONTENU DE MA PAGE");    // $this = $obejtPage
$objetPage->afficher();                             // $this = $objetPage
