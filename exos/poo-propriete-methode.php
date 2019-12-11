<?php


class Boulanger
{
    // PROPRIETES
    // => SERT A MODELISER LE MONDE REEL
    public $nom = "";
    public $adresse = "";
    public $specialite = "";

    // CONSTRUCTEUR
    // UTLISATION POPULAIRE DU CONSTRUCTEUR
    // RECUPERER LES VALEURS INITIALES POUR LES PROPRIETES
    function __construct ($nom="", $adresse="")
    {
        // JE COPIE LA VALEUR DES PARAMETRES DANS LES PROPRIETES DE L'OBJET
        $this->nom      = $nom;
        $this->adresse  = $adresse;
    }

    function afficherCarteVisite ()
    {
        // echo $nom; // $nom EST UNE VARIABLE LOCALE A LA METHODE
        echo "<h1>Bonjour, je m'appelle {$this->nom} et ma boutique est à {$this->adresse}</h1>";
    }
}

/*
$objetBoulanger = new Boulanger;
$objetBoulanger->nom     = "Roger";
$objetBoulanger->adresse = "Aix-en-provence";
*/
$objetBoulanger = new Boulanger("Roger", "Aix-en-provence");
// SI LA METHODE __construct A BESOIN DE PARAMETRES
// ALORS ON LES FOURNIT QUAND ON APPELLE new

$objetBoulanger->afficherCarteVisite();

/*
$objetBoulanger2 = new Boulanger;
$objetBoulanger2->nom     = "Martine";
$objetBoulanger2->adresse = "La Ciotat";
*/
$objetBoulanger2 = new Boulanger("Martine", "La Ciotat");

$objetBoulanger2->afficherCarteVisite();
