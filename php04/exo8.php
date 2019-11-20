<?php

/*

    DIVIDE AND CONQUER
    en français
    DIVISER POUR MIEUX REGNER

    DIVISER ET RASSEMBLER

    DECOUPER UN GRAND PROJET EN PETITS MORCEAUX
    ET RASSEMBLER LES PETITS MORCEAUX POUR RECONSTRUIRE LE GRAND PROJET

    * exo8: CREER UNE FONCTION concatenerTexte 
        QUI CONCATENE LES LETTRES DANS UN TABLEAU (EN PARAMETRE)
        ET QUI AJOUTE UNE VIRGULE ENTRE LES LETTRES
        (ATTENTION: PAS DE VIRGULE AU DEBUT, NI A LA FIN)

        concatenerTexte([ 'a', 'b', 'c', 'd' ]);
        // RESULTAT UN TEXTE "a,b,c,d"

        concatenerTexte([ 'i', 'j', 'k' ]);
        // RESULTAT UN TEXTE "i,j,k"
*/

function concatenerTexte ($tabLettre)
{
    $resultat = "";     // astuce: au debut, on a un texte vide

    // IL FAUT CONCATENER COMME IL FAUT
    // PARCOURIR LES ELEMENTS AVEC UNE BOUCLE foreach
    foreach($tabLettre as $indice => $lettre)
    {
        // JE CONCATENE CHAQUE LETTRE A $resultat
        if ($indice > 0)
        {
            // JE NE SUIS PAS SUR LE PREMIER
            $resultat .= "," . $lettre ;
        }
        else
        {
            // JE SUIS SUR LE PREMIER
            $resultat .= $lettre;
        }
    }
    return $resultat;
}

echo "<h2>TEST1</h2>";
echo concatenerTexte([ 'a', 'b', 'c', 'd' ]);
// RESULTAT "a,b,c,d"


echo "<h2>TEST2</h2>";
echo concatenerTexte([ 'i', 'j', 'k' ]);
// RESULTAT "a,b,c,d"
