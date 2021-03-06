## COURS DU LUNDI 18/11

## CETTE SEMAINE: PHP COMME LANGAGE DE PROGRAMMATION

    CREE EN 1994 PAR RASMUS LERDORF

    * MOTEUR DE TEMPLATES (CREER DYNAMIQUEMENT DES PAGES HTML)
    * TRAITEMENT DE FORMULAIRES

    PHP PERMET D'AVOIR UN OUTIL POUR COMMUNIQUER ENTRE LE SERVEUR ET LE NAVIGATEUR
    (DANS LES 2 SENS)

    PHP EST UN LANGAGE DE PROGRAMMATION

    HTML, CSS       LANGAGES DECLARATIFS
    JS, PHP         LANGAGES DE PROGRAMMATION

    * LANGAGE DECLARATIF  

    => JE CODE LE RESULTAT QUE JE VEUX OBTENIR
    => ET LE PROGRAMME SE DEBROUILLE POUR LE FAIRE
    exemple: css 
    h1 {
        text-align:center;
    }

    * LANGAGE PROGRAMMATION

    => JE CODE DES INSTRUCTIONS
    => ET LE PROGRAMME SUIT (BETEMENT) CES INSTRUCTIONS
    => ON A PLUS DE CONTROLE SUR LES ETAPES
    => LE DEVELOPPEUR DEVIENT RESPONSABLE DU RESULTAT
    => SI VOUS CODEZ MAL, VOUS OBTENEZ UN PROGRAMME AVEC DES BUGS :-/
    => L'ORDINATEUR N'A AUCUNE IDEE DE CE QUE VOUS VOULEZ OBTENIR

## SITE OFFICIEL DE PHP

    https://www.php.net/

    DOCUMENTATION EN FRANCAIS (TRES BONNE QUALITE)

    https://www.php.net/manual/fr/


    A LIRE PENDANT VOS LONGUES SOIREES D'HIVER

    https://www.php.net/manual/fr/langref.php

    VERSION ACTUELLE DE PHP => PHP7

    POUR VERIFIER SON INSTALLATION DE PHP

    CREER UN FICHIER info.php
    ET VOS UTILISEZ LA FONCTION

    phpinfo()

    https://www.php.net/manual/fr/function.phpinfo.php


    ATTENTION: 
    QUAND VOUS PRENEZ UN HERBEGEMENT VERIFIER BIEN QUE VOUS POUVEZ AVOIR PHP7.3+

    SEMVER  => SEMANTIC VERSIONING

    VERSION MAJEURE
    VERSION MINEURE
    VERSION DEBUG

    par exemple: ma version de PHP est 7.2.12

    VERSION MAJEURE     7       
        => ATTENTION: IL FAUT ADAPTER SON CODE (TEMPS DE DEV ET COUT POUR LE CLIENT)
    VERSION MINEURE     2
        => NOUVELLES FONCTIONNALITES
    VERSION DEBUG       12
        => MIEUX QU'AVANT

    PHP4    => VERSION QUI A RENDU PHP POPULAIRE
    PHP5    => VERSION MATURE CONSOLIDEE (AVEC LA PROGRAMMATION ORIENTEE OBJET)
    PHP6    => EXISTE PAS => ILS SE SONT FOIRES
    PHP7    => GRANDE MISE A JOUR => COTE PERFORMANCE GRAND BOOST

    https://kinsta.com/fr/blog/comparaison-php/

    (CONCURRENCE AVEC FACEBOOK ET LEUR MOTEUR PHP HHVM...)

## BASES DE PROGRAMMATION

    ON VA COMMENCER PAR LA PROGRAMMATION FONCTIONNELLE
    ET ENSUITE ON IRA VERS LA PROGRAMMATION ORIENTEE OBJET


### VARIABLES ET VALEURS

    EN PHP, LE NOM D'UNE VARIABLE COMMENCE PAR $
    ET ON UTILISE camelCase POUR LES NOMS EN PHP

    camelCase
    snake_case
    kebab-case (soustraction pour PHP...)

    UNE VARIABLE EST UNE BOITE QUI SERT A STOCKER UNE VALEUR
    UNE VALEUR EST UNE INFORMATION
    UNE VARIABLE SERT A STOCKER UNE INFORMATION POUR LA MANIPULER PLUS TARD

    PHYSIQUEMENT: UNE VARIABLE EST UNE PARTIE DE LA MEMOIRE VIVE (RAM)

