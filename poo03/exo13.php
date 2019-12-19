<?php

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>titre1</title>

        <link href="style1.css">
        <link href="style2.css">
    </head>
    <body>
        <main>
            <section>
                CONTENU1
            </section>
            <section>
                CONTENU2
            </section>
        </main>
        <script src="script1.js"></script>
        <script src="script2.js"></script>
    </body>
</html>
*/

// COMPLETER


// NE PAS MODIFIER LE CODE SUIVANT
class Page
{
    // METHODES
    function afficherHTML()
    {
        $htmlHead    = $this->creerCodeHead();
        $htmlMain    = $this->creerCodeMain();
        $htmlFooter  = $this->creerCodeFooter();

        echo
            <<<CODEHTML

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>titre1</title>

        $htmlHead
    </head>
    <body>
    
        <main>
            $htmlSection
        </main>
        
        $htmlFooter
    </body>
</html>

CODEHTML;
    }
}

$code1 = new Code("CONTENU1", "style1.css", "script1.js");
$code2 = new Code("CONTENU2", "style2.css", "script2.js");

$objet = new MaPage;
$objet->ajouterCode([$code1, $code2]);
$objet->afficherHTML();
