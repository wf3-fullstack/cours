<?php

class MaClasse
{
    //-------------------------------------------
    // PROPRIETES DE CLASSE COLLECTIF (static)
    public static $metier = "plombier";

    // METHODES DE CLASSE COLLECTIF (static)

    //-------------------------------------------
    // PROPRIETES D'OBJET INDIVIDUELLE (VARIABLES DANS CLASSE)
    public $nom = "";

    // METHODES D'OBJET INDIVIDUELLE (FONCTIONS DANS CLASSE)
    function afficherNom($param1)
    {
        // DANS UNE METHODE D'OBJET
        // JE PEUX UTILISER UNE PROPRIETE DE L'OBJET AVEC $this
        echo "$param1 {$this->nom} {$this->prenom} ET JE SUIS ". MaClasse::$metier;
    }
}

$objet = new MaClasse;
$objet->nom     = "philippe";
$objet->prenom  = "catherine";
$objet->afficherNom("coucou");  // $this = $objet ET $param1 = "coucou"

$objet2 = new MaClasse;
// ERREUR CAR $this->prenom N'A PAS DE VALEUR
//$objet2->afficherNom("hello");  // $this = $objet2 ET $param1 = "hello"
$objet2->nom     = "aucune";
$objet2->prenom  = "idée";
$objet2->afficherNom("hello");  // $this = $objet2 ET $param1 = "hello"
