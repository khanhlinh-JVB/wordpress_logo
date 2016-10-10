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
define('AUTH_KEY',         'l8qmCB5uv)HIdd4|wt+sVSM^)<1WV8QT3l!U_#OQ8gHS<n`&I,??XI&duQMY#fsX');
define('SECURE_AUTH_KEY',  '.%T?I4oP>638DGeYnG/]+$(z M6/y%r.IOo5ZR/HfnR1[<[gw;?56~N])<Jyoz=y');
define('LOGGED_IN_KEY',    '_3>SQ5XqPF;@j`Y^&Z9]HT[E!%{iAA[ebNF0]E.X 4mv7/IcoJs3A?%YkyNAC4nQ');
define('NONCE_KEY',        'm 2wg9M_!oxp,HeeT;G^! e.*G`Am,Ph.]_D;7=3YoIAWAL@[HEZWUtGK:ZgHr)U');
define('AUTH_SALT',        'z2lBI!nU:aq8//koe[Zsu.&{}&AU#>bjrW|)L]IjEBgzaMb,,)z/X[}?.5u^364#');
define('SECURE_AUTH_SALT', 'QhbUg%i+sG;& 5fpsWLh;z%#o&KG<=lQ/.ko!d~AiOIRUfvnP/~$^}wVy7_*!h.C');
define('LOGGED_IN_SALT',   '0%DMB3%@ZVa&$e%A=NBzcFepu6,V+(L1QA|Fn$~c#?;A+XPoM$,|>1/QjFZ1;*:?');
define('NONCE_SALT',       'Kg~@LZ$wjkf[hN FjAe;@55q4Sz1Ap4LS[VP:l7^:7{A$uKpb[=~fp34BRNJIFSc');

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
