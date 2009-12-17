<?php

/**
 * The main frontend function. Always run.
 *
 * @since 0.9.0
 *
 * For 0.9.0 I changed it so that the home link is only shown when the plugin
 * is active and not disabled. Well, at least there's a gazillion of blogs that
 * still use one of the obsolete versions :)
 */
function nksnow() {
	if ( get_option('nksnow_uri') ) {
		if (
			(
				get_option( 'nksnow_precise' ) !== 'on' &&
				strpos( $_SERVER['REQUEST_URI'], get_option( 'nksnow_uri' ) ) > 0
			) ||
			(
				get_option('nksnow_precise') === 'on' &&
				strcmp( $_SERVER['REQUEST_URI'], get_option( 'nksnow_uri' ) ) === 0
			)
		) {
			add_action( 'wp_head', 'nksnow_head' );
			add_action( 'wp_footer', 'nksnow_footer' );

			add_action( 'wp_footer', 'nksnow_homelink' );
		}
	} // default: enable
	elseif  ( !get_option( 'nksnow_uri' ) ) {
		add_action( 'wp_head', 'nksnow_head' );
		add_action( 'wp_footer', 'nksnow_footer' );

		add_action( 'wp_footer', 'nksnow_homelink' );
	}
}
nksnow();

/**
 * Add the necessary JS variables and include the wonderful snow script
 */
function nksnow_head() { ?>
<!-- nksnow -->
<script type="text/javascript">
nks = new Object;
nks.snowflakes = <?php
	echo get_option('nksnow_snowflakes');
?>;
nks.timeout = <?php
	echo get_option('nksnow_timeout');
?>;
nks.maxstepx = <?php
	echo get_option('nksnow_maxstepx');
?>;
nks.maxstepy = <?php
	echo get_option('nksnow_maxstepy');
?>;
nks.flakesize = <?php
	echo get_option('nksnow_flakesize');
?>;
nks.maxtime = <?php
	echo get_option('nksnow_maxtime') * 1000;
?>;
nks.invert = <?php
	if ( get_option('nksnow_invert') == 'Yes' ) {
		echo '-1';
	}
	else {
		echo '1';
	}
?>;
</script>
<script src="<?php echo get_bloginfo( 'wpurl' ) . '/' . PLUGINDIR . '/nksnow/snow.js'; ?>" type="text/javascript"></script>
<!-- /nksnow -->
<?php
}

/**
 * Put the images into the HTML code
 */
function nksnow_footer() {
	$snowflakes = get_option('nksnow_snowflakes');
	$selected_array = get_option('nksnow_selected');
	$dirArray = nksnow_dirArray();
	$arraymax = count($selected_array) - 1;

	// 0.7.3 had some incompatible changes, check
	if (!is_array($selected_array)) {
    	$selected_array = array('flake2.gif', 'flake3.gif');
	}

	// Check if selected images really exists, revert to defaults if not
	// Smoothen 0.5.4 -> 0.6.0 transition
	foreach($selected_array as $selected) {
		if (!file_exists( ABSPATH . '/' . PLUGINDIR . '/nksnow/pics/' . $selected )) {
    		$selected_array = array('flake2.gif', 'flake3.gif');
		}
	}

	for ($i = 0; $i < $snowflakes; $i++) {
		echo "\n<img id=\"nksnow$i\" src=\"" . get_bloginfo('wpurl') . '/' . PLUGINDIR . '/nksnow/pics/' . $selected_array[rand(0, $arraymax)] . "\" style=\"position: fixed; top: -100px; border: 0; z-index:1000;\" class=\"nksnow\" alt=\"snowflake\" />";
	}
}

/**
 * Insert a highly search engine optimized link to the plugin's page.
 * Who wouldn't want to rank for those keywords?
 */
function nksnow_homelink() {
	if ( !( get_option('nksnow_homelink' ) === 'Yes' ) ) {
		if ( get_option( 'nksnow_invert' ) === 'Yes' ) {
			printf( __( "<a href=\"%s\">Wordpress balloons</a> powered by <a href=\"%s\">nksnow</a>", 'nksnow' ), 'http://www.nkuttler.de/wordpress/nksnow/', 'http://www.nkuttler.de/wordpress/nksnow/' );
		} else {
			printf( __( "<a href=\"%s\">Wordpress snowstorm</a> powered by <a href=\"%s\">nksnow</a>", 'nksnow' ), 'http://www.nkuttler.de/wordpress/nksnow/', 'http://www.nkuttler.de/wordpress/nksnow/' );
		} ?>
		<br /> <?php
	}
}

/**
 * Messy function that returns all files in a hardcoded directory
 *
 * @param string $pattern pattern the filename has to match
 *
 * @return array list of files
 *
 * @todo fix this mess... somewhen
 */
function nksnow_dirArray( $pattern = null ) {
	$picpath = ABSPATH . '/' . PLUGINDIR . '/nksnow/pics/';
	if ( $picdir = opendir( $picpath ) ) {
		while( $entryName = readdir( $picdir ) ) {

			if( $entryName == '.' || $entryName == '..' || $entryName == '.svn' )
				continue;
			elseif ( isset( $pattern ) )
				if( !preg_match( "$pattern", $entryName ) )
					continue;

			$dirArray[] = $entryName;
		}
	}
	closedir( $picdir );

	if( isset( $dirArray ) ) {
		sort( $dirArray );
		return $dirArray;
	}
}

?>
