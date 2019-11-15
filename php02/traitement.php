<?php
// ATTENTION: ATTAQUES PAR CHEVAL DE TROIE... 

// $nom = $_POST["nom"];
$infosFormulaire = json_encode($_REQUEST);
// AFFICHER AU NAVIGATEUR LA VALEUR DE LA VARIABLE
echo $infosFormulaire;

// EN PHP TOUTES LES VARIABLES COMMENCENT PAR $
// $_REQUEST EST UNE VARIABLE QUE PHP CREE POUR NOUS
// $_REQUEST CONTIENT COMME VALEUR UN TABLEAU ASSOCIATIF
// VISION PRATIQUE: 
// UNE VARIABLE EST UNE BOITE 
// UNE VALEUR EST LE CONTENU STOCKEE DANS LA VARIABLE
// PHYSIQUEMENT: QUAND ON CREE UNE VARIABLE DANS NOTRE CODE
// ON DEMANDE A L'ORDINATEUR DE RESERVER UNE ZONE DANS LA MEMOIRE VIVE (RAM)

// JE VOUDRAIS ENREGISTRER CES INFORMATIONS DANS UN FICHIER
// https://www.php.net/manual/fr/function.file-put-contents.php
// CETTE INSTRUCTION CREE LE FICHIER SI IL N'EXISTE PAS 
// \n AJOUTE UN RETOUR A LA LIGNE (\n => newline)
file_put_contents("php/model/contact.txt", "$infosFormulaire\n", FILE_APPEND);

// ET AUSSI ENVOYER CES INFOS PAR MAIL
// https://www.php.net/manual/fr/function.mail.php
// <b>Warning</b>:  mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() in <b>C:\xampp\htdocs\wf3-fullstack\php02\traitement.php</b> on line <b>25</b><br />
// POUR NE PAS AFFICHER CETTE ERREUR => ON VA AJOUTER @
@mail("webmaster@monsite.fr", "vous avez un nouveau message", $infosFormulaire);


?>