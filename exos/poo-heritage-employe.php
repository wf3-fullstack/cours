<?php


class Employe
{
    // METHODE
    // LA METHODE PARENTE SERT SI ON A UN CODE COMMUN POUR TOUT LE MONDE
    // ET ENSUITE LES CLASSES ENFANTS VONT DONNER UNE SPECIALISATION
    function travailler ()
    {
        echo "(je fais mes heures)";
    }
}

class Graphiste
    extends Employe
{

    // METHODE
    function travailler ()
    {
        echo "(JE DESSINE)";
    }
}


class Developpeur
    extends Employe
{
    // METHODE
    function travailler ()
    {
        echo "(JE CODE)";
    }

}

// SI ON SE PLACE DU POINT DE VUE DU DIRECTEUR
// IL A DES EMPLOYES
$tabEmploye = [
    "graphiste"     => new Graphiste,
    "developpeur"   => new Developpeur,
    "employe"       => new Employe,
];

foreach($tabEmploye as $employe)
{
    $employe->travailler();
}

