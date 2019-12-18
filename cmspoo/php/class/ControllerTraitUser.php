<?php

trait ControllerTraitUser
{

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="user">
    function userForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "email"          => $this->filtrerEmail("email"),
            "login"          => $this->filtrerTexte("login"),
            "password"       => $this->filtrerTexte("password"),
            "level"          => $this->filtrerNombre("level"),
            "dateCreation"   => date("Y-m-d H:i:s"),    // COOL PHP PERMET DE LAISSER LA VIRGULE
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "user";
            // HASHER LE PASSWORD
            $tabAssoColonneValeur["password"] = password_hash($tabAssoColonneValeur["password"], PASSWORD_DEFAULT);

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            // DEBUG
            var_dump($this->tabErreur);
        }
    }


    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="userUpdate">
    function userUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "login"          => $this->filtrerTexte("login"),
            "email"          => $this->filtrerEmail("email"),
            "level"          => $this->filtrerNombre("level"),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "user";

            // GESTION A PART DU PASSWORD
            $password = $this->filtrerTexte("password");
            if ($password != "") {
                // SI IL Y A UN NOUVEAU MOT DE PASSE ALORS JE LE CHANGE DANS LA TABLE SQL
                $tabAssoColonneValeur["password"] = password_hash($password, PASSWORD_DEFAULT);
            }

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

}