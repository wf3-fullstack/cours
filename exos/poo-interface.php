<?php


// ATTENTION: ON CHANGE CE N'EST PLUS class MAIS interface
interface MonInterface
{
    // IL N'Y A QUE DES METHODES ABSTRAITES
    // AUCUN BLOC D'ACCOLADES
    function faireA($param1, $param2);
    function faireB($param1, $param2, $param3);
}

// UNE INTERFACE EST UN "CONTRAT" QUE LE DEVELOPPEUR S'ENGAGE A RESPECTER SUR LES METHODES

class MaClasse
    implements MonInterface // VOUS VOUS ENGAGEZ A DEFINIR TOUTES LES METHODES DE L'INTERFACE
{
    function faireA($param1, $param2)
    { 
        
    }

    // Fatal error: Class MaClasse contains 1 abstract method 
    // and must therefore be declared abstract or implement the remaining methods 
    // (MonInterface::faireB)
    function faireB($param1, $param2, $param3)
    {

    }

}
