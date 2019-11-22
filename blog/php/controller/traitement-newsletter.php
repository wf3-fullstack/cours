<?php

// LES FONCTIONS ONT DEJA ETE CHARGEES DANS traitement.php

// ICI JE DOIS TRAITER LE FORMULAIRE DE newsletter

// JE DOIS RECUPERER LES INFOS DU FORMULAIRE
// nom
// email
$nom    = filtrerInput("nom");
$email  = filtrerInput("email");

// BARRIERE DE SECURITE
// insuffisant: il faudrait aussi éviter les emails en doublons...
if ( ($nom != "") && verifierEmail($email) )
{
    // OK ON PEUT CONTINUER LE TRAITEMENT
    // COMPLETER LES INFOS MANQUANTES AVEC PHP
    $dateInscription = date("Y-m-d H:i:s");

    // ET ENSUITE JE VAIS MEMORISER CES INFORMATIONS DANS LA TABLE SQL newsletter
    // JE DOIS CREER UNE REQUETE PREPAREE SQL
    // (POUR SE PROTEGER DES ATTAQUES PAR INJECTION SQL)
    $tabAssoColonneValeur = [
        "nom"                   => $nom,
        "email"                 => $email,
        "dateInscription"       => $dateInscription,
    ];

    $requetePrepareeSQL =
<<<CODESQL

INSERT INTO newsletter
( nom, email, dateInscription )
VALUES
( :nom, :email, :dateInscription )

CODESQL;

    // JE VAIS APPELER LA FONCTION envoyerRequeteSQL
    // (NE PAS OUBLIER DE CHANGER LA DATABASE)
    envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
}
else
{
    // KO ON NE FAIT RIEN
}

