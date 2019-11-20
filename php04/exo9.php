<?php

/*

    * exo9: CREER UNE FONCTION calculerPrixTotal 
        QUI PREND EN PARAMETRES 2 TABLEAUX
        $tabQuantite
        $tabPrixUnitaire
        ET QUI RENVOIE LE PRIX TOTAL DU PANIER

        NOTE: L'ORDRE DES VALEURS DANS LES 2 TABLEAUX EST CORRECTEMENT FOURNI

*/

function calculerPrixTotal ($tabQuantite, $tabPrixUnitaire)
{
    $prixTotal = 0;

    // IL FAUT CALCULER LE PRIX POUR CHAQUE ARTICLE
    foreach($tabQuantite as $indice => $quantite)
    {
        // JE VAIS CHERCHER LA VALEUR DANS LE 2E TABLEAU 
        // GRACE A L'INDICE DU PREMIER TABLEAU
        $prixUnitaire = $tabPrixUnitaire[$indice];
        // JE RAJOUTE LE SOUS-TOTAL AU $prixTotal
        $prixTotal += $quantite * $prixUnitaire;
    }    
    return $prixTotal;
}

echo calculerPrixTotal([ 30, 40, 7 ], [ 24, 90, 100 ]);
// 5020
// 30x24 + 40x90 + 7x100


