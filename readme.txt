=== Snow, balloons and more ===
Contributors: nkuttler
Author URI: http://www.nkuttler.de/
Plugin URI: http://www.nkuttler.de/nksnow/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=11041772
Tags: admin, plugin, christmas, snow, toy, toys, fun, funny, santa, balloons, balloon, balloons, birthday, celebrate
Requires at least: 2.1
Tested up to: 2.9
Stable tag: 0.9.2

Snowflakes (and more) falling down your blog! Inspired by the unforgettable xsnow. Since 0.8.0 images can float upwards too.

== Description ==

<p>
Snowflakes (and more) falling down your blog! There are snowflakes, leaves, drops - and balloons that can float upwards. You can simply add more images in the <tt>pics</tt> folder and they will appear on the settings page. I also happily accept images submitted to me as long as they are properly licensed.
</p>
<p>
You can configure the number of snowflakes and limit the plugin to specific posts or pages.
If you enter something into the URI field you will only see snow if the URI of your page matches the string.
No fancy regexps.
I added this feature so that I could put a <a href="http://www.nkuttler.de/nksnow/">live demo</a> on my blog.
</p>
<p>
If you like this you might like my <a href="http://www.nkuttler.de/nkfireworks/">WordPress fireworks plugin</a> as well.
</p>

<h3>My plugins</h3>
<p>
<a href="http://www.nkuttler.de/wordpress/nktagcloud/">Better tag cloud</a>:
I was pretty unhappy with the default WordPress tag cloud widget. This one is more powerful and offers a list HTML markup that is consistent with most other widgets.
<br/>
<a href="http://www.nkuttler.de/wordpress/nkthemeswitch/">Theme switch</a>:
I like to tweak my main theme that I use on a variety of blogs. If you have ever done this you know how annoying it can be to break things for visitors of your blog. This plugin allows you to use a different theme than the one used for your visitors when you are logged in.
<br/>
<a href="http://www.nkuttler.de/wordpress/zero-conf-mail/">Zero Conf Mail</a>:
Simple mail contact form, the way I like it. No ajax, no bloat. No configuration necessary, but possible.
<br/>
<a href="http://www.nkuttler.de/wordpress/nkmovecomments/">Move WordPress comments</a>:
This plugin adds a small form to every comment on your blog. The form is only added for admins and allows you to <a href="http://www.nkuttler.de/nkmovecomments/">move comments</a> to a different post/page and to fix comment threading.
<br/>
<a href="http://www.nkuttler.de/wordpress/delete-pending-comments">Delete Pending Comments</a>:
This is a plugin that lets you delete all pending comments at once. Useful for spam victims.
<br/>
<a href="http://www.nkuttler.de/wordpress/nksnow/">Snow and more</a>:
This one lets you see snowflakes, leaves, raindrops, balloons or custom images fall down or float upwards on your blog.
<br/>
<a href="http://www.nkuttler.de/wordpress/nkfireworks/">Fireworks</a>:
The name says it all, see fireworks on your blog!
<br/>
<a href="http://www.rhymebox.de/blog/rhymebox-widget/">Rhyming widget</a>:
I wrote a little online <a href="http://www.rhymebox.com/">rhyming dictionary</a>. This is a widget to search it directly from one of your sidebars.
</p>

== Installation ==
<ol>
<li>Unzip nksnow.zip</li>
<li>Upload nksnow to your `/wp-content/plugins/` directory</li>
<li>Activate the plugin through the 'Plugins' menu in WordPress</li>
<li>Configure as you like. See <tt>Settings</tt>, then <tt>Snow and more</tt>.</li>
<li>Enjoy! Read the <a href="http://wordpress.org/extend/plugins/nksnow/faq/">FAQ</a> if there's no snow.</li>
</ol>

== Screenshots ==
1. It's snowing! Watch the <a href="http://www.nkuttler.de/nksnow/">live demo</a> at my blog.
2. Settings page.

== Frequently Asked Questions ==
Q: How do I make the effect only active on the start page?<br />
A: Set the URI filter to / and check the precise match box. This assumes that WordPress is installed in the webserver's root directory.<br />

Q: I see no snow.<br />
A: Please make sure that your template uses the wp_footer() and wp_head() template tags. They should be in your header.php and footer.php, see <a href="http://codex.wordpress.org/Theme_Development">the theme development page</a>.<br />

Q: I still see no snow.<br />
A: Please send me a link to your blog. It's quite possible that some doctype combinations or browsers will not work. If somebody complains I might try to fix it.<br />

