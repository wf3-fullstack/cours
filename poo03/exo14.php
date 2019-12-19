<?php

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*
(bout1)
(bout2)
(bout3)

*/

// AJOUTER VOTRE CODE ICI

// NE PAS MODIFIER LE CODE SUIVANT

interface MonContrat
{
    function afficher ();
}

class MaPage
    extends PageParent,
    implements MonContrat
{
    protected $header;
    protected $body;
    protected $footer;
    
    function __construct ($header, $body, $footer)
    {
        $this->header   = $header;
        $this->body     = $body;
        $this->footer   = $footer;
    }
    
}

$header = new Header("bout1");
$body   = new Body("bout2");
$footer = new Footer("bout3");

$objet = new MaPage($header, $body, $footer);

$objet->afficher();

