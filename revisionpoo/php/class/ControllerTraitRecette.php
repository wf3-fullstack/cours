<?php

trait ControllerTraitRecette
{

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="recette">
    function recetteForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "titre"                => $this->filtrerTexte("titre"),
            "description"          => $this->filtrerTexte("description", 1, 10000),
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "recette";

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            // DEBUG
            var_dump($this->tabErreur);
        }
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="recetteUpdate">
    function recetteUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "titre"                => $this->filtrerTexte("titre"),
            "description"          => $this->filtrerTexte("description", 1, 10000),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "recette";

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

}