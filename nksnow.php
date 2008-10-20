<?php
/*
Plugin Name: Snow and more
Plugin URI: http://www.nkuttler.de/nksnow/
Author: Nicolas Kuttler
Author URI: http://www.nkuttler.de/
Description: Snow falling down your wordpress blog. See the <a href="http://www.nkuttler.de/nksnow/">live demo</a>.
Version: 0.2.2
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
	add_options_page('Snow and more', 'Snow and more', 10, 'nksnow', 'nksnow_options_page');
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
					echo "MaxstepX changed to " . get_option('nksnow_maxstepx');
					echo "<br />";
				}
				if ($_POST['nksnow_maxstepy'] != get_option('nksnow_maxstepy') ) {
					update_option('nksnow_maxstepy', $_POST['nksnow_maxstepy']);
					echo "MaxstepY changed to " . get_option('nksnow_maxstepy');
					echo "<br />";
				}
				if (implode(',', $_POST['nksnow_snowflake']) != get_option('nksnow_snowflake') ) {
					update_option('nksnow_snowflake', implode(',', $_POST['nksnow_snowflake']));
					echo "Falling object changed to " . get_option('nksnow_snowflake');
					echo "<br />";
				}
				echo '</div>';
			}
		?>
		<h2>Snow and more</h2>
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
				$str_array = split(',', get_option('nksnow_snowflake'));
				if (get_option('nksnow_snowflake')) {
					$select_array = array();
					foreach ( $str_array as $value ) {
						array_push( $select_array, intval($value) );
					}
				}
				else {
					$select_array = array(2);
				}
				echo "<table><tr>";
				for ($i = 0 ; $i <= 10; $i++) {
					echo "<td style=\"border: 1px solid #ccc; vertical-align: top; \">";
					if ( is_integer(array_search($i, $select_array)) ) {
						echo "<input type=\"checkbox\" name=\"nksnow_snowflake[]\" value=\"$i\" checked />";
					}
					else {
						echo "<input type=\"checkbox\" name=\"nksnow_snowflake[]\" value=\"$i\" />";
					}
					//var_dump($i);
					//echo '<br />';
					//echo "var_dump(array_search($i, $select_array))==";
					//var_dump(array_search($i, $select_array));
					echo '<br />';
					echo '<img src="' . get_bloginfo('url') . "/wp-content/plugins/nksnow/flake$i.gif\" style=\"padding: 2mm; background: #99f; \" />";
					echo "</td>";
				}
				echo "</tr></table>";
			?>
			By the way if you have nice snowflakes, raindrops, leaves etc. feel free to submit them to me if they are properly licensed.
			<h2>Pro settings</h2>
			Overall speed (timeout in milliseconds between moves) (default 80)? 
			<select name="nksnow_timeout" >
			<?php
				$select = get_option('nksnow_timeout'); 
				if ($select === NULL) { $select = 80; }
				for ($i = 40 ; $i <= 500; $i = $i + 40) {
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
				for ($i = 3 ; $i <= 20; $i++) {
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
		echo '2';
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
	$str_array = split(',', get_option('nksnow_snowflake'));
	if (get_option('nksnow_snowflake')) {
		$select_array = array();
		foreach ( $str_array as $value ) {
			array_push( $select_array, intval($value) );
		}
	}
	else {
		$select_array = array(2);
	}
	$arraymax = count($select_array) - 1;
	for ($i = 0; $i < $snowflakes; $i++) {
		echo "\n<img id=\"$i\" src=\"" . get_bloginfo('url') . '/wp-content/plugins/nksnow/flake' . $select_array[rand(0, $arraymax)] . '.gif' . "\" style=\"position: fixed; top: -100px; border: 0;\" class=\"nksnow\" />";
	}
	//echo "<a href=\"#\" onclick=\"snow();\" >click me! ;-)</a>";
}
?>
