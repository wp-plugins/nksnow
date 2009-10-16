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
	if ( is_admin() ) {
		require_once( 'inc/admin.php' );
		register_activation_hook( __FILE__, 'nksnow_install' );
		add_action( 'admin_menu', 'nksnow_add_pages' );
	}
	require_once( 'inc/page.php' );
}

nksnow_load();
