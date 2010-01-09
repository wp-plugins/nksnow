<?php
/*
Plugin Name: Snow, balloons and more
Plugin URI: http://www.nkuttler.de/wordpress/nksnow/
Author: Nicolas Kuttler
Author URI: http://www.nkuttler.de/
Description: Snow falling down your wordpress blog. See the <a href="http://www.nkuttler.de/nksnow/">live demo</a>.
Version: 0.9.2
Text Domain: nksnow
*/

/**
 * Check who we are and load stuff
 */
function nksnow_load() {
	global $nksnow;
	$nksnow = array(
		'path' => WP_PLUGIN_DIR . '/' . str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) ),
		'url' => WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) ),
	);

	// TODO split translations?
	add_action( 'init', 'nksnow_load_translation_file' );

	if ( is_admin() ) {
		require_once( 'inc/admin.php' );
		register_activation_hook( __FILE__, 'nksnow_activate' );
		register_uninstall_hook( __FILE__, 'nksnow_uninstall' );
		add_action( 'admin_menu', 'nksnow_add_pages' );
	}
	require_once( 'inc/page.php' );
}

/**
 * Load Translations
 *
 * @todo maybe split the two sentences for the frontend into a different file?
 */
function nksnow_load_translation_file() {
	global $nksnow;
	$translation_path = basename ( $nksnow['path'] ) . '/translations';
	load_plugin_textdomain( 'nksnow', '', $translation_path );
}

nksnow_load();
