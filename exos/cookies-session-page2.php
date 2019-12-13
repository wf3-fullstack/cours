<?php

if (!isset($_SESSION)) {
    session_save_path("session");

    // PHP VA VERIFIER SI IL Y A DEJA UN COOKIE PHPSESSID
    // SI CE COOKIE N'EST PAS PRESENT 
    // ALORS IL CREE UN IDENTIFIANT UNIQUE POUR CE COOKIE
    session_start();
}

var_dump($_SESSION);

