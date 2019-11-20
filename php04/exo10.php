<?php
/*
    * exo10: CREER UNE FONCTION creerDeleteSQL  
        LA FONCTION PREND 2 PARAMETRES: $nomTable ET $id
        ET RENVOIE LE CODE SQL POUR UN DELETE
        
        ET SI ON APPELLE LA FONCTION
        creerDeleteSQL("contact", 5);

        DEVRA RENVOYER LE TEXTE CONCATENE SUIVANT:

        DELETE FROM contact
        WHERE id = 5
*/

function creerDeleteSQL ($nomTable, $id)
{
    // ON VA CONCATENER POUR PRODUIRE DU CODE SQL
    $resultat = 
<<<CODESQL
        DELETE FROM $nomTable
        WHERE id = $id

CODESQL;

    return $resultat;
}


echo "<pre>";
echo creerDeleteSQL("contact", 5);
echo "</pre>";
/*
        DELETE FROM contact
        WHERE id = 5

*/