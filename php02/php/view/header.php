<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON SITE VITRINE</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="<?php echo $titre1; ?>">
    <header>
        <h1>MON SITE VITRINE <?php echo $titre1 ?? "valeur par défaut"; ?></h1>
        <nav>
            <a href="index.php">accueil</a>
            <a href="services.php">services</a>
            <a href="contact.php">contact</a>
        </nav>
    </header>
    <main>