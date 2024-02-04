<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'bricotips' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

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
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qgzvFvm2Z>?]TAQ/ZlQ7ygPVq4KTy|tCx~GOoN>7WH9;eA~ 960W}o[Mb]F4G0&{' );
define( 'SECURE_AUTH_KEY',  '9Xpz;jCG&iUl(*S^8%k%jnnY3H+YFbsisll2>D-TNa `2|Go14MNrk)-3)8Zj*sf' );
define( 'LOGGED_IN_KEY',    'c`ZikcDeJrqa6c+KLKXw`NWy)cJp7Tv8[de<)}-9%_KJ5sc$FnSVk+m#e7p.J/q)' );
define( 'NONCE_KEY',        'cohoUYB={lki&*t.kM/anehypdHdXX8: NY:PrS#]H!M2Q;0=YTbZ!NN`hkJ)5D<' );
define( 'AUTH_SALT',        'BG4I<q|Wf_]#l6_?OFjV+F>|}_as(iR;-=UDO^SM;i!vXVOj;&PDGQ%MAyW+Ozko' );
define( 'SECURE_AUTH_SALT', 'E!&u3PONfo5,X tX=PEi}(-dC,bHQzSwP>- 4a~8T.}[;9ja<$>xbWDlyQ!mDmJi' );
define( 'LOGGED_IN_SALT',   'TnAbD-)uD%yWG%37RU#G9,{:BwA/|Go[HnYwZ}fR@9~2NmY<ar5Wb1l{r4NZRGu<' );
define( 'NONCE_SALT',       '0mf-_FeH]-qHF)f#/VhNM;&V#tfQfZC*8UL`9`b,{Kntv|yZ}]*s>l#=K1O ~P]!' );
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
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
