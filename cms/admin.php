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
</head>

<body>
    <header>
        <h1>ADMIN CMS</h1>
        <nav>
            <a href="index.php">accueil</a>
            <a href="contact.php">contact</a>
            <a href="admin.php">admin</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>READ SUR TABLE SQL contact</h2>
            <div class="contactList">
                <?php
                // IL FAUT ALLER LIRE LES LIGNES DANS LA TABLE SQL contact
                // JE VAIS UTILISER LA FONCTION lireLigneSQL
                // => NE PAS OUBLIER DE CHARGER LE FICHIER mes-fonctions.php AVANT
                // require_once "php/mes-fonctions.php";

                $tabContact = lireTableSQL("contact", "ORDER BY datePublication DESC");
                // PARCOURIR LES ELEMENTS DU TABLEAU
                foreach ($tabContact as $indice => $tabAssoContact) 
                { 
                    // ASTUCE: ON UTILISE extract
                    extract($tabAssoContact);
                    // => CREE LES VARIABLES AVEC LE NOM DES COLONNES
                    echo
<<<CODEHTML

                    <article>
                        <h3>$email</h3>
                        <h4>$nom</h4>
                        <pre>$message</pre>
                        <p>$datePublication</p>
                        <button>supprimer</button>
                    </article>

CODEHTML;
                }

                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>

</html>