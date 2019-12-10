<?php

// ON PEUT APPELER CETTE FONCTION COMME ON VEUT
function mes_menus()
{
    // LE NOMBRE DE ZONES DE MENU QUE MON THEME PROPOSE
    $locations = [
        'primary'    => 'MON MENU A MOI DE MON THEME',
        'secondary'  => 'MON 2E MENU',
    ];

    // https://developer.wordpress.org/reference/functions/register_nav_menus/
    register_nav_menus($locations);
}

// ON AJOUTE UN "EVENT LISTENER" QUI VA DECLENCHER L'APPEL A LA FONCTION mes_menus
add_action('init', 'mes_menus');
