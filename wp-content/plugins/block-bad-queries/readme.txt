=== BBQ: Block Bad Queries ===

Plugin Name: Block Bad Queries (BBQ)
Plugin URI: https://perishablepress.com/block-bad-queries/
Description: Automatically protects WordPress against malicious URL requests. This is the free/basic version of BBQ.
Tags: blacklist, eval, firewall, hack, http, lockdown, malicious, protect, query, request, security, secure, spam, whitelist
Usage: No configuration necessary. Upload, activate and done. BBQ blocks bad queries automically to protect your site against malicious URL requests. For advanced protection check out BBQ Pro.
Author: Jeff Starr
Author URI: https://plugin-planet.com/
Contributors: specialk, aldolat, WpBlogHost, jameswilkes, juliobox, lernerconsult
Donate link: http://m0n.co/donate
Requires at least: 4.1
Tested up to: 4.7
Stable tag: 20161114
Version: 20161114
License: GPLv2 or later

The fastest firewall plugin for WordPress.



== Description ==

> Install, activate, and done! Powerful protection from WP's __fastest__ firewall plugin.

[Block Bad Queries](https://perishablepress.com/block-bad-queries/) (BBQ) is a simple, super-fast plugin that protects your site against malicious URL requests. BBQ checks all incoming traffic and quietly blocks bad requests containing nasty stuff like `eval(`, `base64_`, and excessively long request-strings. This is a simple yet solid solution for sites that are unable to use a [strong .htaccess firewall](https://perishablepress.com/6g/). 

**Awesome Features**

* 100% Plug-n-play functionality
* No configuration required (it just works)
* Born of speed and simplicity, no frills
* 100% focused on security and performance
* Blocks a wide range of malicious requests
* Based on the [5G/6G Firewall](https://perishablepress.com/6g/)
* Scans all incoming traffic and blocks bad requests
* Scans all types of requests: GET, POST, PUT, DELETE, etc.
* Works silently behind the scenes to protect your site
* Hassle-free security plugin that's easy to use
* Thoroughly tested, error-free performance
* Compatible with other security plugins
* Customize blocked strings via [Whitelist/Blacklist plugins](https://perishablepress.com/bbq-whitelist-blacklist/)

**Pro Version**

For advanced protection and awesome features, check out [BBQ Pro](https://plugin-planet.com/bbq-pro/).



== Installation ==

**Installing BBQ**

1. Install, activate, done.

Once active, BBQ automically blocks bad queries to protect your site against malicious URL requests. For more control and stronger protection, [check out BBQ Pro &raquo;](https://plugin-planet.com/bbq-pro/)

[More info on installing WP plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)


**Customizing**

* To allow patterns otherwise blocked by BBQ, check out the [BBQ Whitelist plugin](https://perishablepress.com/bbq-whitelist-blacklist/)
* To block patterns otherwise allowed by BBQ, check out the [BBQ Blacklist plugin](https://perishablepress.com/bbq-whitelist-blacklist/)

Note that the [Pro version of BBQ](https://plugin-planet.com/bbq-pro/) makes it possible to customize patterns (add, edit, remove) directly via the plugin settings, with a click. 



== Upgrade Notice ==

To upgrade BBQ, remove old version and replace with new version. Or just click "Update" from the Plugins screen and let WordPress do it for you automatically. Nothing else needs done.



== Screenshots ==

Sorry, there are no screenshots for BBQ! Everything is done behind the scenes.

The free version of BBQ is strictly plug-n-play, set-it-and-forget-it, with no settings to configure whatsoever. Just install, activate, and enjoy better security and robust protection against malicious requests.

The Pro version of BBQ is just as fast and simple to use, but is much more powerful and includes settings to customize and fine-tune your firewall. [Check out screenshots of BBQ Pro](https://plugin-planet.com/bbq-pro/#screenshots) (click the three grey buttons near the top of the page).



== Frequently Asked Questions ==

**What other security plugins do you recommend?**

I recently recorded a video tutorial series for Lynda.com on [how to secure WordPress sites](http://m0n.co/securewp). That's a good place to learn more about the best techniques and WP plugins for protecting your site against threats.


**Do I need to do anything else for BBQ to work?**

Nope, just install and relax knowing that BBQ is protecting your site from bad URL requests.


**Does BBQ make changes to my .htaccess file?**

Absolutely not. Unlike other security/firewall plugins, neither BBQ (free version) nor BBQ Pro make any changes to any .htaccess file.


**Does BBQ make any changes to my WP database?**

No, the free version of BBQ operates as each page is loaded; it does not make any changes whatsoever to the WP database.


**Does BBQ block malicious strings included in arrays?**

Yes, BBQ scans any arrays that are included in the URI request. If any matching patterns are found, the request is blocked.


**Do I need WordPress to run BBQ?**

Nope! BBQ is available in the following flavors:

* [BBQ Free - WordPress Plugin](https://wordpress.org/plugins/block-bad-queries/)
* [BBQ Pro - WordPress Plugin](https://plugin-planet.com/bbq-pro/)
* [BBQ Standalone PHP Script](https://perishablepress.com/block-bad-queries/#bbq-php-script)

So you can check out the Standalone PHP Script for sites that are not running WordPress.


**Got a question?**

Send any questions or feedback via my [contact form](https://perishablepress.com/contact/).



== Support development of this plugin ==

I develop and maintain this free plugin with love for the WordPress community. To show support, you can [make a cash donation](http://m0n.co/donate), [bitcoin donation](http://m0n.co/bitcoin), or purchase one of my books:

* [The Tao of WordPress](https://wp-tao.com/)
* [Digging into WordPress](https://digwp.com/)
* [.htaccess made easy](https://htaccessbook.com/)
* [WordPress Themes In Depth](https://wp-tao.com/wordpress-themes-book/)

And/or purchase one of my premium WordPress plugins:

* [BBQ Pro](https://plugin-planet.com/bbq-pro/) - Pro version of Block Bad Queries
* [SES Pro](https://plugin-planet.com/ses-pro/) - Super-simple &amp; flexible email signup forms
* [USP Pro](https://plugin-planet.com/usp-pro/) - Pro version of User Submitted Posts

Links, tweets and likes also appreciated. Thank you! :)



== Changelog ==

**2016/11/14**

* Replaces `esc_html` with `esc_attr` for link title attributes
* Changes stable tag from trunk to latest version
* Adds `&raquo;` to rate this plugin link
* Updates URL for rate this plugin link
* Moves "Go Pro" link to action links
* Renames action/meta link functions
* Updates default translation template
* Tests on WordPress version 4.7 (beta)

**2016/08/10**

* Added translation support
* Added plugin icons and larger banner
* General fine-tuning and testing
* Tested on WordPress 4.6

**2016/03/28**

* Removed `\:\/\/` from Request URI and Query String patterns (see [this thread](https://wordpress.org/support/topic/redirection-blocked))
* Added `(benchmark|sleep)(\s|%20)*\(` to Request URI patterns (thanks to [smitka](https://wordpress.org/support/topic/idea-better-sqli-filter))
* Tested on WordPress 3.5 beta

**2015/11/07**

* Added `\.php\([0-9]+\)`, `__hdhdhd.php` to URI patterns (Thanks to [George Lerner](http://www.glerner.com/))
* Added `acapbot`, `semalt` to User Agent patterns (Thanks to [George Lerner](http://www.glerner.com/))
* Replaced `UNION.*SELECT` with `UNION(.*)SELECT` in Request URI patterns
* Added `morfeus`, `snoopy` to User Agent patterns
* Refactored redirect/exit functionality
* Renamed `rate_bbq()` to `bbq_links()`
* Tested with WordPress 4.4 beta

**2015/08/08**

* Tested on WordPress 4.3
* Updated minimum version requirement
* Highlighted Pro link on Plugins screen

**2015/06/24**

* Replaced `UNION\+SELECT` with `UNION.*SELECT`
* Added `wp-config.php` to query-string patterns
* Added plugin link to [BBQ Pro](https://plugin-planet.com/bbq-pro/)
* Testing on WP 4.3 (alpha)

**2015/05/07**

* Tested with WP 4.2 and 4.3 (alpha)
* Replaced some `http` with `https` in readme.txt

**2015/03/14**

* introduce `bbq_core()`
* tested on latest WP
* tightened up code

**2014/09/22**

* tested on latest version of WordPress (4.0)
* retested on Multisite
* increased minimum version requirement to WP 3.7

**2014/03/05**

* Bugfix: added conditional checks for empty variables

**2014/01/23**

* tested on latest version of WordPress (3.8)
* added link to rate plugin

**2013/11/03**

* removed `?>` from script
* added optional line for blocking long URLs
* added line to prevent direct access to BBQ script
* added `\;Nt\.`, `\=Nt\.`, `\,Nt\.` to request URI items
* tested on latest version of WordPress (3.7)

**2013/07/07**

* replaced `Nt\.` with `\/Nt\.` (resolves comment editing/approval issue)

**2013/07/05**

* removed `https\:` (from previous version)
* replaced `\/https\/` with `\/https\:`
* replaced `\/http\/` with `\/http\:`
* replaced `\/ftp\/` with `\/ftp\:`

**2013/07/04**

* removed block for `jakarta` in user-agents
* removed `union` from query strings
* added to request-URI: `\%2Flocalhost`, `Nt\.`, `https\:`, `\.exec\(`, `\)\.html\(`, `\{x\.html\(`, `\(function\(`
* resolved PHP Notice "Undefined Index" via `isset()`

**2013/01/03**

* removed block for `CONCAT` in request-URI
* removed block for `environ` in query-string
* removed block for `%3C` and `%3E` in query-string
* removed block for `%22` and `%27` in query-string
* removed block for `[` and `]` in query-string (to allow unsafe characters used in WordPress)
* removed block for `?` in query-string (to allow unsafe character used in WordPress)
* removed block for `:` in query-string (to allow unsafe character used by Google)
* removed block for `libwww` in user-agents (to allow access to Lynx browser)

**2012/11/08**

* Removed `:` match from query string (Google disregards encoding)
* Removed `scanner` from query string from query string match
* Streamlined source code for better performance (thanks to juliobox)

**Older versions**

* 2012/10/27 - Disabled check for long strings, disabled check for scanner
* 2012/10/26 - Rebuilt plugin using 5G/6G technology
* 2011/02/21 - Updated readme.txt file
* 2009/12/30 - Added check for admin users
* 2009/12/30 - Additional request strings added


