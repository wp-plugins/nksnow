<?php
/*
Plugin Name: Snow
Plugin URI: http://www.nkuttler.de/nksnow/
Author: Nicolas Kuttler
Author URI: http://www.nkuttler.de/
Description: xsnow-like plugin four your wordpress. Yay!
Version: 0.1.5
*/

// Hook for adding admin menus
add_action('admin_menu', 'nksnow_add_pages');
if ( get_option('nksnow_uri') &&
		strpos($_SERVER['REQUEST_URI'], get_option('nksnow_uri')) > 0
	) {
	add_action('wp_head', 'nksnow_head');
	add_action('wp_footer', 'nksnow_footer');
} // default: enable
elseif  (!get_option('nksnow_uri')) {
	add_action('wp_head', 'nksnow_head');
	add_action('wp_footer', 'nksnow_footer');
}


function nksnow_add_pages() {
	add_options_page('Snow', 'Snow', 10, 'nksnow', 'nksnow_options_page');
	function nksnow_options_page() { ?>
		<div class="wrap" style="margin: 2mm;">
		<?php
			if ($_POST['nksnow_snowflakes'] || $_POST['nksnow_uri'] || $_POST['nksnow_timeout'] ) {
				echo '<div id="message" class="updated fade">Form submitted.<br />';
				if ($_POST['nksnow_snowflakes'] != get_option('nksnow_snowflakes') ) {
					update_option('nksnow_snowflakes', $_POST['nksnow_snowflakes']);
					echo "Snowflakes changed to " . get_option('nksnow_snowflakes');
				}
				if ($_POST['nksnow_uri'] != get_option('nksnow_uri') ) {
					update_option('nksnow_uri', $_POST['nksnow_uri']);
					echo "URI changed to " . get_option('nksnow_uri');
				}
				if ($_POST['nksnow_timeout'] != get_option('nksnow_timeout') ) {
					update_option('nksnow_timeout', $_POST['nksnow_timeout']);
					echo "Timeout changed to " . get_option('nksnow_timeout');
				}
				echo '</div>';
			}
		?>
		<h2>Snow</h2>
		<p><small>nksnow</small></p>
		<p>Hello!
		<br />
		Santa loves you!
		</p>

		<form action="" method="post">
			Show how many snowflakes (default 10)?
			<select name="nksnow_snowflakes" >
			<?php
				$select = get_option('nksnow_snowflakes'); 
				echo $select;
				for ($i = 20 ; $i >= 0; $i--) {
					if ( $i == $select ) {
						echo "<option selected>$i</option>\n";
					}
					else {
						echo "<option>$i</option>\n";
					}
				}
			?>
			</select>
			<br />
			Show snowflakes only on pages whose URI contains
			<input type="text" value="<?php echo get_option('nksnow_uri'); ?>" name="nksnow_uri" />
			<br />
			What should be the timeout in milliseconds between updates (default 80)? 
			<select name="nksnow_timeout" >
			<?php
				$timeout = get_option('nksnow_timeout'); 
				echo $timeout;
				for ($i = 40 ; $i <= 200; $i = $i + 10) {
					if ( $i == $timeout ) {
						echo "<option selected>$i</option>\n";
					}
					else {
						echo "<option>$i</option>\n";
					}
				}
			?>
			</select>
			<br />
			<input type="submit" value="Update settings" />
		</form>
		</div>
		<?php
	}
}

function nksnow_head() { ?>
<!-- nksnow -->
<script type="text/javascript">
snowflakes = <?php
	echo get_option('nksnow_snowflakes');
	if (!get_option('nksnow_snowflakes')) {
		echo '10';
	}
timeout = <?php
	echo get_option('nksnow_timeout');
	if (!get_option('nksnow_timeout')) {
		echo '80';
	}
?>;
</script>
<script src="<?php bloginfo('url'); echo '/wp-content/plugins/nksnow/snow.js'; ?>" type="text/javascript"></script>
<!-- /nksnow -->
<?php
}

function nksnow_footer() {
	$snowflakes = get_option('nksnow_snowflakes');
	for ($i = 0; $i < $snowflakes; $i++) {
		echo "\n<img id=\"$i\" src=\"" . get_bloginfo('url') . '/wp-content/plugins/nksnow/flake.gif' . "\" style=\"position: fixed; top: -100px;\" />";
	}
	//echo "<a href=\"#\" onclick=\"snow();\" >click me! ;-)</a>";
}
?>
