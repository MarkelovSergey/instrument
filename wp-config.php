<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'ke');

/** MySQL database password */
define('DB_PASSWORD', 'Ga4680');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'He>7BZ8-a+|rvb1/a`9ow@!5Lu*dSX`dLF(*8o8RU-L|!|+@[qpaf$N/%2-C^37+');
define('SECURE_AUTH_KEY',  '?,ye`0$$=(`t52cQk]~)qPHni@F:a g)*d,pCmKJ;N:]?v_6XdMsQI]whMk-+R;z');
define('LOGGED_IN_KEY',    '*PY3n@=J-dw2L#!N/GVr9diKp8+v5I_WZIKfO|y3|4Vi-pMIJ.|zO^#2AB``xz)D');
define('NONCE_KEY',        'cK-7-{l4^9rgxC JRkMvwr.@s,jFMUpbXZH8*Z;L^a `$=}=Dq?xzmyid+89U[tH');
define('AUTH_SALT',        'G_<O$I^VIpYW.NaiFW8U *g7S*-Hr1mXY+Dk1`V%B@2L (,^fn{NL[6K6m}t=7uv');
define('SECURE_AUTH_SALT', 'jO!<W_^Lp/ES5:jS[0TO6`9$1>f=s$43HHP6|:V1S7Ecew(A|`rE;B$.S|rV&=T$');
define('LOGGED_IN_SALT',   'Vnj!d]ghKY%w*_HpGQXWRdQrj,-(+S?-uqdjf5=NKH;g.A)b|3CHrr,U,i+cSekP');
define('NONCE_SALT',       'T|,//f)^&i706+K-6e?p ]-|HjKf/0#5YSD-tY~/mwQaVevn5tf-]+PyFfpdaBtr');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
