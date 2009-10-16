<?php
/*
Plugin Name: Snow, balloons and more
Plugin URI: http://www.nkuttler.de/wordpress/nksnow/
Author: Nicolas Kuttler
Author URI: http://www.nkuttler.de/
Description: Snow falling down your wordpress blog. See the <a href="http://www.nkuttler.de/nksnow/">live demo</a>.
Version: 0.9.0
*/

function nksnow_load() {
	// TODO split translations?
	add_action( 'init', 'nksnow_load_translation_file' );

	if ( is_admin() ) {
		require_once( 'inc/nkuttler.php' );
		require_once( 'inc/admin.php' );
		register_activation_hook( __FILE__, 'nksnow_activate' );
		register_uninstall_hook( __FILE__, 'nksnow_uninstall' );
		add_action( 'admin_menu', 'nksnow_add_pages' );
	}
	require_once( 'inc/page.php' );
}

/**
 * Load Translations
 */
function nksnow_load_translation_file() {
	$plugin_path = plugin_basename( dirname( __FILE__ ) .'/translations' );
	load_plugin_textdomain( 'nksnow', '', $plugin_path );
}


nksnow_load();
