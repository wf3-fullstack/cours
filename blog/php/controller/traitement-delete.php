<?php

// A FAIRE ABSOLUMENT: SECURITE
// IL FAUT PROTEGER CE FORMULAIRE
// POUR NE LAISSER PASSER QUE LES PERSONNES IDENTIFIEES

// RECUPERER LES INFOS DU FORMULAIRE
// ICI ON RECUPERE 
$id         = filtrerInput("id");
$nomTable   = filtrerInput("nomTable");

// ICI J'APPELLE LA FONCTION SANS DONNER DE VALEUR
// AU 3E PARAMETRE, DANS CE CAS, LE 3E PARAMETRE PREND SA VALEUR PAR DEFAUT "id"
supprimerLigneSQL($nomTable, $id);

// SANS AJAX
// JE RAJOUTE UNE REDIRECTION
header("Location: admin-recettes.php");

