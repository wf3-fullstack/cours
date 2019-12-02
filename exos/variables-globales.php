<?php




function afficherMessage()
{
    // J'ANNONCE QUE JE VAIS UTILISER UNE VARIABLE GLOBALE
    global $texte;

    echo $texte;
}

function calculerTotal ()
{
    // J'ANNONCE QUE JE VAIS UTILISER UNE VARIABLE GLOBALE
    global $texte;

    echo "calculerTotal: $texte";
}

$texte = "coucou";  // VARIABLE GLOBALE

// AU MOMENT OU j'APPELLE LA FONCTION, LA VARIABLE DOIT ETE DECLAREE
afficherMessage();
calculerTotal();

