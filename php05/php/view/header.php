<?php
// JE CHARGE MES FONCTIONS
require_once "php/mes-fonctions.php";
// SINON PHP SORT UNE ERREUR
// Fatal error: Uncaught Error: Call to undefined function creerMenu()
// => ON A APPELEE UNE FONCTION QUI N'A PAS ETE DEFINIE AVANT

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON SITE VITRINE</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="<?php echo $titre1 ?? ""; ?>">
    <header>
        <h1>MON SITE VITRINE <?php echo $titre1 ?? "valeur par défaut"; ?></h1>
        <nav>
<?php creerMenu(); ?>
        </nav>
    </header>
    <main>