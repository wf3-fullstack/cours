<?php

$level = lireSession("level");
if ($level >= 10)
{
    // RECUPERER LES INFOS DU FORMULAIRE
    // nomTable
    // id
    $nomTable = filtrerTexte("nomTable");
    $id       = filtrerNombre("id");

    // $tabErreur EST UNE VARIABLE CREEE DANS traitement.php
    if (count($tabErreur) == 0) {
        // EFFACER LA LIGNE
        $objetModel = new Model;
        $objetModel->supprimerLigneSQL($nomTable, $id);

        // SANS AJAX JE RAJOUTE UNE REDIRECTION
        header("Location: admin.php");
    }
}
else
{
    // ON NE FAIT RIEN
}
