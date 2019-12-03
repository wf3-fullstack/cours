<?php

// RECUPERER LES INFOS DU FORMULAIRE
// nomTable
// id
$nomTable = filtrerTexte("nomTable");
$id       = filtrerNombre("id");

// $tabErreur EST UNE VARIABLE CREEE DANS traitement.php
if (count($tabErreur) == 0)
{
    // EFFACER LA LIGNE
    supprimerLigneSQL($nomTable, $id);

    // SANS AJAX JE RAJOUTE UNE REDIRECTION
    header("Location: admin.php");

}