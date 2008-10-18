<?php
/*
Plugin Name: Snow
Plugin URI: http://www.nkuttler.de/nksnow/
Author: Nicolas Kuttler
Author URI: http://www.nkuttler.de/
Description: xsnow-like plugin four your wordpress. Yay!
Version: 0.2.1
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
		<div class="wrap" style="margin: 0 5mm; ">
		<?php
			if ($_POST['nksnow_snowflakes'] || $_POST['nksnow_uri'] || $_POST['nksnow_timeout'] || $_POST['nksnow_maxstepx'] || $_POST['nksnow_maxstepy'] || $_POST['nksnow_snowflake'] ) {
				echo '<div id="message" class="updated fade">Form submitted.<br />';
				if ($_POST['nksnow_snowflakes'] != get_option('nksnow_snowflakes') ) {
					update_option('nksnow_snowflakes', $_POST['nksnow_snowflakes']);
					echo "Snowflakes changed to " . get_option('nksnow_snowflakes');
					echo "<br />";
				}
				if ($_POST['nksnow_uri'] != get_option('nksnow_uri') ) {
					update_option('nksnow_uri', $_POST['nksnow_uri']);
					echo "URI changed to " . get_option('nksnow_uri');
					echo "<br />";
				}
				if ($_POST['nksnow_timeout'] != get_option('nksnow_timeout') ) {
					update_option('nksnow_timeout', $_POST['nksnow_timeout']);
					echo "Timeout changed to " . get_option('nksnow_timeout');
					echo "<br />";
				}
				if ($_POST['nksnow_maxstepx'] != get_option('nksnow_maxstepx') ) {
					update_option('nksnow_maxstepx', $_POST['nksnow_maxstepx']);
					echo "MaxstepXchanged to " . get_option('nksnow_maxstepx');
					echo "<br />";
				}
				if ($_POST['nksnow_maxstepy'] != get_option('nksnow_maxstepy') ) {
					update_option('nksnow_maxstepy', $_POST['nksnow_maxstepy']);
					echo "MaxstepY changed to " . get_option('nksnow_maxstepy');
					echo "<br />";
				}
				if ($_POST['nksnow_snowflake'] != get_option('nksnow_snowflake') ) {
					update_option('nksnow_snowflake', $_POST['nksnow_snowflake']);
					echo "Snowflake changed to " . get_option('nksnow_snowflake');
					echo "<br />";
				}
				echo '</div>';
			}
		?>
		<h2>Snow</h2>
		<p> 
			Feel free to send me feedback, patches, feature requests etc. to <a href="mailto:wp@nicolaskuttler.de">my mail address</a> or to blog about this plugin.        
			Visit my blog at <a href="http://www.nkuttler.de/">nkuttler.de</a>
			or this plugin's page at <a href="http://www.nkuttler.de/nksnow/">nksnow</a>.
			If you like to, visit my <a href="http://www.amazon.de/gp/registry/24F64AHKD51LY">Amazon wishlist</a> and send me a gift.
		</p>
		<h2>Settings</h2>
		<form action="" method="post">
			Show how many snowflakes?
			<select name="nksnow_snowflakes" >
			<?php
				$select = get_option('nksnow_snowflakes'); 
				if ($select === NULL) { $select = 10; }
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
			Which one of the flakes do you want?
			<br />
			<?php
				$select = get_option('nksnow_snowflake'); 
				if ($select === NULL) { $select = 0; }
				for ($i = 0 ; $i <= 6; $i++) {
					if ( $i == $select ) {
						echo "<input type=\"radio\" name=\"nksnow_snowflake\" value=\"$i\" checked />";
					}
					else {
						echo "<input type=\"radio\" name=\"nksnow_snowflake\" value=\"$i\" />";
					}
					echo '<img src="' . get_bloginfo('url') . "/wp-content/plugins/nksnow/flake$i.gif\" style=\"padding: 2mm; background: #99f; \" /><br />";
				}
			?>
			<h2>Pro settings</h2>
			Overall speed (timeout in milliseconds between moves) (default 80)? 
			<select name="nksnow_timeout" >
			<?php
				$select = get_option('nksnow_timeout'); 
				if ($select === NULL) { $select = 80; }
				for ($i = 40 ; $i <= 200; $i = $i + 10) {
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
			Maximum Wind strength (default 10)
			<select name="nksnow_maxstepx" >
			<?php
				$select = get_option('nksnow_maxstepx'); 
				if ($select === NULL) { $select = 10; }
				for ($i = 1 ; $i <= 20; $i++) {
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
			Maximum Falling speed (default 10)
			<select name="nksnow_maxstepy" >
			<?php
				$select = get_option('nksnow_maxstepy'); 
				if ($select === NULL) { $select = 10; }
				for ($i = 1 ; $i <= 20; $i++) {
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
?>;
timeout = <?php
	echo get_option('nksnow_timeout');
	if (!get_option('nksnow_timeout')) {
		echo '80';
	}
?>;
maxstepx = <?php
	echo get_option('nksnow_maxstepx');
	if (!get_option('nksnow_maxstepx')) {
		echo '10';
	}
?>;
maxstepy = <?php
	echo get_option('nksnow_maxstepy');
	if (!get_option('nksnow_maxstepy')) {
		echo '10';
	}
?>;
snowflake = <?php
	echo get_option('nksnow_snowflake');
	if (!get_option('nksnow_snowflake')) {
		echo '0';
	}
?>;
</script>
<script src="<?php bloginfo('url'); echo '/wp-content/plugins/nksnow/snow.js'; ?>" type="text/javascript"></script>
<!-- /nksnow -->
<?php
}

function nksnow_footer() {
	$snowflakes = get_option('nksnow_snowflakes');
	$snowflake = get_option('nksnow_snowflake');
	if ($snowflakes === NULL) { $snowflakes = 10; }
	if (!$snowflake) { $snowflake = 0; }
	for ($i = 0; $i < $snowflakes; $i++) {
		echo "\n<img id=\"$i\" src=\"" . get_bloginfo('url') . '/wp-content/plugins/nksnow/flake' . $snowflake . '.gif' . "\" style=\"position: fixed; top: -100px;\" />";
	}
	//echo "<a href=\"#\" onclick=\"snow();\" >click me! ;-)</a>";
}
?>
