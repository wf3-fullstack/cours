## POO JOUR 02


### RESUME DE L'EPISODE D'HIER...


https://www.php.net/manual/fr/language.oop5.decon.php


    class Boulanger 
    {
        //------ CLASSE (COLLECTIF) ----------------
        static function faireA ()
        {

        }

        //------- OBJET (INDIVIDUEL) ---------------
        // PROPRIETE D'OBJET
        public $nom = "";   // $

        // CONSTRUCTEUR    
        function __construct ($nom)
        {
            $this->nom = $nom;
        }

    }


$monBoulanger = new Boulanger;
$monBoulanger -> nom = "roger";   
// ATTENTION: LE $ EST SUR $monBoulanger MAIS PAS SUR nom

// ON PEUT RAJOUTER SUR CHAQUE OBJET DES PROPRIETES SUPPLEMENTAIRES
// APRES LA CREATION AVEC new
$monBoulanger -> coucou = "blabla";


class
    proprietes      => variables dans classe (individuelle sur chaque objet) 
                            $objet -> propriete1
    methodes        => fonctions dans classe ->
    methodes static => methodes de classe (et pas d'objet) ::

METHODES MAGIQUES
construct
destruct

Une classe a un nom qui commence par une Majuscule
ET CHAQUE CLASSE SERA DANS SON FICHIER AVEC LE MEME NOM QUE LA CLASSE
exemple: LA CLASSE Boulanger SERA DANS LE FICHIER php/class/Boulanger.php

new POUR CREER UN OBJET

SI ON VEUT FAIRE DU 100% OBJET 
=> ON NE DEVRAIT PLUS UTILISER DES FONCTIONS


