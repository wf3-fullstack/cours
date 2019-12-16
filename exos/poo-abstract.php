<?php


// Fatal error: Class MaClassePasFinie contains 1 abstract method and must therefore be declared abstract
// ATTENTION: IL FAUT AUSSI AJOUTER abstract DEVANT LA CLASSE
abstract class MaClassePasFinie
{
    // PROPRIETES

    // METHODES

    // METHODES PAS FINIES
    // DECLAREE MAIS PAS DEFINIE
    abstract public function faireTravail();
    // SI ON MET abstract ET {}
    // Fatal error: Abstract function MaClassePasFinie::faireTravail() cannot contain body
    // ATTENTION: abstract AU DEBUT ET PAS DE {}

    function faireUnTrucUtile ()
    {
        echo "(faireUnTrucUtile)";
    }

}

// COMME LA CLASSE N'EST PAS FINIE
// => ON NE PEUT CREER D'OBJET AVEC
// $objet = new MaClassePasFinie;
// => ERREUR
// Fatal error: Uncaught Error: Cannot instantiate abstract class MaClassePasFinie


class MaClasseEnfant
    extends MaClassePasFinie
{

    // ON VA FINIR DE CODER LA METHODE ABSTRAITE
    public function faireTravail()
    {
        echo "faireTravail";
    }

}

$objet = new MaClasseEnfant;
$objet->faireUnTrucUtile();     // METHODE DE LA CLASSE MaClassePasFinie
$objet->faireTravail();         // METHODE DE LA CLASSE MaClasseEnfant
