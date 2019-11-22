<?php

// CHARGER LE CODE DE MES FONCTIONS
require_once "php/mes-fonctions.php";

// JE VAIS UTILISER MES FONCTIONS
// JE VAIS ACTIVER MA CONFIGURATION POUR CE PROJET
configurerProjet();

// JE VEUX RECUPERER identifiantFormulaire
// EN HTML
// <input type="hidden" name="identifiantFormulaire" value="newsletter">
$identifiantFormulaire = filtrerInput("identifiantFormulaire");

if ($identifiantFormulaire != "")
{
    // ON ME DEMANDE DE TRAITER UN FORMULAIRE
    // ON MET EN PLACE UN TRAITEMENT AUTOMATIQUE
    // SI IL Y A UN FICHIER php/controller/traitement-newsletter.php 
    // ALORS JE LE CHARGE
    $cheminFichierTraitement = "php/controller/traitement-$identifiantFormulaire.php";
    // https://www.php.net/manual/fr/function.is-file.php
    if (is_file($cheminFichierTraitement))
    {
        require_once $cheminFichierTraitement;
    }
}