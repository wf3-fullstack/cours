<?php
/**
 * Classe Macon
 */

class Macon 
{
    // PROPRIETES
    protected $propriete1 = "";

    // METHODES
    // CONSTRUCTEUR
    // CE CODE EST DECLENCHE QUAND ON VA FAIRE $objet = new Macon
    function __construct ()
    {

    }

    function __destruct()
    {
    }

    // GETTER
    function getPropriete1 ()
    {
        return $this->propriete1;
    }
    // SETTER
    function setPropriete1($nouvelleValeur)
    {
        $this->propriete1 = $nouvelleValeur;
    }
}