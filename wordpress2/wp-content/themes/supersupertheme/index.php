<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON SUPER SITE AVEC MON THEME</title>

    <!-- WORDPRESS PEUT INSERER DU CODE CSS -->
    <?php wp_head() ?>
</head>

<body>
    <header>
        <h1>MON SUPER SITE AVEC MON THEME</h1>
        <nav>
            <?php wp_nav_menu(['theme_location' => 'primary']) ?>
        </nav>
    </header>
    <main>
        <section>
            <h2>TITRE2</h2>
<?php
    if (have_posts()) {
        // POUR LES PAGES, EN FAIT, ON NE PASSE QU'UNE FOIS DANS LA BOUCLE
        while (have_posts()) {
            the_post();     // IMPORTANT: PARCE C'EST QUI FAIT LE READ SQL
            //
            // Post Content here
            // POUR AFFICHER LE TITRE
            echo "<h3>";
            the_title();
            echo "</h3>";


            echo "<p>";
            the_content();
            echo "</p>";
            //
        } // end while
    } // end if
?>
        </section>
    </main>
    <footer>
        <nav>
            <?php wp_nav_menu(['theme_location' => 'secondary']) ?>
        </nav>
        <p>tous droits réservés - &copy;2019</p>
    </footer>
    <!-- WORDPRESS PEUT INSERER DU CODE JS (ET AUSSI HTML) -->
    <?php wp_footer() ?>

</body>

</html>