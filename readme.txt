=== Snow and more ===
Contributors: nkuttler
Author URI: http://www.nkuttler.de/
Plugin URI: http://www.nkuttler.de/nksnow/
Donate link: http://www.amazon.de/gp/registry/24F64AHKD51LY
Tags: admin, plugin, christmas, snow, toy, toys, fun, funny, santa
Requires at least: 2.1
Tested up to: 2.7
Stable tag: 0.7.2

Snowflakes (and more) falling down your blog! Inspired by the unforgettable xsnow.

== Description ==

<p>
Snowflakes (and more) falling down your blog! There are snowflakes, leaves and drops. Since version 0.6.0 you can simply add more images in the <tt>pics</tt> folder and they will appear on the settings page. I also happily accept images submitted to me as long as they are properly licensed.
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

<h3>My other plugins</h3>
<a href="http://www.nkuttler.de/nktagcloud/">Better tag cloud</a>:
I was pretty unhappy with the default WordPress tag cloud widget. This one is more powerful and offers a list HTML markup that is consistent with most other widgets.
<br/>
<a href="http://www.nkuttler.de/nkthemeswitch/">Theme switch</a>:
I like to tweak my main theme that I use on a varity of blogs. If you have ever done this you know how annoying it can be to break things for visitors of your blog. This plugin allows you to use a different theme than the one used for your visitors when you are logged in.
<br/>
<a href="http://www.rhymebox.de/blog/rhymebox-widget/">Rhyming widget</a>:
I wrote a little online rhyming dictionary. This is a widget to search it directly from one of your sidebars.
<br/>
<a href="http://www.nkuttler.de/nkfireworks/">Fireworks</a>:
The name says it all, see fireworks on your blog!

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
Q: I see no snow.<br />
A: Please make sure that your template uses the wp_footer() and wp_head() template tags. They should be in your header.php and footer.php, see <a href="http://codex.wordpress.org/Theme_Development">the theme development page</a>.<br />

Q: I still see no snow.<br />
A: Please send me a link to your blog. It's quite possible that some doctype combinations or browsers will not work. If somebody complains I might try to fix it.<br />

Q: The snowflakes look odd, there's a border around them, they have a background etc.<br />
A: Add <tt>img.nksnow { border: 0 }</tt> at the end of your style.css (or change the CSS property you need to change).

Q: Why don't you have nicer snowflakes?<br />
A: Sorry, I'm not a designer. Feel free to send me more properly licensed snowflakes that I can include.<br />

== Changelog ==
0.7.3	Remove unnecessary split(), implode() etc.<br />
0.7.2	Undo last 'update'.<br />
0.7.1	Let IE5 ignore this script.<br />
0.7.0	JavaScript rewrite, encapsulate data in an object. Should increase the plugin's compatibility. Add hack for IE6's lack of position: fixed handling. Window.onload bugfix. End position of pictures depends on flake size, smaller updates.<br />
0.6.1	More pics, fix typos, update layout, fix bug where selecting no image results in an error.<br />
0.6.0	Add pics directory. Simply throw more images in there and have them appear on the settings page. This was requested by <a href="http://kauaikris.com/">Kristin</a> first.<br />
0.5.4	Link to the <a href="http://wordpress.org/extend/plugins/nksnow/faq/">FAQ</a> on the config page.<br />
0.5.3	Fix wrong get_bloginfo('url') usage<br />
0.5.2	Add precise URI match suggested by Rob<br />
0.5.1	Bugfix, thanks to <a href="http://www.ps3attitude.com/">DolphGB</a>.<br />
0.5.0	Stop snowing after a certain time.<br />
0.4.5	Checked compatibility with older wordpress versions.<br />
0.4.4	Really include the smaller leaves, thanks to <a href="http://drkblog.com/">Dr K</a> for pointing that out. Update config screenshot.<br />
0.4.3	Bugfix<br />
0.4.2	Fix the bug introduced by the last 'fix'<br />
0.4.1	Fix potential bug by using PLUGINDIR constant instead of hardcoded path.<br />
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
