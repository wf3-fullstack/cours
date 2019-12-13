<?php

$tabAsso = [];
// ECRITURE
$tabAsso["cle"] = "valeur";
// LECTURE
echo $tabAsso["cle"];   // "valeur"


// $_SESSION EST UN TABLEAU ASSOCIATIF
// $_SESSION["cle"] = "valeur";




// READ DES INFOS DANS LA TABLE user

// RECUPERER LES INFOS DU FORMULAIRE
// email
// password
$email          = filtrerEmail("email");
$passwordLogin  = filtrerTexte("password");   // EN CLAIR

if (count($tabErreur) == 0)
{
    // OK JE PEUX ALLER CHERCHER DANS LA BASE DE DONNEES SQL user
    // => ON VA FAIRE UN READ CETTE FOIS
    // ON NE PEUT UTILISER QUE $email 
    // ET PAS $password CAR LE MOT DE PASSE EST HASHE
    $tabResultat = lireTableSQL("user", "", "WHERE email = :email", [ "email" => $email ]);
    if (count($tabResultat) == 1)
    {
        // OK ON A UN EMAIL QUI CORRESPOND
        // IL FAUT ALLER VERIFIER LE MOT DE PASSE
        $tabLigne = $tabResultat[0];
        extract($tabLigne);
        // => VA CREER LES VARIABLE AVEC LE NOM DES COLONNES
        // => $id, $password, $level
        // => ATTENTION A NE PAS ECRASER DES VARIABLES EXISTANTES ($password)
        // https://www.php.net/manual/fr/function.password-verify.php
        if (password_verify($passwordLogin, $password))
        {
            // ON A LE BON EMAIL AVEC LE BON MOT DE PASSE
            // COOL => LE VISITEUR S'EST IDENTIFIE CORRECTEMENT
            echo "BIENVENUE $login ($email)";
            // IL FAUT MEMORISER DANS UNE SESSION LES INFOS UTILISATEUR
            // level => DONNE LE NIVEAU D'ACCES D'UN UTILISATEUR (IMPORTANT)
            // login => POUR POUVOIR AFFICHER "BONJOUR toto"
            // id    => POUR POUVOIR FAIRE DES JOINTURES (CLE ETRANGERE...)
            // dateLogin => POUR DONNER UNE LIMITE DE TEMPS A LA CONNEXION
            ecrireSession("level", $level);
            ecrireSession("login", $login);
            ecrireSession("id",    $id);
            // https://www.php.net/manual/fr/function.time.php  
            ecrireSession("dateLogin", time());
        }
        else
        {
            // LE MOT DE PASSE N'EST PAS CORRECT
            $tabErreur[] = "MOT DE PASSE INCORRECT";
            // DEBUG
            var_dump($tabErreur);
        }

    }
    else
    {
        // DESOLE L'EMAIL N'EXISTE PAS
        $tabErreur[] = "EMAIL NON PRESENT DANS LE SITE";
        // DEBUG
        var_dump($tabErreur);
    }

}
else
{
    var_dump($tabErreur);
}