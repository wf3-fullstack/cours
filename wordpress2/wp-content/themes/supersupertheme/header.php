<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON SUPER SITE AVEC MON THEME</title>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri("/style.css") ?>">

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
