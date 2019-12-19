<?php

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*

(header)
(mon contenu)
(footer)

*/

// COMPLETER

// NE PAS MODIFIER LE CODE SUIVANT
class View
{
    // METHODES
    function afficherContenu()
    {
        echo "(header)";
        echo $this->lireContenu();
        // astuce => on a détourné la méthode du parent 
        // avec une surcharge dans la classe enfant
        echo "(footer)";
    }

    function lireContenu()
    {
        return "coucou";
    }
}

$objet = new MaView;
$objet->afficherContenu();
