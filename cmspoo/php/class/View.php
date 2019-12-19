<?php

class View
{
    // ON PEUT SORTIR LA CONFIGURATION 
    // DES ROUTES EN DEHORS DE LA CLASSE View
    use ConfigRoute;

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

        // ON A DES ROUTES 
        // ET POUR UNE URL J'ASSOCIE UN TEMPLATE TWIG
        // (FORCER SANS PASSER PAR SQL ET LA TABLE content...)
        $tabRoute =
        [
            //"admin"     => "template-admin",
            "revision"      => "template-revision",
        ];
        // ON POURRAIT AUSSI UTILISER AVEC UNE PROPRIETE
        // $tabRoute = $this->tabRoute;

        // ON VA CHERCHER DANS LE TABLEAU DE ROUTE 
        // SI LE filename EST ASSOCIE A UN TEMPLATE
        $template = $tabRoute[$this->filename] ?? "";
        $cheminTemplate = "php/view/$template.php";
        if (is_file($cheminTemplate))
        {
            // SOIT JE PRENDS DIRECTEMENT UN TEMPLATE
            require_once $cheminTemplate;
        }
        else
        {
            // SOIT JE VAIS CHERCHER DANS LA TABLE SQL content

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

            $template = "";
            $nbResultat = count($tabResultat);
            if ($nbResultat > 0) {
                // OK ON A TROUVE UNE PAGE
                foreach ($tabResultat as $tabLigne) {
                    // CREER LES VARIABLES A PARTIR DES COLONNES
                    extract($tabLigne);
                    // ON VA ECRASER LES VALEURS PAR DEFAUT
                    // => $template
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
            if ($template == "")
            {
                $template = "template-defaut";
            }
            $cheminTemplate = "php/view/$template.php";
            if (is_file($cheminTemplate))
            {
                require_once $cheminTemplate;
            }
        }

    }
}
