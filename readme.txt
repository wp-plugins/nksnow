=== Snow and more ===
Contributors: nkuttler
Author URI: http://www.nkuttler.de/
Plugin URI: http://www.nkuttler.de/nksnow/
Donate link: http://www.amazon.de/gp/registry/24F64AHKD51LY
Tags: admin, plugin, christmas, snow, toy, toys, fun, funny, santa
Requires at least: 2.6.0
Tested up to: 2.7-beta1
Stable tag: 0.3.0

Snowflakes falling down your blog! Inspired by the unforgettable xsnow.

== Description ==

<p>
Snowflakes (and more) falling down your blog! Inspired by the unforgettable xsnow. Future releases will include nicer snowflakes, trees, and santa of course!
</p>
<p>
You can configure the number of snowflakes and limit the plugin to specific posts or pages.
If you enter something into the URI field you will only see snow if the URI of your page matches the string.
No fancy regexps.
I added this feature so that I could put a <a href="http://www.nkuttler.de/nksnow/">live demo</a> on my blog.
</p>

== Installation ==
<ol>
<li>Unzip nksnow.zip</li>
<li>Upload nksnow to your `/wp-content/plugins/` directory</li>
<li>Activate the plugin through the 'Plugins' menu in WordPress</li>
<li>Configure as you like</li>
<li>Enjoy!</li>
</ol>

== Screenshots ==
1. It's snowing! Watch the <a href="http://www.nkuttler.de/nksnow/">live demo</a> at my blog.
2. Settings page.

== Frequently Asked Questions ==
Q: I see no snow.<br />
A: Please make sure that your template uses the wp_footer() and wp_head() template tags. They should be in your header.php and footer.php, see <a href="http://codex.wordpress.org/Theme_Development">the theme development page</a>.<br />

Q: I still see no snow.<br />
A: Please send me a link to your blog. It's quite possible that some doctype combinations or browsers will not work. If somebody complains I might try to fix it.<br />

Q: Why don't you have nicer snowflakes?<br />
A: Sorry, I'm not a designer. Feel free to send me more properly licensed snowflakes that I can include.<br />

== Compatibility ==
Please tell me if you use this plugin successfully on older blogs. I got reports that the plugin doesn't work on 2.5, it's on my todo list.

== Changelog ==
0.4.0	Add install hook + minor updates.<br />
0.3.0	Add leaves, make it possible to select different flakes, drops and leaves at the same time. Updates in the wind algo too.<br />
0.2.2	New snowflakes, small js updates and make the config page friendlier. FAQ update and remove border around images if css puts some there, thanks to <a href="http://zeveisenberg.com">Zev Eisenberg</a> for pointing that out.<br >
0.2.1	Add bugfix for when 0 flakes are selected, thanks to Jon for reporting. Also restructured the settings page to make it a little friendlier. And add more snowflakes.<br />
0.2.0	Add a lot of new configuration options. Include a second snowflake.<br />
0.1.6	Fix for google chrome and make the snowflakes scrolling-aware.<br />
0.1.5	Doc updates only<br />
0.1.4	Wordpress.org upload, some doc updates<br />
0.1.3	Nicer snowflakes<br />
0.1.2	Number of snowflakes is an option now, fix for IE, set allowed URI<br />
0.1.1	Minor fixes<br />
0.1.0	Initial release<br />
