<?php
// CHARGER MES FONCTIONS AVANT
require_once "php/mes-fonctions.php";

// LE MINIMUM A FAIRE
// C'EST DE CHANGER LE level POUR NE PLUS AUTORISER LES ACCES
ecrireSession("level", "-1");

// ON REDIRIGE VERS LA PAGE login.php
header("Location: login.php");