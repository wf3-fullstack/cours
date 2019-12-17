<?php

//require_once "php/class/Developpeur.php";
//require_once "php/class/Parfumeur.php";


// ON AJOUTE UNE FONCTION DE CALLBACK SUR LE new
// https://www.php.net/manual/fr/function.spl-autoload-register.php
// CETTE FONCTION EST APPELEE PAR PHP SI IL NE CONNAIT PAS DEJA LA CLASSE
spl_autoload_register(function($nomClasse){
    // echo "(AUTOLOAD:$nomClasse)";
    // IL FAUT CHARGER ICI LE CODE DE LA CLASSE
    $cheminClasse = "php/class/$nomClasse.php";
    if (is_file($cheminClasse))
    {
        require_once "$cheminClasse";
    }
    else
    {
        // LE FICHIER DE LA CLASSE N'EXISTE PAS
        // ET SI ON LE CREAIT ???
        // CODE LE POUR MOI
        // https://www.php.net/manual/fr/function.file-get-contents.php
        // LIRE LE CODE DANS LE FICHIER Vide.php
        $codeReference = file_get_contents("php/class/Vide.php");
        // JE REMPLACE Vide PAR $nomClasse
        $codeClasse = str_replace("Vide", $nomClasse, $codeReference);
        // CREER LE FICHIER A LA PLACE DU FLEMMARD DE DEV
        // https://www.php.net/manual/fr/function.file-put-contents.php
        file_put_contents($cheminClasse, $codeClasse);

        // MAINTENANT QUE LE FICHIER EXISTE
        // JE VAIS POUVOIR LE CHARGER
        require_once "$cheminClasse";

    }
});


// ETAPE 2: ON PEUT CREER UN OBJET A PARTIR DE LA CLASSE (INSTANCIATION)
echo "<h1>STEP1</h1>";
$objet  = new Developpeur;       // OPERATEUR new    => __construct
echo "<h1>STEP2</h1>";
$objet2 = new Parfumeur;

$objet3 = new Dentiste;
$objet4 = new Parquetteur;

$objet5 = new Macon;
