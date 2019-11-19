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













