<?php

// DECLARATION DE LA FONCTION: LE CODE EST EN ATTENTE
function calculerTTC($prixHT, $tauxTVA)
{
    $prixTTC = $prixHT + ($prixHT * $tauxTVA / 100);
    // ON AFFICHE LE RESULTAT
    echo "<h2>LE PRIX TTC EST $prixTTC euros</h2>";
}


// ACTIVER LA FONCTION
$tauxTVAGeneral = 5.5;

calculerTTC(100, $tauxTVAGeneral);   // 120

// ON PEUT APPELER PLUSIEURS FOIS LA MEME FONCTION 
// EN DONNANT DES VALEURS DIFFERENTES AUX PARAMETRES
calculerTTC(182, $tauxTVAGeneral);   // ???


// VIEW MODEL
function calculerTTC2 ($prixHT, $tauxTVA)
{
    $prixTTC = $prixHT + ($prixHT * $tauxTVA / 100);
    return $prixTTC;
    // ON NE VA PAS VOIR CE CODE
    echo "<h1>APRES RETURN</h1>";
}


// VIEW
// ON AFFICHE LE RESULTAT
$resultat = calculerTTC2(100, 20);
echo "<h2>LE PRIX TTC EST $resultat  euros</h2>";

?>