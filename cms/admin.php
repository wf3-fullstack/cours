<?php

// CHARGER MES FONCTIONS AU DEBUT
require_once "php/mes-fonctions.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN CMS</title>
    <style>

        html, body {
            font-size:16px;
        }
        .nodisplay {
            display: none;
        }

        table {
            width:100%;
        }
        td {
            border:1px solid #123456;
            padding:0.2rem;
        }
    </style>
</head>

<body>
    <header>
        <h1>ADMIN CMS</h1>
        <nav>
            <a href="index.php">accueil</a>
            <a href="contact.php">contact</a>
            <a href="admin.php">admin</a>
            <a href="inscription.php">inscription</a>
        </nav>
    </header>
    <main>
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
            <h2>READ SUR TABLE SQL contact</h2>
            <div class="contactList">
                <table>
                    <tbody>
                <?php
                // IL FAUT ALLER LIRE LES LIGNES DANS LA TABLE SQL contact
                // JE VAIS UTILISER LA FONCTION lireLigneSQL
                // => NE PAS OUBLIER DE CHARGER LE FICHIER mes-fonctions.php AVANT
                // require_once "php/mes-fonctions.php";

                $tabContact = lireTableSQL("contact", "ORDER BY datePublication DESC");
                // PARCOURIR LES ELEMENTS DU TABLEAU
                foreach ($tabContact as $indice => $tabAssoContact) {
                    // ASTUCE: ON UTILISE extract
                    extract($tabAssoContact);
                    // => CREE LES VARIABLES AVEC LE NOM DES COLONNES
                    echo
                        <<<CODEHTML

                    <tr data-id="$id" class="art$id">
                        <td>$email</td>
                        <td>$nom</td>
                        <td><pre>$message</pre></td>
                        <td>$datePublication</td>
                        <td><button data-table="contact" data-id="$id" class="delete">supprimer</button></td>
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