Q: The snowflakes look odd, there's a border around them, they have a background etc.<br />
A: Add <tt>img.nksnow { border: 0 }</tt> at the end of your style.css (or change the CSS property you need to change).

Q: Why don't you have nicer snowflakes?<br />
A: Sorry, I'm not a designer. Feel free to send me more properly licensed snowflakes that I can include.<br />

== Changelog ==
= 0.9.2 =
 * Add many new pictures contributed by <a href="http://wagashi-net.de/blog/wagashimaniac/">Neko</a>. Thank you very much!
 * Update translations
 * Fix for admin CSS
 * Add icon by <a href="http://www.famfamfam.com">famfamfam</a> to the <a href="http://planetozh.com/blog/my-projects/wordpress-admin-menu-drop-down-css/">Admin Drop Down Menu</a>.
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
 * Added new images: balloons. Thanks to <a href="http://desperatelyseekingwp.com">Desperately Seeking WordPress</a> for the images and the idea.
 * This changelog was changed to the new format.
= 0.7.6 =
 * Small update + fix.<br />
= 0.7.5 =
 * And another fix related to the 0.7.3 release. Thanks to <a href="http://www.ecchi-sama.fr/">Rodin Pandarex</a>.<br />
= 0.7.4 =
 * Bugfix when no snowflakes are selected. Looks like your settings are lost with this upgrade, sorry about that. Thanks to <a href="http://dponline.org/weblog">Dona</a> for reporting.<br />
= 0.7.3 =
 * Doc updates, remove unnecessary split(), implode() etc. Add class to images to generate valid markup, thanks to <a href="http://mintys.lt/">Gudas</a>.<br />
= 0.7.2 =
 * Undo last 'update'.<br />
= 0.7.1 =
 * Let IE5 ignore this script.<br />
= 0.7.0 =
 * JavaScript rewrite, encapsulate data in an object. Should increase the plugin's compatibility. Add hack for IE6's lack of position: fixed handling. Window.onload bugfix. End position of pictures depends on flake size, smaller updates.<br />
= 0.6.1 =
 * More pics, fix typos, update layout, fix bug where selecting no image results in an error.<br />
= 0.6.0 =
 * Add pics directory. Simply throw more images in there and have them appear on the settings page. This was requested by <a href="http://kauaikris.com/">Kristin</a> first.<br />
= 0.5.4 =
 * Link to the <a href="http://wordpress.org/extend/plugins/nksnow/faq/">FAQ</a> on the config page.<br />
= 0.5.3 =
 * Fix wrong get_bloginfo('url') usage<br />
= 0.5.2 =
 * Add precise URI match suggested by Rob<br />
= 0.5.1 =
 * Bugfix, thanks to <a href="http://www.ps3attitude.com/">DolphGB</a>.<br />
= 0.5.0 =
 * Stop snowing after a certain time.<br />
= 0.4.5 =
 * Checked compatibility with older wordpress versions.<br />
= 0.4.4 =
 * Really include the smaller leaves, thanks to <a href="http://drkblog.com/">Dr K</a> for pointing that out. Update config screenshot.<br />
= 0.4.3 =
 * Bugfix<br />
= 0.4.2 =
 * Fix the bug introduced by the last 'fix'<br />
= 0.4.1 =
 * Fix potential bug by using PLUGINDIR constant instead of hardcoded path.<br />
= 0.4.0 =
 * Add install hook + minor updates.<br />
= 0.3.0 =
 * Add leaves, make it possible to select different flakes, drops and leaves at the same time. Updates in the wind algo too.<br />
= 0.2.2 =
 * New snowflakes, small js updates and make the config page friendlier. FAQ update and remove border around images if css puts some there, thanks to <a href="http://zeveisenberg.com">Zev Eisenberg</a> for pointing that out.<br >
= 0.2.1 =
 * Add bugfix for when 0 flakes are selected, thanks to Jon for reporting. Also restructured the settings page to make it a little friendlier. And add more snowflakes.<br />
= 0.2.0 =
 * Add a lot of new configuration options. Include a second snowflake.<br />
= 0.1.6 =
 * Fix for google chrome and make the snowflakes scrolling-aware.<br />
= 0.1.5 =
 * Doc updates only<br />
= 0.1.4 =
 * Wordpress.org upload, some doc updates<br />
= 0.1.3 =
 * Nicer snowflakes<br />
= 0.1.2 =
 * Number of snowflakes is an option now, fix for IE, set allowed URI<br />
= 0.1.1 =
 * Minor fixes<br />
= 0.1.0 =
 * Initial release<br />
