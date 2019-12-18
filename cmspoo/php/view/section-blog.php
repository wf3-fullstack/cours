<section>
    <h2>REQUETE AVEC JOINTURE ONE TO MANY</h2>
    <pre>
ON VEUT AFFICHER LA LISTE DES CONTENUS DANS LA categorie="blog"
ET ON VEUT AUSSI AFFICHER LE login DE L'AUTEUR DU CONTENU

https://sql.sh/cours/jointures/inner-join

    SELECT *
    FROM table1
    INNER JOIN table2 
    ON table1.id = table2.fk_id


    SELECT *
    FROM content 
    INNER JOIN user 
    ON content.id_user = user.id
    WHERE categorie='blog'


    </pre>
    <div class="contentList">
        <?php
        // JE VAIS CREER MA REQUETE AVEC JOINTURE
        $requeteSQLPreparee =
            <<<CODESQL

    SELECT *
    FROM content 
    INNER JOIN user 
    ON content.id_user = user.id
    WHERE categorie='blog'

CODESQL;

        $tabAssoColonneValeur = [];

        $objetModel = new Model;
        $objetPDOStatement = $objetModel->envoyerRequeteSQL($requeteSQLPreparee, $tabAssoColonneValeur);

        $tabResultat = $objetPDOStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tabResultat as $tabLigne) {
            $tabFiltre = array_map("htmlspecialchars", $tabLigne);
            extract($tabFiltre);

            echo
                <<<CODEHTML
        <article>
            <h3>$titre</h3>
            <p>créé par : $login</p>
        </article>
CODEHTML;
        }
        ?>
    </div>
</section>


<section>
    <h2>MANY TO MANY</h2>
    <pre>
ON VEUT FAIRE UNE JOINTURE EN MANY TO MANY
ENTRE 3 TABLES
    content         
    content_user
    user

    ET ON NE VEUT SELECTIONNER QUE LES CONTENUS DANS categorie='blog'
REQUETE SQL:

SELECT *
FROM content_user
INNER JOIN content 
ON content_user.id_content = content.id 
INNER JOIN user
ON content_user.id_user = user.id
WHERE content.categorie = 'blog'

    </pre>
    <div class="contentList">
        <?php
        // JE VAIS CREER MA REQUETE AVEC JOINTURE
        $requeteSQLPreparee =
<<<CODESQL

SELECT *
FROM content_user
INNER JOIN content 
ON content_user.id_content = content.id 
INNER JOIN user
ON content_user.id_user = user.id
WHERE content.categorie = 'blog'

CODESQL;

        $tabAssoColonneValeur = [];

        $objetModel = new Model;
        $objetPDOStatement = $objetModel->envoyerRequeteSQL($requeteSQLPreparee, $tabAssoColonneValeur);

        $tabResultat = $objetPDOStatement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tabResultat as $tabLigne) {
            $tabFiltre = array_map("htmlspecialchars", $tabLigne);
            extract($tabFiltre);

            echo
<<<CODEHTML
        <article>
            <h3>$titre</h3>
            <p>a été liké par $login</p>
        </article>
CODEHTML;
        }
        ?>
    </div>

</section>