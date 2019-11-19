## COURS DU MARDI 19/11

## TABLEAUX ASSOCIATIFS

    RAPPEL: TABLEAU ORDONNE OU INDICES

```php
<?php

$tableau = [ "a", "b", "c" ];
$premierElement = $tableau[0];      // indice du premier élément est 0

?>
```

    ON A AUSSI DES TABLEAUX ASSOCIATIFS: AU LIEU D'UTILISER DES NOMBRES (INDICES)
    POUR DISTINGUER LES ELEMENTS, ON VA UTILISER UN TEXTE (CLE) POUR DISTINGUER LES VALEURS

```php
<?php

$tableauAssociatif = [ "cle1" => "a", "cle2" => "b", "cle3" => "c",];

// SI JE VEUX RETROUVER LA VALEUR ASSOCIEE A "cle1"
$element1 = $tableauAssociatif["cle1"];

// SI JE VEUX CHANGER LA VALEUR ASSOCIEE A LA CLE "cle2"
$tableauAssociatif["cle2"] = "nouvelle valeur";

// SI JE VEUX AJOUTER UN NOUVEL ELEMENT DANS LE TABLEAU ASSOCIATIF
$tableauAssociatif["cle4"] = "valeur4";


// EN JS
// var objet = { "propriete1" : "valeur1", "propriete2": "valeur2" };
// var valeur = objet.propriete1;
// var valeur2 = objet["propriete2"];
?>
```

    ATTENTION: COMME LES CLES SERVENT A DISTINGUER LES ELEMENTS
    IL FAUT QUE LES CLES SOIENT UNIQUES
    => CA PEUT CHANGER VOTRE CHOIX D'UTILISATION DES CLES ET DES VALEURS

## BOUCLES ET TABLEAUX ASSOCIATIFS

    POUR PARCOURIR UN TABLEAU ASSOCIATIF, ON VA UTILISER foreach
    => PRENDRE LES ELEMENTS DU PREMIER AU DERNIER

```php
<?php
foreach($tableauAssociatif as $cle => $valeur)
{
    echo "<h2>($cle)($valeur)</h2>";
}

?>
```


## NOTE: ON PEUT CREER UN TABLEAU VIDE ET LE REMPLIR APRES

```php
<?php
$tableau = [];
$tableau["cle1"] = "valeur1";

$tableauOrdonne = [];
$tableauOrdonne[] = "valeur1";

// EN JS
// var objet = {};
// objet.propriete1 = "valeur1";
// objet.propriete2 = "valeur2";
?>
```

## SUPPRIMER UN ELEMENT DANS UNE VARIABLE OU UN TABLEAU

```php
<?php
// unset
// https://www.php.net/manual/fr/function.unset.php

$texte = "coucou";
echo "<h2>$texte</h2>";
unset($texte);
echo "<h2>$texte</h2>";


$tableau = [ "a", "b", "c" ];
var_dump($tableau);
?>
```

    // ON PEUT AUSSI UTILISER DES CLASSES SPL POUR LES LISTES DYNAMIQUES
    https://www.php.net/manual/fr/book.spl.php



## PROGRAMMATION FONCTIONNELLE


    PROGRAMMATION FONCTIONNELLE => 10.000 LIGNES DE CODE
    (ANNEES 1980...)

    PROGRAMMATION ORIENTE OBJET => 100.000 + LIGNES DE CODE
    (ANNEES 1990...)

    https://informationisbeautiful.net/visualizations/million-lines-of-code/

    POUR ORGANISER MON CODE, JE VAIS LE RANGER DANS DES FONCTIONS

    AVEC PHP, LE BON COTE C'EST QUE ON A DES MILLIERS DE FONCTIONS DEJA DISPONIBLES
    => VRAIMENT COOL AVEC PHP

    ET EN PLUS DE CES FONCTIONS, LES DEVELOPPEURS PEUVENT CREER LEURS FONCTIONS

```php
<?php

// LE CODE RANGE DANS UNE FONCTION EST EN ATTENTE
function afficherMenu ()
{
    // instruction1
    // instruction2
}


function afficherGalerie ()
{
    // instruction10
    // instruction11
}

// POUR ACTIVER LE CODE DE LA FONCTION
// ON VA APPELER LA FONCTION
afficherMenu();

afficherGalerie();

?>
```

    VOTRE VIE DE DEVELOPPEUR

    ETAPE1: DECLARER MES FONCTIONS
    ETAPE2: APPELER MES FONCTIONS


## FONCTIONS AVEC PARAMETRES

exemple de fonction avec paramètres

```php
<?php

// DANS LA DECLARATION DE LA FONCTION
// JE PEUX AJOUTER DES PARAMETRES DANS LES PARENTHESES
// EN FAIT: UN PARAMETRE EST UNE VARIABLE
function afficherGalerie ($parametre1, $parametre2)
{
    // ligne code php 1
    // ligne code php 2
    // ...
}

// SI LA DECLARATION DE LA FONCTION DEMANDE DES PARAMETRES
// QUAND J'APPELLE LA FONCTION
// IL FAUDRA FOURNIR DES VALEURS A CES PARAMETRES
// PHP STOCKE CHAQUE VALEUR DANS CHAQUE PARAMETRE DANS LE MEME ORDRE
afficherGalerie("valeur1", "valeur2");

?>
```

