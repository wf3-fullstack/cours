<?php

/*
// RECOMPOSER AVEC LES MORCEAUX EN PHP
require_once "header.php";
require_once "template-parts/section-index.php";
require_once "footer.php";
*/

// RECOMPOSER AVEC WORDPRESS
// => PERMET LA FONCTIONNALITE DES THEMES ENFANTS
// (RAJOUTER DU CODE SUPPLEMENTAIRE A UN THEME "PARENT")
get_header();
get_template_part("template-parts/section-index");
get_footer();
