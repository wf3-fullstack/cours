<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress2' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'u]AbIfLEBC9x^aiR?lq0&7L,r&:I][:X13@R]sUp|U%><FIn=2A,~,[Z8hhl.2y%' );
define( 'SECURE_AUTH_KEY',  'V<qW5@k4 kT$U;m T7U^rRiQEDw1Qkr8A]D4)}U9qPNx_IKm^A?3g:ih)s(%O2*F' );
define( 'LOGGED_IN_KEY',    '6F,}UuE7Sl>EfuqD&jaii: y8Ys=}r[>GxtP.n wDU<8A5k$C<6[2Yd)l.+?HE#W' );
define( 'NONCE_KEY',        '2Py}![v5NRH0]eWQxdD}Mc,~Jgro>0@jCL/kR`enSL77#~@AyN>*O#1iP&$1Us8h' );
define( 'AUTH_SALT',        '5 If8Wgn4 7g2:q`$6VC+/nm9V8ap`s{KmuP/+xOK#xCtixY7[BW!dz^++{F![d&' );
define( 'SECURE_AUTH_SALT', 'H9}2J%>RO? PO$Q/L2UW&Wow8(,qg#Uc^m@j4YNKR[j#<, )Q|^l`!bw]l[db}Fc' );
define( 'LOGGED_IN_SALT',   '.{P>UP ReNZWiy*`&`pp?7[Bg#K=_2DFKA$#IV#;+%X0JB|?pMU)#99}OT6f[MUP' );
define( 'NONCE_SALT',       'I^C9BYuw%yL8/1Gr{lG=&%/:)JsSo05LAQo]s(xOwj 89ea<7$4l=k`LE{#6e,6k' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
