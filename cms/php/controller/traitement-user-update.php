<?php

// ATTENTION: LA VERIF DES DOUBLONS 
// POUR LE UPDATE EST ENCORE PLUS PENIBLE...
$id     = filtrerNombre("id");
$login  = filtrerTexte("login");    // IL MANQUE LA VERIF DES DOUBLONS
$email  = filtrerEmail("email");    // IL MANQUE LA VERIF DES DOUBLONS
$level  = filtrerNombre("level");

if (count($tabErreur) == 0)
{
    $tabAssoColonneValeur = [
        "login"     => $login,
        "email"     => $email,
        "level"     => $level,
    ];
    $nomTable = "user";
    updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);

    // SANS AJAX JE RAJOUTE UNE REDICRECTION
    header("Location: admin.php");
}
else
{
    var_dump($tabErreur);
}