<?php

// LES INFOS SPECIFIQUES AU PROJET

// ATTENTION: NE PAS OUBLIER DE CHANGER LE FICHIER .htaccess 
// (QUI EST A LA RACINE DU SITE)

// CONNEXION A LA DATABASE SQL
trait ConfigSQL 
{
    // PROPRIETES
    public $database = "cmspoo";        // A CHANGER A CHAQUE PROJET
    public $user     = "root";
    public $password = "";
    public $hostname = "localhost"; // "127.0.0.1"

}

trait ConfigRoute
{
    // CHANGER LE DOSSIER RACINE DU SITE
    private $dossierRacine = "/wf3-fullstack/cmspoo/";
    
    // SI ON NE VEUT PAS UTILISER LA TABLE SQL content
    // ALORS ON PEUT CREER LES ROUTES ICI
    private $tabRoute =
    [
        //"admin"     => "template-admin",
        "revision"      => "template-revision",
    ];
}

// https://www.php.net/manual/fr/function.date-default-timezone-set.php
date_default_timezone_set('Europe/Paris');

// AFFICHER LES ERREURS PHP
// https://www.php.net/manual/fr/function.error-reporting.php
// https://www.php.net/manual/fr/function.ini-set.php
error_reporting(E_ALL);
ini_set("display_errors", 1);
