<?php

trait ControllerTraitContentUser
{

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="content_user">
    function content_userForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "id_content"          => $this->filtrerNombre("id_content"),
            "id_user"          => $this->filtrerNombre("id_user"),
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "content_user";

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            // DEBUG
            var_dump($this->tabErreur);
        }
    }


    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="userUpdate">
    function content_userUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "id_content"       => $this->filtrerNombre("id_content"),
            "id_user"          => $this->filtrerNombre("id_user"),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "content_user";

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

}