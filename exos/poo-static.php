<?php


// QUAND ON FAIT DU FONCTIONNEL
$MaClasse_metier = "plombier";
echo $MaClasse_metier;

function afficherMetier ()
{
    global $MaClasse_metier;
    echo $MaClasse_metier;
}

afficherMetier();

// METHODE ET PROPRIETE DE CLASSE static
class MaClasse
{
    // PROPRIETE static
    public static $metier = "plombier";

    // METHODE static
    static function afficherMetier()
    {
        echo MaClasse::$metier;
    }
}

echo MaClasse::$metier;

MaClasse::afficherMetier();


