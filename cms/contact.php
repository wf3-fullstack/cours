<?php
require_once "php/mes-fonctions.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site CMS</title>
</head>

<body>
    <header>
        <h1>SITE CMS</h1>
        <nav>
            <?php creerMenu() ?>
        </nav>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE DE CONTACT</h2>
            <!-- CODER LE HTML DU FORMULAIRE EN 10 MINUTES -->
            <form action="traitement.php" method="POST">
                <!-- PARTIE PUBLIQUE VISIBLE DU FORMULAIRE-->
                <label>
                    <div>email</div>
                    <input type="email" name="email" required placeholder="votre email" maxlength="160">
                </label>
                <label>
                    <div>nom</div>
                    <input type="text" name="nom" required placeholder="votre nom" maxlength="160">
                </label>
                <label>
                    <div>message</div>
                    <textarea name="message" required cols="80" rows="8" placeholder="votre message"></textarea>
                </label>
                <div>
                    <button type="submit">ENVOYER VOTRE MESSAGE</button>
                </div>
                <!-- PARTIE TECHNIQUE INVISIBLE DE NOTRE FRAMEWORK -->
                <input type="hidden" name="identifiantFormulaire" value="contact">
                <div class="alert">
                    <!-- ICI AVEC AJAX, JE POURRAI AFFICHER LE MESSAGE DE CONFIRMATION -->
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>

</html>