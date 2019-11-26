<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- https://www.w3schools.com/php/php_file_upload.asp -->
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit">envoyer le fichier</button>
        <div class="alert">
<?php
if ($_FILES["image"] ?? "")
{
    // CODE QUI TRAITE LE FORMULAIRE
    // IL FAUDRAIT STOCKER DANS SQL LE CHEMIN DU FICHIER
    // IL FAUT CREER LE DOSSIER upload AVANT
    $cheminFichier = "upload/" . $_FILES["image"]["name"];

    // https://www.php.net/manual/fr/features.file-upload.post-method.php
    // https://www.php.net/manual/fr/function.move-uploaded-file.php
    move_uploaded_file($_FILES["image"]["tmp_name"], $cheminFichier);

    echo "le fichier est disponible ici: $cheminFichier";
}
?>
        </div>
    </form>
</body>

</html>