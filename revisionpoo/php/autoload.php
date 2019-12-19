<?php


// ON AJOUTE UNE FONCTION DE CALLBACK SUR LE new
// https://www.php.net/manual/fr/function.spl-autoload-register.php
// CETTE FONCTION EST APPELEE PAR PHP SI IL NE CONNAIT PAS DEJA LA CLASSE
spl_autoload_register(function ($nomClasse) {
    // echo "(AUTOLOAD:$nomClasse)";
    // IL FAUT CHARGER ICI LE CODE DE LA CLASSE
    $cheminClasse = "php/class/$nomClasse.php";
    if (is_file($cheminClasse)) {
        require_once "$cheminClasse";
    }
});

// INFOS POUR SE CONNECTER A LA BONNE DATABASE MySQL
trait ConfigSQL
{
    // PROPRIETES
    public $database = "revisionpoo";        // A CHANGER A CHAQUE PROJET
    public $user     = "root";
    public $password = "";
    public $hostname = "localhost"; // "127.0.0.1"

}


// POUR TRAITER LES FORMULAIRES, JE VAIS CREER UN OBJET DE CLASSE Controller2
$objetController2 = new Controller2;
