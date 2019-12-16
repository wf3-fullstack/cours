<?php

// SI BESOIN
// CONFIGURER L'AFFICHAGE DES ERREURS
// AFFICHER LES ERREURS PHP
// https://www.php.net/manual/fr/function.error-reporting.php
// https://www.php.net/manual/fr/function.ini-set.php
error_reporting(E_ALL);
ini_set("display_errors", 1);


// AJOUTER LE CODE MANQUANT EN POO
// POUR PRODUIRE LE CODE SOURCE HTML
// (ON VOIT CE CODE SI ON AFFICHE LE CODE SOURCE DE LA PAGE...)

/*
<header>
    <h1>TITRE1</h1>
</header>
<main>
    <section>
        CONTENU DE MA SECTION
    </section>
</main>
<footer>
    TOUS DROITS RESERVES
</footer>
*/


// Fatal error: Uncaught Error: Class 'Info' not found
class Info
{
    // PROPRIETE D'OBJET
    public $content = "";

    // JE VAIS AJOUTER UNE METHODE CONSTRUCTEUR POUR RECUPERER LE PARAMETRE
    function __construct($texte)
    {
        $this->content = $texte;        // MEMORISER LA VALEUR POUR L'UTILISER PLUS TARD
    }

    // Object of class Info could not be converted to string
    function __toString()
    {
        return $this->content;
    }
}

// Fatal error: Uncaught Error: Class 'Header' not found
class Header
{
    // PROPRIETE D'OBJET
    public $h1 = null;      // POUR LES VARIABLES

    // ON RAJOUTE UNE METHODE __construct
    function __construct($h1)
    {
        $this->h1 = $h1;    // $h1 EST UN OBJET
        // ON POURRA UTILISER LA PROPRIETE DANS UNE AUTRE METHODE PLUS TARD
    }

    // Recoverable fatal error: Object of class Header could not be converted to string
    // => METHODE MAGIQUE __toString
    // https://www.php.net/manual/fr/language.oop5.magic.php#object.tostring
    function __toString()
    {
        $texte =
            <<<CODEHTML
        <header>
            <h1>{$this->h1}</h1>
        </header>

CODEHTML;

        return $texte;
    }
}

// Fatal error: Uncaught Error: Class 'Main' not found
class Main
{
    // PROPRIETE D'OBJET
    public $section = null;      // POUR LES VARIABLES

    // ON RAJOUTE UNE METHODE __construct
    function __construct($section)
    {
        $this->section = $section;    // $h1 EST UN OBJET
        // ON POURRA UTILISER LA PROPRIETE DANS UNE AUTRE METHODE PLUS TARD
    }

    // Recoverable fatal error: Object of class Main could not be converted to string
    function __toString()
    {
        $texte =
            <<<CODEHTML
        <main>
            <section>
            {$this->section}
            </section>
        </main>

CODEHTML;

        return $texte;
    }
}

// Fatal error: Uncaught Error: Class 'Footer' not found
class Footer
{
    // PROPRIETE D'OBJET
    public $copyright = null;      // POUR LES VARIABLES

    // ON RAJOUTE UNE METHODE __construct
    function __construct($copyright)
    {
        $this->copyright = $copyright;    // $h1 EST UN OBJET
        // ON POURRA UTILISER LA PROPRIETE DANS UNE AUTRE METHODE PLUS TARD
    }

    // Recoverable fatal error: Object of class Footer could not be converted to string
    function __toString()
    {
        $texte =
            <<<CODEHTML
        <footer>
            {$this->copyright}
        </footer>

CODEHTML;

        return $texte;
    }
}

// CODE NON MODIFIABLE
$h1         = new Info("TITRE1");                   // => __construct
$section    = new Info("CONTENU DE MA SECTION");
$copyright  = new Info("TOUS DROITS RESERVES");

$header = new Header($h1);                          // => __construct
$main   = new Main($section);                       // => __construct
$footer = new Footer($copyright);                   // => __construct

echo
    <<<CODEHTML

$header
$main
$footer

CODEHTML;
