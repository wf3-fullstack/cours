<?php


class MaClasseParent
{
    // METHODES
    function afficherInfo()
    {
        echo "(MaClasseParent::afficherInfo)";
    }
}


class MaClasseEnfant
    extends MaClasseParent
{
    // METHODES
    function afficherInfo()
    {
        echo "(MaClasseEnfant::afficherInfo)";
        // SI DANS LA CLASSE ENFANT J'AI BESOIN D'APPELER LA METHODE PARENTE
        parent::afficherInfo();
    }
}

class PetitEnfant
    extends MaClasseEnfant
{
    function afficherInfo()
    {
        echo "(PetitEnfant::afficherInfo)";
        // SI DANS LA CLASSE ENFANT J'AI BESOIN D'APPELER LA METHODE PARENTE
        MaClasseParent::afficherInfo();
    }
    
}

$objetEnfant = new MaClasseEnfant;
$objetEnfant->afficherInfo();   // ?? LAQUELLE METHODE EST APPELEE
// COMME L'OBJET EST DE LA CLASSE MaClasseEnfant
// LA PRIORITE EST SUR LA METHODE DE LA CLASSE MaClasseEnfant

$objetPetitEnfant = new PetitEnfant;
$objetPetitEnfant->afficherInfo();
