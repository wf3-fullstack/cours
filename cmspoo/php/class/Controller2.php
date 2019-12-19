<?php
/**
 * Classe Controller2
 */

class Controller2 
{

    // ON VA COMPOSER NOTRE CLASSE AVEC LES TRAITS
    // (LES TRAITS SONT CHARGEES AVEC LA CLASSE... PAS DE GAIN DE PERFORMANCE...)
    use ControllerTraitContent, 
        ControllerTraitUser, 
        ControllerTraitContentUser,
        ControllerTraitFiltrer;

    // PROPRIETES
    protected $tabErreur = [];

    // METHODES
    // CONSTRUCTEUR
    // CE CODE EST DECLENCHE QUAND ON VA FAIRE $objet = new Controller
    function __construct ()
    {
        // JE VAIS TESTER SI IL Y A UN FORMULAIRE A TRAITER
        $identifiantFormulaire = $this->filtrerTexte("identifiantFormulaire");
        if ($identifiantFormulaire != "")
        {
            // NOTRE CONVENTION DANS NOTRE FRAMEWORK
            // JE VAIS VERIFIER SI J'AI UNE METHODE QUI S'APPELLE contentForm
            $nomMethode = "{$identifiantFormulaire}Form";
            // INTROSPECTION
            // https://www.php.net/manual/fr/function.method-exists.php
            if (method_exists($this, $nomMethode))
            {
                // OK LA METHODE EXISTE
                // COMMENT JE PEUX APPELER LA METHODE ?
                // PROGRAMMATION DYNAMIQUE (TORDU MAIS CA MARCHE...)
                // ON APPELLE UNE METHODE 
                // DONT LE NOM EST LA VALEUR DE LA VARIABLE $nomMethode
                $this->$nomMethode();
            }
        }
    }

    // METHODE ASSOCIEE AU FORMULAIRE
    // <input type="hidden" name="identifiantFormulaire" value="delete">
    function deleteForm()
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // nomTable
        // id
        $nomTable = $this->filtrerTexte("nomTable");
        $id       = $this->filtrerNombre("id");

        // $tabErreur EST UNE VARIABLE CREEE DANS traitement.php
        if (count($this->tabErreur) == 0) {
            // EFFACER LA LIGNE
            $objetModel = new Model;
            $objetModel->supprimerLigneSQL($nomTable, $id);
        }
        else
        {
            var_dump($this->tabErreur);
        }    
    }



}