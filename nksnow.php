<?php
/*
Plugin Name: Snow and more
Plugin URI: http://www.nkuttler.de/nksnow/
Author: Nicolas Kuttler
Author URI: http://www.nkuttler.de/
Description: Snow falling down your wordpress blog. See the <a href="http://www.nkuttler.de/nksnow/">live demo</a>.
Version: 0.4.0
*/

$version = 0.4.0;

// Install hook
register_activation_hook(__FILE__,'nksnow_install');
function nksnow_install() {
echo "plugin activated";
    update_option('nksnow_snowflakes', '10');
    update_option('nksnow_timeout', '80');
    update_option('nksnow_maxstepx', '10');
    update_option('nksnow_maxstepy', '10');
    update_option('nksnow_snowflake', '2,3');
    update_option('nksnow_uri', '');
}


// Hook for adding admin menus
add_action('admin_menu', 'nksnow_add_pages');
if ( get_option('nksnow_uri') &&
		strpos($_SERVER['REQUEST_URI'], get_option('nksnow_uri')) > 0
	) {
	add_action('wp_head', 'nksnow_head');
} // default: enable
elseif  (!get_option('nksnow_uri')) {
	add_action('wp_head', 'nksnow_head');
}
add_action('wp_footer', 'nksnow_footer');
add_action('wp_footer', 'nksnow_homelink');


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
				if ($_POST['nksnow_homelink'] != get_option('nksnow_homelink') ) {
					update_option('nksnow_homelink', $_POST['nksnow_homelink']);
					echo "Hide &quot;powered by&quot; changed to " . get_option('nksnow_homelink');
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
			Feel free to send me feedback, patches, feature requests etc. or to blog about this plugin.        
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
			Which of these flakes, drops and leaves do you want? 
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
					echo '<br />';
					echo '<img src="' . get_bloginfo('url') . "/wp-content/plugins/nksnow/flake$i.gif\" style=\"padding: 2mm; background: #99f; \" />";
					echo "</td>";
				}
				echo "</tr></table>";
			?>
			By the way if you have nice snowflakes, drops, leaves etc. feel free to submit them to me if they are properly licensed.
			<h2>Pro settings</h2>
			Overall speed (timeout in milliseconds between moves) (default 80)? 
			<select name="nksnow_timeout" >
			<?php
				$select = get_option('nksnow_timeout'); 
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
			Hide the &quot;Powered by&quot; message in the footer?
			<select name="nksnow_homelink">
			<option <?php
				if (get_option('nksnow_homelink') === 'Yes') {
					echo "selected";
				}?>>Yes</option>
			<option <?php
				if (get_option('nksnow_homelink') !== 'Yes') {
					echo "selected";
				}?>>No</option>
			</select>
			<br />
			<input type="submit" value="Update settings" />
		</form>
		</div>
		<?php
	}
}

function nksnow_head() { ?>
<!-- nksnow <?php echo $version ?>-->
<script type="text/javascript">
snowflakes = <?php
	echo get_option('nksnow_snowflakes');
?>;
timeout = <?php
	echo get_option('nksnow_timeout');
?>;
maxstepx = <?php
	echo get_option('nksnow_maxstepx');
?>;
maxstepy = <?php
	echo get_option('nksnow_maxstepy');
?>;
</script>
<script src="<?php bloginfo('url'); echo '/wp-content/plugins/nksnow/snow.js'; ?>" type="text/javascript"></script>
<!-- /nksnow -->
<?php
}

function nksnow_footer() {
	$snowflakes = get_option('nksnow_snowflakes');
	$snowflake = get_option('nksnow_snowflake');
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
}

function nksnow_homelink() {
	if (
			!(get_option('nksnow_homelink') === 'Yes')
	) { ?>
		Snowstorm powered by
		<a href="http://www.nkuttler.de/nksnow/">nksnow</a>
		<br />
<?php
	}
}
?>