## EXEMPLES DE FONCTIONS AVEC PARAMETRES

exemple de fonctions avec paramètres

```php
<?php
// CALCULER LE PRIX TTC AVEC 2 PARAMETRES: LE PRIX HT ET LE TAUX TVA
// ON VEUT CREER UNE FONCTION
// QUI VA CALCULER LE PRIX TTC A PARTIR DE 2 PARAMETRES 
// LE PRIX HT
// LE TAUX TVA

// DECLARATION DE LA FONCTION: LE CODE EST EN ATTENTE
function calculerTTC ($prixHT, $tauxTVA)
{
    $prixTTC = $prixHT + ( $prixHT * $tauxTVA / 100 );
    // ON AFFICHE LE RESULTAT
    echo "<h2>LE PRIX TTC EST $prixTTC</h2>";
}


// ACTIVER LA FONCTION
calculerTTC(100, 20);   // 120

?>
```

## RENVOYER UNE VALEUR COMME RESULTAT DE LA FONCTION

```php
<?php

function calculerTTC ($prixHT, $tauxTVA)
{
    $prixTTC = $prixHT + ( $prixHT * $tauxTVA / 100 );

    // RENVOIE LA VALEUR COMME RESULTAT DE LA FONCTION
    return $prixTTC; 
    // return ARRETE LE CODE
    // SI ON MET DU CODE ENSUITE
    // IL NE SERA PAS EXECUTE...
}

// DANS $resultat JE VAIS STOCKER LA VALEUR FOURNIE PAR return
$resultat = calculerTTC(100, 20);

echo "<h2>LE PRIX TTC EST $resultat</h2>";

?>
```

## LES FONCTIONS COMME DES CHAINES DE PRODUCTION


```php
<?php
function produireCoca ($sucre, $extrait, $plastique)
{
    return $bouteilleCoca;
}


// PARAMETRES => FONCTION QUI TRANSFORME CES PARAMETRES => return LE PRODUIT FINAL

function construireVoiture ($electronique, $tole, $mecanique)
{
    return $voiture;
}

?>
```

## EXEMPLE: ADDITIONNER

```php
<?php

// CREER UNE FONCTION QUI PRODUIT LA SOMME DE 2 NOMBRES EN PARAMETRES
function additionner ($nombre1, $nombre2)
{
    return $nombre1 + $nombre2;
}

// APPELER LA FONCTION
$somme1 = additionner(10, 12);  // $somme1 = 22

echo "<h2>$somme</h2>";

?>
```

## EXEMPLE: CALCULER LE PLUS PETIT ENTRE 2 NOMBRES

```php
<?php

// CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT ENTRE 2 PARAMETRES

function trouverMin ($nombre1, $nombre2)
{
    if ($nombre1 > $nombre2) 
    {
        return $nombre2;
        // ICI ON S'ARRETE
    }
    return $nombre1;
}

?>
```

## EXEMPLE AVEC UN TABLEAU

```php
<?php
// CREER UNE FONCTION trouverMinTableau
// VA PRENDRE UN TABLEAU DE NOMBRES EN PARAMETRE
// ET VA RENVOYER LE PLUS PETIT NOMBRE DANS LE TABLEAU

function trouverMinTableau ($tableauNombre)
{
    // COMMENT ON TROUVE $min ?
    // J'INITIALISE AVEC LE PREMIER ELEMENT
    $min = $tableauNombre[0];

    foreach($tableauNombre as $indice => $nombre)
    {
        if ($nombre < $min)
        {
            // ON A TROUVE UN NOUVEAU MINIMUM
            // ON MET A JOUR LA VALEUR DE $min
            $min = $nombre;
        }
    }

    // RENVOYER LE RESULTAT
    return $min;
}


// APPELER LA FONCTION 
$resultat = trouverMinTableau([ 7, 13, 9, 806 ]);

?>
```

