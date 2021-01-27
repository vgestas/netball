<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
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

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'rN<XZZ#U]I,X@WOf{?)wai ~1_cKvI9^_g&qmrsFVsdot^ih!GQ7KYDwxghZ#oUc' );
define( 'SECURE_AUTH_KEY',  '`6Yf:y&V!:>M:o2V=44Tu2|8Vygyc[,c~&8L9;;i-`7lhoHm>X_ou`kamCv8ev3{' );
define( 'LOGGED_IN_KEY',    'h&-|f,eFoB6x)zIvyW88)/KgS_jC}{1l]vEZ}&r~:g/L+4Rt1@fp=-qlh(-!CcyG' );
define( 'NONCE_KEY',        ')0!x#Du&`rdHm|<(>y(=8b*Y{Ii~g1m8wD<36I|0.Cs9eZ[q4%m:*=WbLET$^:%/' );
define( 'AUTH_SALT',        '&,@OLsLUrfG),9fJHbH}E^Ep*Kws,~3#=Ph(_=-p.fya/[+XCHfKh`Aw^.Oi[Y A' );
define( 'SECURE_AUTH_SALT', 'DpTx(A{UD!7&(J<#pH&<5`U~&w:E:}qsnp(=30YO7|D]aUhI4m[pJ`~zkN/t<# }' );
define( 'LOGGED_IN_SALT',   'XJTd]@o7;AYQovU@yW|<;.EXYB/`_oy*_R)0,DcAHur)uOi%SR+;_;<%w:cx6T+<' );
define( 'NONCE_SALT',       '[]:NcOe~b`~T&/=UFNle{RX[j|#PIp%MJZ9;?qec=@%X[:buu:!N`f(OwB,N8%H8' );
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
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

@ini_set( 'upload_max_filesize' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'memory_limit', '256M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );
