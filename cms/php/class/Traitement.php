<?php


// ON CREE UNE CLASSE Traitement DANS LE FICHIER php/class/Traitement.php
class Traitement
{
    // METHODES
    function rediriger ()
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE CONTACT
        // ON A BESOIN DE SECURISER LA RECEPTION DES INFORMATIONS ENVOYEES PAR LE NAVIGATEUR
        // ON VA UTILISER mes-fonctions.php
        require_once "php/mes-fonctions.php";

        // COOL POUR AFFICHER LES MESSAGES D'ERREURS
        configurerProjet();

        // EN HTML
        // <input type="hidden" name="identifiantFormulaire" value="contact">
        // EN PHP
        $identifiantFormulaire = filtrerInput("identifiantFormulaire");

        if ($identifiantFormulaire != "") {
            // DANS NOTRE FRAMEWORK, CHAQUE TRAITEMENT EST DANS UN FICHIER PHP SEPARE
            $cheminFichierTraitement = "php/controller/traitement-$identifiantFormulaire.php";
            if (is_file($cheminFichierTraitement)) {
                // VARIABLE GLOBALE
                $tabErreur = [];

                // CHARGER LE CODE PHP POUR TRAITER CE FORMULAIRE
                require_once $cheminFichierTraitement;
            }
        }
    }

}