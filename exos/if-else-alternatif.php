<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    $test = false;
    $test2 = false;
    $texte = "coucou";
    ?>
    <?php echo "<h1>$texte</h1>" ?>
    <!-- RACCOURCI MAIS DECONSEILLE MAINTENANT -->
    <?= "<h1>$texte</h1>" ?>

    <?php if ($test) : ?>
        <h1>SCENARIO1</h1>
    <?php elseif ($test2) : ?>
        <h1>SCENARIO2</h1>
    <?php else : ?>
        <h1>SCENARIO3</h1>
    <?php endif ?>

</body>

</html>
<?php
