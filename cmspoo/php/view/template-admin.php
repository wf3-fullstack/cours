<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form>* {
            display: block;
            margin: 0.25rem;
        }
    </style>
</head>

<body>
    <header>
        <h1>MA PAGE ADMIN</h1>
        <nav>
            <a href="index.php">accueil</a>
            <a href="blog.php">blog</a>
            <a href="contact.php">contact</a>
            <!-- POUR LE DEV -->
            <a href="admin.php">admin</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE CREATE SUR LA TABLE SQL content</h2>
            <form action="" method="POST">
                <input type="text" name="filename" required placeholder="filename">
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="contenuPage" cols="60" rows="5" required placeholder="contenuPage"></textarea>
                <input type="text" name="photo" required placeholder="photo">
                <input type="text" name="categorie" required placeholder="categorie">
                <input type="text" name="template" placeholder="template">
                <button>PUBLIER UN CONTENU</button>
                <input type="hidden" name="identifiantFormulaire" value="content">
            </form>
        </section>
    </main>
</body>

</html>