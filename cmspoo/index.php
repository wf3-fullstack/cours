<?php

// JE FAIS DE LA POO

// ON AJOUTE UNE FONCTION DE CALLBACK SUR LE new
// https://www.php.net/manual/fr/function.spl-autoload-register.php
// CETTE FONCTION EST APPELEE PAR PHP SI IL NE CONNAIT PAS DEJA LA CLASSE
spl_autoload_register(function ($nomClasse) {
    // echo "(AUTOLOAD:$nomClasse)";
    // IL FAUT CHARGER ICI LE CODE DE LA CLASSE
    $cheminClasse = "php/class/$nomClasse.php";
    if (is_file($cheminClasse)) {
        require_once "$cheminClasse";
    } else {
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

// COMME ON N'A PLUS traitement.php
// JE CENTRALISE LE TRAITEMENT DES FORMULAIRES SUR index.php
// $objetController = new Controller;
// ON VA TESTER AVEC LE DECOUPAGE EN TRAITS
$objetController = new Controller2;

// CREER UN OBJET DEPUIS LA CLASSE
$objetView = new View;

// APPELER LA METHODE EN PASSANT PAR L'OBJET
$objetView -> afficherPage();