### VALEURS TEXTE

    https://www.php.net/manual/fr/language.types.string.php

    ON VA BEAUCOUP UTILISER PHP POUR CREER DU TEXTE HTML

    $texte  = "le texte que je veux garder en mémoire";
    $texte2 = 'un autre texte à garder'; 

    (IL Y A PLEIN D'AUTRES CHOSES PLUS MARRANTES ET PLUS COMPLIQUEES...)

    =   OPERATEUR D'AFFECTATION
    // ON RANGE UNE VALEUR DANS UNE VARIABLE AVEC =
    $variable = "valeur";


### VALEURS NOMBRES

    $nombre     = 123;
    $decimal    = 123.45;

    IL Y A DES CONVERSIONS AUTOMATIQUES ENTRE TEXTES ET NOMBRES
    LA PLUPART DU TEMPS, CA SE PASSE COMME ON VEUT
    ATTENTION: IL Y A CERTAINS SITUATIONS OU CE N'EST PAS LE RESULTAT ATTENDU...


### OPERATEUR DE CONCATENATION

    ASSEMBLER PLUSIEURS TEXTES ENSEMBLE
    => OPERATEUR EN PHP     .

```php
<?php

    $phrase = "bonjour, " . "mon nom est jean";    // resultat "bonjour, mon nom est jean"
    $phrase2 = "bonjour, " . 123;                   // resultat "bonjour 123"

    $nom    = "jean";
    $age    = 28;
    $phrase3 = $nom . " a " . $age . " ans";        // resultat "jean a 28 ans"

    // EN PHP, COMME ON PASSE SA VIE A CONCATENER
    // IL Y A PLUS SIMPLE => COOOL
    $phrase4 = "$nom a $age ans";

    // ATTENTION, CA NE MARCHE PAS AVEC LES GUILLEMETS SIMPLES
    $phrase5 = '$nom a $age ans';       // resultat '$nom a $age ans'

    // ECRITURE EN HEREDOC
    $titre      = "le titre de ma page";
    $contenu    = "le contenu de ma page";

    // ATTENTION: PAS D'ESPACE A LA FIN DES LIGNES AVEC HEREDOC
    $codeHtml =
    <<<MABALISE
        <article class="monArticle">
            <h2>l'olive: $titre</h2>
            <p>$contenu</p>
        </article>
    MABALISE;
```



### OPERATEURS SUR LES NOMBRES


    +   ADDITION
    -   SOUSTRACTION
    *   MULTIPLICATION
    /   DIVISION
    %   MODULO          (RESTE DE LA DIVISION)

```php
<?php
    $hauteur    = 2;
    $largeur    = 3;
    $longueur   = 4;

    $surface4murs = 2 * (($hauteur * $largeur) + ($hauteur * $longueur));
    $surfaceSol   = $longueur * $largeur;

    $prixHT = 100;
    $tva    = 20;

    $prixTTC = $prixHT + $prixHT * $tva / 100;      // résultat = 120
    $prixTTC = $prixHT * ( 1 + $tva / 100);
```

## VALEURS: BOOLEENS

    VRAI OU FAUX

    true        TRUE
    false       FALSE

## OPERATEURS DE COMPARAISON SUR LES TEXTES ET LES NOMBRES


    ==      EGALITE
    ===     EGALITE DE VALEURS ET EGALITE DE TYPE
    !=      DIFFERENCE
    >       SUPERIEUR STRICT
    <       INFERIEUR STRICT
    >=      SUPERIEUR OU EGAL
    <=      INFERIEUR OU EGAL
    !       NEGATION

## OPERATEUR TERNAIRE

    ECRITURE COMPACTE SUR UN TEST ENTRE 2 VALEURS

    $texte = $test ? "valeur si test est vrai" : "valeur si test est faux";


## PHP7 => OPERATEUR COALESCENT ??

    SI LA VARIABLE N'A PAS DE VALEUR ALORS ON DONNE UNE VALEUR PAR DEFAUT


        <h1>MON SITE VITRINE <?php echo $titre1 ?? "valeur par défaut"; ?></h1>

## STRUCTURES DE CONTROLE: CONDITIONS


```php
<?php
    // TRES IMPORTANT DANS LA PROGRAMMATION
    // DONNE LE CHOIX ENTRE 2 POSSIBILITES
    // => REND LES PROGRAMMES INTELLIGENTS

    if ($test)
    {
        // CODE EXECUTE SI $test EST VRAI
    }
    else
    {
        // CODE EXECUTE SI $test EST FAUX
        echo "texte1";
        echo "texte2";
    }
```

    IMPORTANT A COMPRENDRE: UN SEUL BLOC D'INSTRUCTION EST EXECUTE A CHAQUE FOIS

    LE BLOC else EST OPTIONNEL

### VALEURS: TABLEAUX

```php
<?php
    // AVEC LES CROCHETS
    $tableau = [ "un", "deux" ];

    // ON PEUT COMBINER LES TABLEAUX
    // COMME UN TABLEAU EST UNE VALEUR
    // ON PEUT CREER DES TABLEAUX DE TABLEAUX...
    // => MATRICES

    // INDICES DE TABLEAUX
    // => SERT A RETROUVER UNE VALEUR DANS LE TABLEAU
    $premiereValeur = $tableau[0];      // ATTENTION: LE PREMIER INDICE EST 0
                                        // $premiereValeur = "un";

    $fichePersonnage = [ "jean", 28 ];
    $nom = $fichePersonnage[0];
    $age = $fichePersonnage[1];


    // SI JE VEUX CHANGER LA VALEUR D'UN ELEMENT DANS LE TABLEAU
    // Par exemple, si je veux changer l'age
    $fichePersonnage[1] = 30;

    // SI JE VEUX RAJOUTER UN NOUVEL ELEMENT
    // PAR EXEMPLE, je veux rajouter son métier en 3e valeur
    $fichePersonnage[] = "forgeron";        // INDICE 2

    // PHP PROPOSE PLEIN DE FONCTIONS POUR MANIPULER LES TABLEAUX
    // https://www.php.net/manual/fr/function.array-push.php
    // etc...

    // ATTENTION: DIFFERENT ENTRE JS ET PHP
    // POUR COMPTER LE NOMBRE D'ELEMENTS DANS UN TABLEAU
    // ON VA UTILISER LA FONCTION count
    // https://www.php.net/manual/fr/function.count.php
    $nbElement = count($tableau);

```

### BOUCLES for ET while

    LES BOUCLES EXPLOITENT LA RAPIDITE DES PROCESSEURS (3+ Ghz...)

    BIEN COMPRENDRE: UNE BOUCLE PEUT ETRE UTILISEE SANS TABLEAU

    UNE BOUCLE SERT A REPETER PLUSIEURS FOIS UN BLOC D'INSTRUCTIONS

    IL Y A PLUSIEURS MANIERES D'ECRIRE DES BOUCLES

```php
<?php

    for ($compteur=0; $compteur<10; $compteur++)  // 3 INSTRUCTIONS IMPORTANTES
    {
        echo "<h2>$compteur</h2>";
        // instruction1
        // instruction2

        // PHP EXECUTE L'INCREMENTATION AVANT DE REFAIRE LE TEST
    }
    // PHP REFAIT LE TEST POUR SAVOIR SI IL DOIT CONTINUER


    $compteur=0;
    while ($compteur<10)
    {
        echo "<h2>$compteur</h2>";
        // instruction1
        // instruction2

        $compteur++;        // ATTENTION: SI ON OUBLIE ON PART EN BOUCLE INFINIE
    }
```

## BOUCLES AVEC TABLEAUX

    DANS LES BOUCLES, ON A UN COMPTEUR QUI EST UN NOMBRE
    (GENERALEMENT UN NOMBRE QUI VA DE 0 A 100...)

    DANS LES TABLEAUX, ON A UN INDICE QUI EST UN NOMBRE
    (GENERALEMENT UN NOMBRE QUI VA DE 0 A 100...)

    => ET SI ON COMBINAIT LES BOUCLES ET LES TABLEAUX ???

```php
<?php
    $tableau = [ "a", "b", "c", "d" ];

    for ($indice=0; $indice < count($tableau); $indice++)
    {
        // JE PEUX UTILISER $indice POUR ACCEDER AUX ELEMENTS DU TABLEAU
        $element = $tableau[$indice];
        // JE PEUX UTILISER $element POUR AFFICHER QUELQUE CHOSE
        echo "<h2>$element</h2>";

    }
```

    GENERALEMENT, SI VOUS DETECTEZ DANS VOTRE CODE 
    DES LIGNES QUI SE REPETENT
    MAIS QUI CHANGENT UN PEU AUSSI

    => GENERALEMENT: 
    ON PEUT METTRE CE QUI CHANGE DANS UN TABLEAU
    ET CE QUI NE CHANGE PAS DANS UNE BOUCLE


### BOUCLE foreach

    EN PHP: SI ON VEUT PARCOURIR UN TABLEAU DU PREMIER ELEMENT AU DERNIER
    => ON A UNE 3E FORME SIMPLIFIEE foreach

```php
<?php
    $tableau = [ "a", "b", "c", "d" ];

    foreach($tableau as $indice => $element)
    {
        echo "<h2>($indice) $element</h2>";
    }


    // SI ON NE FAIT RIEN AVEC L'INDICE
    foreach($tableau as $element)
    {
        echo "<h2>$element</h2>";
    }
?>
```

## EXERCICE POUR CET APRES-MIDI

    AJOUTER DU CODE PHP SUR LE SITE VITRINE

    * AJOUTER UNE CLASSE DIFFERENTE A CHAQUE BALISE body DE CHAQUE PAGE

    exemple: 
    LA PAGE index.php AURA body class="index"
    LA PAGE services.php AURA body class="services"
    LA PAGE contact.php AURA body class="contact"

    * SUR LA PAGE services, AJOUTER UNE GALERIE DE PHOTOS

    AJOUTER UN TABLEAU PHP ET UNE BOUCLE POUR AFFICHER CES PHOTOS

    * BONUS: AJOUTER UNE CLASSE DIFFERENTE UNE IMAGE SUR DEUX (orange ET blue)

    * BONUS DU BONUS: BATTLEDEV (PREMIERS EXOS...)

        https://www.isograd.com/FR/solutionconcours.php


















































































































