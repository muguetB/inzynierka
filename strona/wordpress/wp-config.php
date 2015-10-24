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
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'u;V-KR,hE+,V9/ d<9~e>~YLaOA:3S{# Yv<LQ7hhv<yd2Htc.%g+%jzU;,[.ZoS');
define('SECURE_AUTH_KEY',  '%M48vkB1:Moc[c)[zCz/bE<K)+!0gX*sYR<_F!<+ga:_g<OfaRoh?5+bA/KQEpM-');
define('LOGGED_IN_KEY',    'mK6z]=-1d2 gY?^J28JfOFQ]2.JGwqXYXbH3>w$ |(Hwb$,Ti/3lC,5t:M<=?|CE');
define('NONCE_KEY',        'i=:Aj(l+<H$I|CbktYU2hHBb-+W umaO]pMrxeK]izYGhBaN2+b|Ez;1r8+:^eFp');
define('AUTH_SALT',        'xz/;(x?.&Qm!u Q~N&3{[q?Q29vO=5/T&_u9@}mU{F/&grJEJM:,+7K ,hR@`AL/');
define('SECURE_AUTH_SALT', 'Swj4r@J;D$-_8q0y(FKibi[Bj8a$;.D=]6^V(c.6@-5-=sH,`On15MBA-.xHt:$L');
define('LOGGED_IN_SALT',   'aDz| %Q*8z[o)W2&FQ+]@gci|&)<Rrc$29Ui>-T+)&2F:*GCSW.CzBj~3z8VA;XI');
define('NONCE_SALT',       '=.DIh{|koTx?9:E{:XQz1#a]S}AYy+5VaR%7nD=]@5G)d-+mIXSu2w>-Az>nqma:');

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
