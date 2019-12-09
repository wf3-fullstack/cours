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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '_=y%bjdf[6H5E;zBc9~Fh1b7kB4`yy-vofCYNkxy|]f$HdbPFBSAZ@kmH71F%MEk' );
define( 'SECURE_AUTH_KEY',  '9d8u+nd#>%7Uy2uqn(n%#VS_,^7+@5;||J:&z=!}Igkw&_Sj6>gJ^1xp`cB$hs)j' );
define( 'LOGGED_IN_KEY',    '.U3yYQ*q-$zjzep/XXoxnaySF~tcH5lbHp4w[6cH-%=ZSam/K}+Rw WU)T A/JCb' );
define( 'NONCE_KEY',        'uxde|7moeq;i)}>Vfeu:L8g?$)|%x%<$-9GJau#!9(j=sh!1?!8,3I.g)+przwp&' );
define( 'AUTH_SALT',        '?p;:Sq@fD&6(n|2?ed VkB/M3c!AbGB9;Z@WcSS6:cP$QgoS`OWVXbup%zV605W}' );
define( 'SECURE_AUTH_SALT', 'B^Q,lNxP!QV=JV1 wW]j%}9]RLKQtpN?MHH:#qwb3`7oOJ{+o7$tY E9$l}g)6%O' );
define( 'LOGGED_IN_SALT',   'B@&:R4_n-xs|?&6,qy@;a4d*o-<>n!]k=NKBR<izmw5SXxWm#[>R:3fRhw&mB%Mm' );
define( 'NONCE_SALT',       '5KlW>:,ctB(cn07r2j4j2r*<p2Kgcp/P9nL@>=j.@yukj0k`T[%d~.t Obh!7%J7' );
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
