<?php

// ATTENTION: ATTAQUES PAR CHEVAL DE TROIE... 

// $_REQUEST EST UN TABLEAU ASSOCIATIF CREE PAR PHP
// $_GET        SEULEMENT REMPLI SI LE NAVIGATEUR ENVOIE EN GET
// $_POST       SEULEMENT REMPLI SI LE NAVIGATEUR ENVOIE EN POST
// EN HTML
// <input name="nom" value="nom par défaut">
// EN PHP
// $nom = $_REQUEST["nom"];     // $nom = "nom par défaut"


// JE RECUPERE TOUTES LES INFOS
// $infosFormulaire = json_encode($_REQUEST);
// echo $infosFormulaire;
// file_put_contents("php/model/contact.txt", "$infosFormulaire\n", FILE_APPEND);
// @mail("webmaster@monsite.fr", "vous avez un nouveau message", $infosFormulaire);


// PHP : PARANOIA HYPER PARANOIA
// ATTAQUES PAR CHEVAL DE TROIE
// https://www.php.net/manual/fr/function.strip-tags.php
// JE DOIS FILTRER LES INFOS RECUES DE L'EXTERIEUR
// https://www.php.net/manual/fr/function.trim.php
// JE DOIS ENLEVER LES ESPACES AU DEBUT ET A LA FIN
// note: attention à l'ordre des filtres

// CHARGER LE CODE DE MES FONCTIONS POUR POUVOIR LES UTILISER
require_once "php/mes-fonctions.php";

// APPELER LA FONCTION
// LANCE LA CONFIGURATION
configurerProjet();

// POUR NE PAS CASSER JS DANS LE NAVIGATEUR
// COTE NAVIGATEUR AVEC AJAX, JE DOIS RECEVOIR DU JSON
$tabAsso = [];

// https://www.php.net/manual/fr/function.microtime.php
$debut = microtime(true);

// IL ME FAUT UN IDENTIFIANT POUR CHAQUE FORMULAIRE
// EN HTML
// <input type="hidden" name="identifiantFormulaire" value="newsletter">
// <input type="hidden" name="identifiantFormulaire" value="contact">
$identifiantFormulaire        = filtrerInput("identifiantFormulaire");

if ($identifiantFormulaire != "")
{
    // JE VAIS CHERCHER SI UN FICHIER DE TRAITEMENT EXISTE
    // SI OUI ALORS JE LE CHARGE
    // https://www.php.net/manual/fr/function.is-file.php
    if (is_file("php/controller/traitement-$identifiantFormulaire.php"))
    {
        require_once "php/controller/traitement-$identifiantFormulaire.php";
    }
}

// JE VAIS AJOUTER DANS LE TABLEAU ASSOCIATIF LES INFOS MANQUANTES
// DEBUG (AU FINAL ON VA L'ENLEVER...)
$tabAsso["request"]         = $_REQUEST;

$fin                        = microtime(true);
$tempsConsomme              = 1000 * ($fin - $debut); // resultat en ms
$tabAsso["debut"]           = $debut;
$tabAsso["fin"]             = $fin;
$tabAsso["tempsConsomme"]   = $tempsConsomme;

// COOL AVEC PHP: ON PEUT TRANSFORMER UN TABLEAU ASSOCIATIF EN OBJET JSON
// https://www.php.net/manual/fr/function.json-encode.php
// JE TRANSFORME LE TABLEAU ASSOCIATIF EN TEXTE JSON
// QUI SERA TRANSMIS AU NAVIGATEUR
echo json_encode($tabAsso);

?>