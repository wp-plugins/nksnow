<?php
/*
Plugin Name: Snow and more
Plugin URI: http://www.nkuttler.de/nksnow/
Author: Nicolas Kuttler
Author URI: http://www.nkuttler.de/
Description: Snow falling down your wordpress blog. See the <a href="http://www.nkuttler.de/nksnow/">live demo</a>.
Version: 0.8.2
*/

// Install hook
register_activation_hook(__FILE__,'nksnow_install');
function nksnow_install() {
	if (!get_option('nksnow_snowflakes')) {
	    update_option('nksnow_snowflakes', '10');
	    update_option('nksnow_timeout', '80');
	    update_option('nksnow_maxstepx', '10');
	    update_option('nksnow_maxstepy', '10');
	    update_option('nksnow_selected', 'flake2.gif,flake3.gif');
	    update_option('nksnow_maxtime', '20');
	    update_option('nksnow_uri', '');
	    update_option('nksnow_precise', '');
	    update_option('nksnow_flakesize', '40');
	    update_option('nksnow_invert', 'No');
	}
}

// Hook for adding admin menus
add_action('admin_menu', 'nksnow_add_pages');
if (get_option('nksnow_uri')) {
	if (
		(
			get_option('nksnow_precise') !== 'on' &&
			strpos($_SERVER['REQUEST_URI'], get_option('nksnow_uri')) > 0
		) ||
		(
			get_option('nksnow_precise') === 'on' &&
			strcmp($_SERVER['REQUEST_URI'], get_option('nksnow_uri')) === 0
		)
	) {
		add_action('wp_head', 'nksnow_head');
		add_action('wp_footer', 'nksnow_footer');
	}
} // default: enable
elseif  (!get_option('nksnow_uri')) {
	add_action('wp_head', 'nksnow_head');
	add_action('wp_footer', 'nksnow_footer');
}
add_action('wp_footer', 'nksnow_homelink');