## EXERCICES SUR LES FONCTIONS

    ENONCE: CREER UN FICHIER PAR FONCTION

    ET DANS CHAQUE FICHIER DEFINIR LA FONCTION DEMANDEE
    ET ENSUITE APPELER LA FONCTION 2 FOIS AVEC DES PARAMETRES DIFFERENTS
    POUR VERIFIER QU'ON OBTIENT LES BONS RESULTATS

    BONUS: ECRIRE LES MEMES FONCTIONS EN JS


    * exo1: CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT ENTRE 2 NOMBRES

        CREER LE FICHIER exo1.php
        ET DANS CE FICHIER AJOUTER LE CODE
        ETAPE1: DECLARATION DE LA FONCTION
        ETAPE2: APPELER LA FONCTION 2 FOIS AVEC DES VALEURS DIFFERENTES POUR LES PARAMETRES

    * exo2: CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT 
        ENTRE 3 NOMBRES RECUS EN PARAMETRES

        NOTE: VOUS POUVEZ AVOIR BESOIN DES OPERATEURS LOGIQUES: 
            ET      &&      AND 
            OU      ||      OR

    * exo3: CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT NOMBRE DANS UN TABLEAU

    * exo4: CREER UNE FONCTION QUI RENVOIE LE PRIX TTC 
        A PARTIR DU PRIX HT ET DU TAUX TVA

    * exo5: CREER UNE FONCTION QUI RENVOIE LA SURFACE DES 4 MURS 
        SI ON DONNE EN PARAMETRES: HAUTEUR, LARGEUR ET LONGUEUR

    * exo6: CREER UNE FONCTION QUI RENVOIE LA SOMME DES NOMBRES 
        DANS UN TABLEAU EN PARAMETRE

    * exo7: CREER UNE FONCTION QUI COMPTE LE NOMBRE DE NOMBRES PAIRS 
        DANS UN TABLEAU RECU EN PARAMETRE

    * exo8: CREER UNE FONCTION concatenerTexte 
        QUI CONCATENE LES LETTRES DANS UN TABLEAU (EN PARAMETRE)
        ET QUI AJOUTE UNE VIRGULE ENTRE LES LETTRES
        (ATTENTION: PAS DE VIRGULE AU DEBUT, NI A LA FIN)

        concatenerTexte([ 'a', 'b', 'c', 'd' ]);
        // RESULTAT "a,b,c,d"

        concatenerTexte([ 'i', 'j', 'k' ]);
        // RESULTAT "i,j,k"


    * exo9: CREER UNE FONCTION calculerPrixTotal 
        QUI PREND EN PARAMETRES 2 TABLEAUX
        $tabQuantite
        $tabPrixUnitaire
        ET QUI RENVOIE LE PRIX TOTAL DU PANIER

        NOTE: L'ORDRE DES VALEURS DANS LES 2 TABLEAUX EST CORRECTEMENT FOURNI

    * exo10: CREER UNE FONCTION creerDeleteSQL  
        LA FONCTION PREND 2 PARAMETRES: $nomTable ET $id
        ET RENVOIE LE CODE SQL POUR UN DELETE
        
        ET SI ON APPELLE LA FONCTION
        creerDeleteSQL("contact", 5);

        DEVRA RENVOYER LE TEXTE SUIVANT:

        DELETE FROM contact
        WHERE id = 5

    * exo11: CREER UNE FONCTION creerInsertSQL 
        LA FONCTION PREND 2 PARAMETRES
        LE NOM DE LA TABLE SQL: $nomTable
        UN TABLEAU ASSOCIATIF: $tabAssoColVal

        ET SI ON APPELLE LA FONCTION

            $requeteSQLPreparee = creerInsertSQL(
                                        "newsletter", 
                                        [ "nom" => "julie", "email" => "julie@nomail.me" ]);

            echo "<pre>$requeteSQLPreparee</pre>";

        /*
            ON DEVRAIT OBTENIR

            INSERT INTO newsletter
            ( nom, email )
            VALUES
            ( :nom, :email )

        */

        // ATTENTION: 
        // LES VALEURS DU TABLEAU ASSOCIATIF NE SONT PAS UTILISEES
        // ON MET DES JETONS (TOKENS) A LA PLACE DES VALEURS
        // SEULS LES CLES DU TABLEAU ASSOCIATIF SERVENT...


    * exo12: CREER UNE FONCTION creerUpdateSQL 
        LA FONCTION PREND 2 PARAMETRES
        LE NOM DE LA TABLE SQL: $nomTable
        UN TABLEAU ASSOCIATIF: $tabAssoColVal

        EXEMPLE D'UTILISATION:

        $requeteSQLPreparee = creerUpdateSQL("newsletter", 
                                [ "nom" => "julie", "email" => "julie@nomail.me" ]);

        echo "<pre>$requeteSQLPreparee</pre>";

        /*
        ON DEVRAIT OBTENIR

        UPDATE newsletter
        SET
        nom = :nom,
        email = :email
        WHERE 
        id = :id

        */
        // ATTENTION: 
        // LES VALEURS DU TABLEAU ASSOCIATIF NE SONT PAS UTILISEES
        // ON MET DES JETONS (TOKENS) A LA PLACE DES VALEURS
        // SEULS LES CLES DU TABLEAU ASSOCIATIF SERVENT...

    * exo13: DESSINER UN DAMIER dessinerDamier

        SI ON APPELLE LA FONCTION

        dessinerDamier(3);

        ON DEVRAIT OBTENIR LE TEXTE SUIVANT

        X0X
        0X0
        X0X

        SI ON APPELLE LA FONCTION

        dessinerDamier(4);

        ON DEVRAIT OBTENIR LE TEXTE SUIVANT

        X0X0
        0X0X
        X0X0


    * exo14: CREER UNE FONCTION distribuerBillet 
        QUI DISTRIBUE LES BILLETS
        EN PARAMETRE, ON FOURNIT LE MONTANT DEMANDE

        // ON PRENDRA COMME BILLETS DISPONIBLES
        // 200, 100, 50, 20, 10, 5

        distribuerBillet(235);

        ON DEVRAIT OBTENIR LE TEXTE SUIVANT

        1x200, 3x10, 1x5


















