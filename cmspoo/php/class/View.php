<?php

class View
{
    // PROPRIETE 
    private $filename = "";

    // METHODES
    function extraireFilename()
    {
        // CONTROLEUR/ROUTEUR FRONTAL
        $uri = $_SERVER["REQUEST_URI"];
        // https://www.php.net/manual/fr/function.parse-url.php
        $path = parse_url($uri, PHP_URL_PATH);
        // AVANT APACHE FAISAIT CE TRAVAIL
        // ET MAINTENANT JE DOIS GERER CE CAS DANS PHP
        if ($path == "/wf3-fullstack/cmspoo/") {
            $path = "/wf3-fullstack/cmspoo/index.php";
        }
        // NOM DU FICHIER SANS L'EXTENSION
        // https://www.php.net/manual/fr/function.pathinfo.php
        $this->filename = pathinfo($path, PATHINFO_FILENAME);
    }

    function afficherPage()
    {
        $this->extraireFilename();

        // IL FAUT FAIRE UNE REQUETE SQL POUR ALLER CHERCHER LA LIGNE QUI CORRESPOND
        // EN FONCTIONNEL ON AVAIT LA FONCTION lireTableSQL
        // EN POO IL FAUT RANGER CETTE FONCTION DANS UNE CLASSE Model
        $objetModel = new Model;
        $tabResultat = $objetModel->lireTableSQL(
            "content",
            "",
            "WHERE filename = :filename",
            ["filename" => $this->filename]
        );


        $nbResultat = count($tabResultat);
        if ($nbResultat > 0) {
            // OK ON A TROUVE UNE PAGE
            foreach ($tabResultat as $tabLigne) {
                // CREER LES VARIABLES A PARTIR DES COLONNES
                extract($tabLigne);
                // ON VA ECRASER LES VALEURS PAR DEFAUT
            }
        } else {
            // ERREUR
            // IL FAUT RENVOYER UNE ERREUR 404
            // https://www.php.net/manual/fr/function.header.php
            header("HTTP/1.1 404 Not Found");

            // PAGE NON TROUVEE
            // ON DONNE DES VALEURS PAR DEFAUT
            $titre       = "PAGE NON TROUVEE";
            $contenuPage = "DESOLE ON A RIEN TROUVE...";
        }

        // TEMPLATE
        require_once "php/view/header.php";
        require_once "php/view/section-contenu.php";
        require_once "php/view/footer.php";

    }
}