function nksnow_add_pages() {
	add_options_page('Snow and more', 'Snow and more', 10, 'nksnow', 'nksnow_options_page');
	function nksnow_options_page() { ?>
		<div class="wrap" style="margin: 0 5mm; max-width: 100ex; ">
		<?php
			if ( strlen($_POST['nksnow_snowflakes']) > 0 ) {
				echo '<div id="message" class="updated fade">Form submitted.<br />';
				echo "Settings changed";
				update_option('nksnow_snowflakes', $_POST['nksnow_snowflakes']);
				update_option('nksnow_uri', $_POST['nksnow_uri']);
				update_option('nksnow_precise', $_POST['nksnow_precise']);
				update_option('nksnow_timeout', $_POST['nksnow_timeout']);
				update_option('nksnow_maxstepx', $_POST['nksnow_maxstepx']);
				update_option('nksnow_homelink', $_POST['nksnow_homelink']);
				update_option('nksnow_maxstepy', $_POST['nksnow_maxstepy']);
				update_option('nksnow_maxtime', $_POST['nksnow_maxtime']);
				update_option('nksnow_invert', $_POST['nksnow_invert']);
				if (is_array($_POST['nksnow_selected'])) {
					update_option('nksnow_selected', $_POST['nksnow_selected']);
				}
				else {
    				update_option('nksnow_selected', array('flake2.gif','flake3.gif'));
				}
				update_option('nksnow_flakesize', $_POST['nksnow_flakesize']);
				echo '</div>';
			}
		?>
		<h2>Snow and more</h2>
		<p>
		If you have any problems using this plugin, please read the <a href="http://wordpress.org/extend/plugins/nksnow/faq/">FAQ</a> first.
		</p>
<h3>Contact</h3>
<p>
Feel free to send me feedback, patches, feature requests etc. to <a href="mailto:wp@nicolaskuttler.de">my mail address</a> or to blog about this plugin. Visit my blog at <a href="http://www.nkuttler.de/">nkuttler.de</a> or this plugin's page at <a href="http://www.nkuttler.de/nksnow/">nksnow</a>.
<br />
Please remember to <a href="http://www.wordpress.org/extend/plugins/nksnow/">rate this widget</a>, especially if you like it.
</p>

<h3>My plugins</h3>
<p>
<a href="http://www.nkuttler.de/nktagcloud/">Better tag cloud</a>:
I was pretty unhappy with the default <a href="http://www.nkuttler.de/nktagcloud/">WordPress tag cloud</a> widget. This one is more powerful and offers a list HTML markup that is consistent with most other widgets.
<br/>
<a href="http://www.nkuttler.de/nkthemeswitch/">Theme switch</a>:
I like to tweak my main theme that I use on a varity of blogs. If you have ever done this you know how annoying it can be to break things for visitors of your blog. This plugin allows you to <a href="http://www.nkuttler.de/nkthemeswitch/">use a different theme</a> than the one used for your visitors when you are logged in.
<br/>
<a href="http://www.nkuttler.de/nkmovecomments/">Move WordPress comments</a>:
This plugin adds a small form to every comment on your blog. The form is only added for admins and allows you to <a href="http://www.nkuttler.de/nkmovecomments/">move comments</a> to a different post/page and to fix comment threading.
<br/>
<a href="http://www.nkuttler.de/nksnow/">Snow and more</a>:
This one lets you see <a href="http://www.nkuttler.de/nksnow/">snowflakes or other images fall down your blog</a>.
<br/>
<a href="http://www.nkuttler.de/nkfireworks/">Fireworks</a>:
The name says it all, see <a href="http://www.nkuttler.de/nkfireworks/">fireworks</a> on your blog!
<br/>
<a href="http://www.rhymebox.de/blog/rhymebox-widget/">Rhyming widget</a>:
I wrote a little online <a href="http://www.rhymebox.com/">rhyming dictionary</a>. This is a widget to search it directly from one of your sidebars.
</p>






		<h2>Settings</h2>
		<form action="" method="post">
			Show how many snowflakes (or other objects)?
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
			Which of these flakes, drops, leaves and balloons do you want? 
			<br />
			<?php
				$dirArray = nksnow_dirArray();
				$selected_array = get_option('nksnow_selected');
				// 0.7.3 had some incompatible changes, check
				if (!is_array($selected_array)) {
    				$selected_array = array('flake2.gif', 'flake3.gif');
				}
				echo "<table style=\"border: 1px solid #ddd; margin: 1mm 0; \" ><tr>";
				for ($i = 0 ; $i < count($dirArray); $i++) {
					echo "<td style=\"vertical-align: top; text-align: center; padding: 2px; \">";
					if ( is_integer(array_search($dirArray[$i], $selected_array)) ) {
						echo "<input type=\"checkbox\" name=\"nksnow_selected[]\" value=\"$dirArray[$i]\" checked />";
					}
					else {
						echo "<input type=\"checkbox\" name=\"nksnow_selected[]\" value=\"$dirArray[$i]\" />";
					}
					echo "</td>";
				}
				echo "</tr><tr>";
				for ($i = 0 ; $i < count($dirArray); $i++) {
					echo "<td style=\"vertical-align: center; background: #aaf; text-align: center; padding: 2px; \">";
					echo '<img src="' . get_bloginfo('wpurl') .'/' . PLUGINDIR . "/nksnow/pics/" . $dirArray[$i] . "\" style=\"margin: 5px 2px;\" />";
					echo "</td>";
				}
				echo "</tr>";
				echo "</table>";
			?>
			By the way if you have nice snowflakes, drops, leaves etc. feel free to submit them to me if you made them yourself.
			<br/>
			Use the balloon mode? This will make all images float upwards.
			<select name="nksnow_invert">
			<option <?php
				if (get_option('nksnow_invert') === 'Yes') {
					echo "selected";
				}?>>Yes</option>
			<option <?php
				if (get_option('nksnow_invert') !== 'Yes') {
					echo "selected";
				}?>>No</option>
			</select>
			<br />
			<input type="submit" class="button-primary" value="Save changes" />
			<h3>Custom images</h3>
			<p>If you add your own images to the <tt>pics</tt> directory they will appear in the table above. To have them disappear properly when they are leaving the visible part of the browser window you may have to change the <tt>flakesize</tt> value. 
			<br />
			Make sure the value is bigger than your highest image's height and broadest image's width.
			</p>
			Flakesize?
			<select name="nksnow_flakesize" >
			<?php
				$select = get_option('nksnow_flakesize'); 
				for ($i = 20 ; $i <= 500; $i = $i + 10) {
					if ( $i == $select ) {
						echo "<option selected>$i</option>\n";
					}
					else {
						echo "<option>$i</option>\n";
					}
				}
			?>
			</select>
			<br/>
			<input type="submit" class="button-primary" value="Save changes" />
			<h3>Pro settings</h3>
			Stop snow after how many seconds?
			<input type="text" name="nksnow_maxtime" value="<?php echo get_option('nksnow_maxtime'); ?>" size="3">
			<br />
			Overall speed (timeout in milliseconds between moves)? 
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
			Maximum Wind strength 
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
			Maximum Falling speed
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
			Show snowflakes only if the URI given above and the URI are equal
			($_SERVER['REQUEST_URI'] == URI string)?
		   	<input type="checkbox" name="nksnow_precise" <?php
				if (get_option('nksnow_precise') === 'on') {
					echo "checked";
				}?>>
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
			<input type="submit" class="button-primary" value="Save changes" />
		</form>
		</div>
		<?php
	}
}

// set necessary JS variables and include the script
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
	if (get_option('nksnow_invert') == "Yes") {
		echo "-1";
	}
	else {
		echo "1";
	}
?>;
</script>
<script src="<?php echo get_bloginfo('wpurl') . '/' . PLUGINDIR . '/nksnow/snow.js'; ?>" type="text/javascript"></script>
<!-- /nksnow -->
<?php
}

// Put the images into the HTML code
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

function nksnow_homelink() {
	if ( !(get_option('nksnow_homelink') === 'Yes')) {
		if (get_option('nksnow_invert') === 'Yes') { ?>
			<a href="http://www.nkuttler.de/nksnow/">Wordpress balloons</a> <?php
		} else { ?>
			<a href="http://www.nkuttler.de/nksnow/">Wordpress snowstorm</a> <?php
		} ?>
		powered by
		<a href="http://www.nkuttler.de/nksnow/">nksnow</a>
		<br /> <?php
	}
}

function nksnow_dirArray() {
	$picpath = ABSPATH . '/' . PLUGINDIR . '/nksnow/pics/';
	if ( $picdir = opendir($picpath) ) {
		while($entryName = readdir($picdir)) {

			if ( $entryName == '.' || $entryName == '..' || $entryName == '.svn' ) {
				continue;
			}
			$dirArray[] = $entryName;
		}
	}
	sort($dirArray);
	closedir($picdir);
	return $dirArray;
}
?>
