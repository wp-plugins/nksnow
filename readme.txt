=== Snow, balloons and more ===
Contributors: nkuttler
Author URI: http://kuttler.eu/blog/
Plugin URI: http://kuttler.eu/wordpress-plugin/snow-balloons-and-more/
Donate link: http://nkuttler.eu/donations/
Tags: admin, plugin, christmas, snow, toy, toys, fun, funny, santa, balloons, balloon, balloons, birthday, celebrate
Requires at least: 2.1
Tested up to: 3.5
Stable tag: 0.10.0.5

Snowflakes (and more) falling down your blog! Inspired by the unforgettable
xsnow. Since 0.8.0 images can float upwards too.

== Description ==

Snowflakes (and more) falling down your blog! There are snowflakes, leaves,
drops - and balloons that can float upwards. You can simply add more images
in the pics folder and they will appear on the settings page. I also happily
accept images submitted to me as long as they are properly licensed.

You can configure the number of snowflakes and limit the plugin to specific
posts or pages.  If you enter something into the URI field you will only see
snow if the URI of your page matches the string.  No fancy regexps.

== Installation ==

 * Unzip nksnow.zip
 * Upload nksnow to your `/wp-content/plugins/` directory
 * Activate the plugin through the 'Plugins' menu in WordPress
 * Configure as you like. See Settings -> Snow and more
 * Enjoy! Please read the [FAQ](http://wordpress.org/extend/plugins/nksnow/faq/) if there's no snow.

== Screenshots ==
1. It's snowing! Watch the [live demo](http://www.nkuttler.de/nksnow/) at my blog.
2. Settings page.

== Frequently Asked Questions ==
Q: How do I make the effect only active on the start page?<br />
A: Set the URI filter to / and check the precise match box. This assumes that WordPress is installed in the webserver's root directory.<br />

Q: I see no snow.<br />
A: Please make sure that your template uses the wp_footer() and wp_head() template tags. They should be in your header.php and footer.php, see the [theme development page](http://codex.wordpress.org/Theme_Development).

Q: I still see no snow.<br />
A: Please send me a link to your blog. It's quite possible that some doctype combinations or browsers will not work. If somebody complains I might try to fix it.<br />

Q: The snowflakes look odd, there's a border around them, they have a background etc.<br />
A: Add <tt>img.nksnow { border: 0 }</tt> at the end of your style.css (or change the CSS property you need to change).

Q: Why don't you have nicer snowflakes?<br />
A: Sorry, I'm not a designer. Feel free to send me more properly licensed snowflakes that I can include.<br />

== Changelog ==
= 0.10.0.5 ( 2013-01-05 ) =
 * Maintenance release
= 0.10.0.4 ( 2010-12-14 ) =
 * Add spanish translation, thanks Carlos!
= 0.10.0.3 ( 2010-12-10 ) =
 * Add bulgarian translation, thanks [Veselin](http://www.asenov.net)
 * Update italian
 * Doc updates
= 0.10.0.1 ( 2010-11-12 ) =
 * Documentation updates
= 0.10.0 =
 * Fix for when WordPress is installed into a subdirectory. Thanks [Martin](http://ten-fingers-and-a-brain.com)!
= 0.9.2 =
 * Add many new pictures contributed by [Neko](http://wagashi-net.de/blog/wagashimaniac/). Thank you very much!
 * Update translations
 * Fix for admin CSS
 * Add icon by [famfamfam](http://www.famfamfam.com) to the [Admin Drop Down Menu](http://planetozh.com/blog/my-projects/wordpress-admin-menu-drop-down-css/).
= 0.9.1 =
 * Bugfix, allow a number of 0 flakes.
= 0.9.0 =
 * I18N
 * Add german translation
 * Improve PHP code, readability, security.
= 0.8.1 =
 * Admin CSS updates.
 * Doc updates.
 * Fix bad upgrade bug that deletes plugin settings
= 0.8.0 =
 * New mode for ballons: the images can float upwards now.
 * Added new images: balloons. Thanks to [Desperately Seeking WordPress](http://desperatelyseekingwp.com) for the images and the idea.
 * This changelog was changed to the new format.
= 0.7.6 =
 * Small update + fix.
= 0.7.5 =
 * And another fix related to the 0.7.3 release. Thanks to [Rodin Pandarex](http://www.ecchi-sama.fr/).
= 0.7.4 =
 * Bugfix when no snowflakes are selected. Looks like your settings are lost with this upgrade, sorry about that. Thanks to [Dona](http://dponline.org/weblog) for reporting.
= 0.7.3 =
 * Doc updates, remove unnecessary split(), implode() etc. Add class to images to generate valid markup, thanks to [Gudas](http://mintys.lt/).
= 0.7.2 =
 * Undo last 'update'.
= 0.7.1 =
 * Let IE5 ignore this script.
= 0.7.0 =
 * JavaScript rewrite, encapsulate data in an object. Should increase the plugin's compatibility. Add hack for IE6's lack of position: fixed handling. Window.onload bugfix. End position of pictures depends on flake size, smaller updates.
= 0.6.1 =
 * More pics, fix typos, update layout, fix bug where selecting no image results in an error.
= 0.6.0 =
 * Add pics directory. Simply throw more images in there and have them appear on the settings page. This was requested by [Kristin](http://kauaikris.com/) first.
= 0.5.4 =
 * Link to the [FAQ](http://wordpress.org/extend/plugins/nksnow/faq/) on the config page.
= 0.5.3 =
 * Fix wrong get_bloginfo('url') usage
= 0.5.2 =
 * Add precise URI match suggested by Rob
= 0.5.1 =
 * Bugfix, thanks to [DolphGB](http://www.ps3attitude.com/).
= 0.5.0 =
 * Stop snowing after a certain time.
= 0.4.5 =
 * Checked compatibility with older wordpress versions.
= 0.4.4 =
 * Really include the smaller leaves, thanks to [Dr K](http://drkblog.com/) for pointing that out. Update config screenshot.
= 0.4.3 =
 * Bugfix
= 0.4.2 =
 * Fix the bug introduced by the last 'fix'
= 0.4.1 =
 * Fix potential bug by using PLUGINDIR constant instead of hardcoded path.
= 0.4.0 =
 * Add install hook + minor updates.
= 0.3.0 =
 * Add leaves, make it possible to select different flakes, drops and leaves at the same time. Updates in the wind algo too.
= 0.2.2 =
 * New snowflakes, small js updates and make the config page friendlier. FAQ update and remove border around images if css puts some there, thanks to [Zev Eisenberg](http://zeveisenberg.com) for pointing that out.<br >
= 0.2.1 =
 * Add bugfix for when 0 flakes are selected, thanks to Jon for reporting. Also restructured the settings page to make it a little friendlier. And add more snowflakes.
= 0.2.0 =
 * Add a lot of new configuration options. Include a second snowflake.
= 0.1.6 =
 * Fix for google chrome and make the snowflakes scrolling-aware.
= 0.1.5 =
 * Doc updates only
= 0.1.4 =
 * Wordpress.org upload, some doc updates
= 0.1.3 =
 * Nicer snowflakes
= 0.1.2 =
 * Number of snowflakes is an option now, fix for IE, set allowed URI
= 0.1.1 =
 * Minor fixes
= 0.1.0 =
 * Initial release

== Upgrade Notice ==
= 0.10.0.3 ( 2010-12-10 ) =
 * Add bulgarian translation, thanks [Veselin](http://www.asenov.net)
 * Update italian
 * Doc updates
