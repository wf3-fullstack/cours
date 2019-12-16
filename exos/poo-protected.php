<?php


// public/protected/private

class Personnage
{
    // PROPRIETE static
    public static       $quete      = "";
    protected static    $monde      = "";
    private static      $cheatMode  = "";

    // PROPRIETES INDIVIDUELLE (POUR CHAQUE OBJET)
    public      $nom        = "";
    protected   $niveau     = 0;
    private     $coupLethal = "";
}


$objet = new Personnage;
// JE PEUX ACCEDER DEPUIS L'EXTERIEUR DE L'OBJET A SA PROPRIETE nom (A TRAVERS L'OBJET)
$objet->nom = "antoine";

// Fatal error: Uncaught Error: Cannot access protected property Personnage::$niveau
// JE NE PEUX ACCEDER A LA PROPRIETE niveau DEPUIS L'EXTERIEUR
// $objet->niveau = 100;   // ERREUR

// Fatal error: Uncaught Error: Cannot access private property Personnage::$coupLethal
// $objet->coupLethal = "tartagueule";


Personnage::$quete = "tuer le monstre";
// Fatal error: Uncaught Error: Cannot access protected property Personnage::$monde
// Personnage::$monde = "terre du milieu";

// Fatal error: Uncaught Error: Cannot access private property Personnage::$cheatMode
// Personnage::$cheatMode = "secret";
