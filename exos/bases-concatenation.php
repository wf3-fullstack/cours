<?php


$phrase = "bonjour, " . "mon nom est jean";    // resultat "bonjour, mon nom est jean"
$phrase2 = "bonjour, " . 123;                   // resultat "bonjour 123"

$nom     = "jean";
$age     = 28;
$phrase3 = $nom . " a " . $age . " ans";        // resultat "jean a 28 ans"

// PLUS COURT ET PLUS LISIBLE
$phrase4 = "$nom a $age ans";

// ATTENTION, CA NE MARCHE PAS AVEC LES GUILLEMETS SIMPLES
$phrase5 = '$nom a $age ans';

$titre = "le titre de ma page";
$contenu = "le contenu de ma page";

// ATTENTION: PAS D'ESPACE A LA FIN DES LIGNES AVEC HEREDOC
$codeHtml =
<<<MABALISE
    <article class="monArticle">
        <h2>l'olive: $titre</h2>
        <p>$contenu</p>
    </article>
MABALISE;

echo $phrase;

echo "<br>";

echo $phrase2;

echo "<br>";

echo $phrase3;

echo "<br>";

echo $phrase4;

echo "<br>";

echo $phrase5;

echo "<br>";

echo $codeHtml;

?>