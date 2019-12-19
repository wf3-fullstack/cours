<?php

trait ControllerTraitIngredientRecette
{

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="ingredient_recette">
    function ingredient_recetteForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "id_ingredient"       => $this->filtrerNombre("id_ingredient"),
            "id_recette"          => $this->filtrerNombre("id_recette"),
            "quantite"            => $this->filtrerTexte("quantite"),
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "ingredient_recette";

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            // DEBUG
            var_dump($this->tabErreur);
        }
    }


    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="ingredient_recetteUpdate">
    function ingredient_recetteUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "id_ingredient"       => $this->filtrerNombre("id_ingredient"),
            "id_recette"          => $this->filtrerNombre("id_recette"),
            "quantite"            => $this->filtrerTexte("quantite"),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "ingredient_recette";

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

}