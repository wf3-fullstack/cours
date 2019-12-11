<?php

class View
{
    // METHODES
    function afficherPage()
    {
        ?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>SITE CMSPOO</title>
        </head>

        <body>
            <pre>
<?php

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
        $filename = pathinfo($path, PATHINFO_FILENAME);


        echo
            <<<CODEHTML

JE SUIS index.php
ET JE SAIS QUE JE DOIS PRODUIRE LA PAGE DEMANDEE...

la page demandée est $uri

le path est $path

le filename est $filename

CODEHTML;

        ?>    
</pre>
        </body>

        </html>
<?php
    }
}
