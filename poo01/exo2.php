<?php
// AJOUTER LE CODE POO POUR AFFICHER
/*
(header)
(section)
(footer)
*/

// Fatal error: Uncaught Error: Class 'Header' not found
// => CREER LA CLASSE Header
class Header
{
    // CREER LA METHODE MAGIQUE __construct POUR LA CLASSE
    function __construct ()
    {
        echo "(header)";
    }
}

// Fatal error: Uncaught Error: Class 'Section' not found
// => CREER LA CLASSE Section
class Section 
{
    // CREER LA METHODE MAGIQUE __construct POUR LA CLASSE
    function __construct()
    {
        echo "(section)";
    }

}

// Fatal error: Uncaught Error: Class 'Footer' not found 
// CREER LA CLASSE Footer
class Footer
{
    // CREER LA METHODE MAGIQUE __construct POUR LA CLASSE
    function __construct()
    {
        echo "(footer)";
    }

}

// CODE NON MODIFIABLE
$objetHeader    = new Header;   // SI IL Y A UNE METHODE __construct ALORS PHP L'ACTIVE AUTOMATIQUEMENT
$objetSection   = new Section;
$objetFooter    = new Footer;
