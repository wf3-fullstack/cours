<?php


// ON NE PEUT PAS CREER D'OBJET A PARTIR D'UN TRAIT
trait ControllerTraitContent
{
    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="content">
    function contentForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "filename"          => $this->filtrerTexte("filename"),
            "titre"             => $this->filtrerTexte("titre"),
            "contenuPage"       => $this->filtrerTexte("contenuPage", 1, 10000),
            "photo"             => $this->filtrerTexte("photo"),
            "datePublication"   => date("Y-m-d H:i:s"),    // COOL PHP PERMET DE LAISSER LA VIRGULE
            "categorie"         => $this->filtrerTexte("categorie"),
            "template"          => $this->filtrerTexte("template", 0),
            // POUR LE DEV (NORMALEMENT ON PASSE PAR LA SESSION POUR DONNER id_user)
            "id_user"          => $this->filtrerNombre("id_user"),
        ];

        if (count($this->tabErreur) == 0) {
            $nomTable = "content";

            $objetModel = new Model;
            $objetModel->insererLigneSQL($nomTable, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="contentUpdate">
    function contentUpdateForm()
    {
        // CREATE SUR LA TABLE content
        $tabAssoColonneValeur = [
            "filename"          => $this->filtrerTexte("filename"),
            "titre"             => $this->filtrerTexte("titre"),
            "contenuPage"       => $this->filtrerTexte("contenuPage", 1, 10000),
            "photo"             => $this->filtrerTexte("photo"),
            "datePublication"   => date("Y-m-d H:i:s"),    // COOL PHP PERMET DE LAISSER LA VIRGULE
            "categorie"         => $this->filtrerTexte("categorie"),
            "template"          => $this->filtrerTexte("template", 0),
            // POUR LE DEV (NORMALEMENT ON PASSE PAR LA SESSION POUR DONNER id_user)
            "id_user"          => $this->filtrerNombre("id_user"),
        ];

        // ON GERE id A PART
        $id = $this->filtrerNombre("id");

        if (count($this->tabErreur) == 0) {
            $nomTable = "content";

            $objetModel = new Model;
            $objetModel->updateLigneSQL($nomTable, $id, $tabAssoColonneValeur);
        } else {
            var_dump($this->tabErreur);
        }
    }

}