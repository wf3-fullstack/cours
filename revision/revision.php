<?php

require_once "php/mes-fonctions.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Revision</title>
    <style>
        table td {
            border: 1px solid #cccccc;
        }

        table td img {
            width: 160px;
            height: 160px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header>
        <h1>REVISION</h1>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE CREATE SUR TABLE SQL sport</h2>
            <!-- ATTENTION: POUR UPLOAD NE PAS OUBLIER enctype="multipart/form-data" -->
            <form action="traitement.php" method="POST" enctype="multipart/form-data">
                <label>
                    <div>nom</div>
                    <input type="text" name="nom" required placeholder="votre nom">
                </label>
                <label>
                    <div>categorie</div>
                    <input type="text" name="categorie" required placeholder="votre categorie">
                </label>
                <label>
                    <div>description</div>
                    <textarea name="description" cols="80" rows="10" required placeholder="votre description"></textarea>
                </label>
                <label>
                    <div>photo</div>
                    <input type="file" name="photo" required placeholder="votre photo">
                </label>
                <label>
                    <div>nbJoueur</div>
                    <input type="number" name="nbJoueur" required placeholder="votre nbJoueur">
                </label>
                <label>
                    <div>difficulte</div>
                    <input type="number" name="difficulte" required placeholder="votre difficulte" min="0" max="10">
                </label>
                <label>
                    <div>dateCreation</div>
                    <!-- http://html5pattern.com/Dates -->
                    <input type="date" name="dateCreation" required placeholder="votre date au format YYYY-mm-dd">
                </label>
                <button type="submit">CREER UN SPORT</button>
                <!-- partie technique -->
                <input type="hidden" name="identifiantFormulaire" value="sport">
                <div class="alert">
                    <!-- ON VERRA LA CONFRIMATION AVEC AJAX-->
                </div>
            </form>
        </section>

        <section>
            <h2>FORMULAIRE UPDATE SUR TABLE SQL sport</h2>
            <!-- ATTENTION: POUR UPLOAD NE PAS OUBLIER enctype="multipart/form-data" -->
            <form action="traitement.php" method="POST" enctype="multipart/form-data">
                <label>
                    <div>nom</div>
                    <input type="text" name="nom" required placeholder="votre nom">
                </label>
                <label>
                    <div>categorie</div>
                    <input type="text" name="categorie" required placeholder="votre categorie">
                </label>
                <label>
                    <div>description</div>
                    <textarea name="description" cols="80" rows="10" required placeholder="votre description"></textarea>
                </label>
                <label>
                    <div>photo</div>
                    <!-- ATTENTION: LE VISITEUR N'EST PAS OBLIGE DE CHANGER LA PHOTO -->
                    <!-- ON ENLEVE required -->
                    <input type="file" name="photo" placeholder="votre photo">
                </label>
                <label>
                    <div>nbJoueur</div>
                    <input type="number" name="nbJoueur" required placeholder="votre nbJoueur">
                </label>
                <label>
                    <div>difficulte</div>
                    <input type="number" name="difficulte" required placeholder="votre difficulte" min="0" max="10">
                </label>
                <label>
                    <div>dateCreation</div>
                    <!-- http://html5pattern.com/Dates -->
                    <input type="date" name="dateCreation" required placeholder="votre date au format YYYY-mm-dd">
                </label>
                <button type="submit">MODIFIER UN SPORT</button>
                <!-- partie technique -->
                <!-- ATTENTION : NE PAS OUBLIER LE CHAMP id -->
                <input type="text" name="id" required placeholder="id de la ligne">
                <input type="hidden" name="identifiantFormulaire" value="sport-update">
                <div class="alert">
                    <!-- ON VERRA LA CONFRIMATION AVEC AJAX-->
                </div>
            </form>
        </section>


        <section class="nodisplay">
            <h2>FORMULAIRE DE DELETE SUR TABLE SQL</h2>
            <form class="formDelete" action="traitement.php" method="POST">
                <input type="text" name="nomTable" required placeholder="nomTable">
                <input type="text" name="id" required placeholder="id de ligne">
                <button type="submit">supprimer</button>
                <!-- partie technique -->
                <input type="hidden" name="identifiantFormulaire" value="delete">
                <div class="alert">
                    <!-- ici on va afficher la confirmation-->
                </div>
            </form>
        </section>


        <section>
            <h2>READ SUR LA TABLE SQL sport</h2>
            <div class="sportList">
                <table>
                    <tbody>
                        <?php
                        // IL FAUT ALLER LIRE LES LIGNES DANS LA TABLE SQL contact
                        // JE VAIS UTILISER LA FONCTION lireLigneSQL
                        // => NE PAS OUBLIER DE CHARGER LE FICHIER mes-fonctions.php AVANT
                        // require_once "php/mes-fonctions.php";

                        $tabSport = lireTableSQL("sport", "ORDER BY id DESC");
                        // PARCOURIR LES ELEMENTS DU TABLEAU
                        foreach ($tabSport as $indice => $tabAssoSport) {
                            // ASTUCE: ON UTILISE extract
                            extract($tabAssoSport);
                            // => CREE LES VARIABLES AVEC LE NOM DES COLONNES
                            echo
                                <<<CODEHTML

                    <tr data-id="$id" class="art$id">
                        <td>$id</td>
                        <td>$nom</td>
                        <td>$categorie</td>
                        <td><pre>$description</pre></td>
                        <td><img src="$photo"></td>
                        <td>$nbJoueur</td>
                        <td>$difficulte</td>
                        <td>$dateCreation</td>
                        <td><button class="update" data-id="$id">modifier</button></td>
                        <td><button data-table="sport" data-id="$id" class="delete">supprimer</button></td>
                    </tr>

CODEHTML;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>


    <script>
        // AJOUTER LE CODE JS POUR GERER LE CLICK SUR LE BOUTON DELETE
        var tabButtonDelete = document.querySelectorAll("button.delete");
        tabButtonDelete.forEach(function(button) {
            button.addEventListener("click", function(event) {
                // debug
                // event.target donne le bouton qui a activé la fonction
                console.log(event.target);
                // recupérer dans les attributs les infos nécessaires
                var nomTable = event.target.getAttribute("data-table");
                var id = event.target.getAttribute("data-id");
                // remplir le formulaire avec ces infos
                var inputNomTable = document.querySelector(".formDelete input[name=nomTable]");
                var inputId = document.querySelector(".formDelete input[name=id]");
                inputNomTable.value = nomTable;
                inputId.value = id;

                // MAINTENANT ON PEUT ENVOYER LE FORMULAIRE QUI EST REMPLI
                var formDelete = document.querySelector(".formDelete");
                // https://www.w3schools.com/jsref/met_form_submit.asp
                formDelete.submit();
            });
        });
    </script>

</body>

</html>