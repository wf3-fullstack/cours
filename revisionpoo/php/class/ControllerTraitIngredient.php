<?php

trait ControllerTraitIngredient
{

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="ingredient">
    function ingredientForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "nom"              => $this->filtrerTexte("nom"),
            "conseil"          => $this->filtrerTexte("conseil", 1, 10000),
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "ingredient";

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            // DEBUG
            var_dump($this->tabErreur);
        }
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="ingredientUpdate">
    function ingredientUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "nom"              => $this->filtrerTexte("nom"),
            "conseil"          => $this->filtrerTexte("conseil", 1, 10000),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "ingredient";

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

}