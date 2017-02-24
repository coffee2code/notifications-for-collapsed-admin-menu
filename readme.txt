=== Notifications for Collapsed Admin Menu ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: admin, sidebar, menu, comments, moderation, pending, plugins, update, notification, highlight, coffee2code
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 4.6
Tested up to: 4.7
Stable tag: 1.3

Highlights the comments and plugins icons in the collapsed admin sidebar menu when notifications are pending.


== Description ==

In the WordPress admin, when the left sidebar menu is expanded WordPress presents you with a highlighted number within the menu itself indicating the number of pending comments (i.e. comments in moderation) and a separate number for the number of plugins with updates.

However, if you collapse the sidebar menu, then there are *no* visual indications that either types of updates are available. You can view the count of updated plugins by hovering on the plugins icon (or, for comments, by hovering on the comments icon), but you must manually do that to learn of updates.

This plugin enhances the sidebar menu to display a visual indication that comments are in moderation and/or there are plugin updates available. It does so by using a different-colored background for the icon (see the screenshot). The visual indication is also updated when AJAX-based requests are made (so doing an in-line approval of the last pending comment will cause the comments icon background color to return to its non-highlighted color).

By default, the plugin utilizes WordPress's pending/update count background highlight color, which varies depending on the admin color scheme in use by the user.

*NOTE:* As the plugin's name suggests, this plugin only takes effect if the admin sidebar menu is collapsed. Also, the admin user must have JavaScript enabled.

Links: [Plugin Homepage](http://coffee2code.com/wp-plugins/notifications-for-collapsed-admin-menu/) | [Plugin Directory Page](https://wordpress.org/plugins/notifications-for-collapsed-admin-menu/) | [Author Homepage](http://coffee2code.com)


== Installation ==

1. Install via the built-in WordPress plugin installer. Or download and unzip `notifications-for-collapsed-admin-menu.zip` inside the plugins directory for your site (typically `wp-content/plugins/`)
2. Activate the plugin through the 'Plugins' admin menu in WordPress


== Frequently Asked Questions ==

= Why doesn't this plugin apply when the admin sidebar menu is expanded? =

There is no need for this plugin to do anything in this situation because WordPress already presents a visible count of pending comments and plugins with updates.

= Can I change the background color used to highlight the comments/plugins icons? =

Yes. You can customize the background color used by applying a filter to 'c2c_collapsed_admin_menu_icon_highlight_color'. For example, in your theme's functions.php file, you can add this line (but replace "#9932CC" with the color you want):

`add_filter( 'c2c_collapsed_admin_menu_icon_highlight_color', function( $color ) { return "#9932CC"; } );`


== Screenshots ==

1. A comparison of a collapsed admin sidebar menu for a stock WordPress installation, with the plugin activated under WP 2.8+/2.9+, and under WP 3.x+ and WP 4.x+.


== Changelog ==

= 1.3 (2017-02-23) =
* New: Load text domain for the plugin
* Change: Use `version()` to set version for enqueued JS file
* Change: Hook initialization to 'plugins_loaded' action
    * Add `do_init()` as the primary initializer hooked to 'plugins_loaded'
    * `init()` now just hooks 'plugins_loaded'; its contents moved into `do_init()`
* Change: Prevent object instantiation
    * Add private `__construct()`
    * Add private `__wakeup()`
* Change: Improve readme.txt (remove description of things that are no longer the case, minor tweaks, spacing)
* Change: Unindent all the code for the class
* Change: Note compatibility through WP 4.7+
* Change: Remove support for WordPress older than 4.6 (should still work for earlier versions back to WP 3.8)
* Change: Update copyright date (2017)
* New: Add LICENSE file

= 1.2.2 (2016-01-30) =
* New: Define 'Text Domain' plugin header attribute.
* New: Create empty index.php to prevent files from being listed if web server has enabled directory listings.
* Change: Minor tweak to how the JavaScript file path is defined for enqueuing.
* Change: Note compatibility through WP 4.4+.
* Change: Update copyright date (2016).

= 1.2.1 (2015-02-25) =
* Reformat plugin header
* Minor code reformatting (spacing, bracing)
* Change documentation links to w.org to be https
* Minor documentation spacing changes throughout
* Note compatibility through WP 4.1+
* Update copyright date (2015)
* Add plugin icon

= 1.2 (2013-12-18) =
* Detect WP 3.8 and determine default background colors based on the chosen admin color theme
* Minor code tweaks (spacing)
* Note compatibility through WP 3.8+
* Update copyright date (2014)
* Change donate link
* Update banner image to reflect WP 3.8 admin refresh
* Update screenshot to reflect WP 3.8 admin refresh

= 1.1.3 =
* Add check to prevent execution of code if file is directly accessed
* Note compatibility through WP 3.5+
* Update copyright date (2013)
* Move screenshot into repo's assets directory

= 1.1.2 =
* Re-license as GPLv2 or later (from X11)
* Add 'License' and 'License URI' header tags to readme.txt and plugin file
* Remove ending PHP close tag
* Update screenshot for WP 3.4
* Minor readme.txt changes
* Note compatibility through WP 3.4+

= 1.1.1 =
* Hook 'admin_enqueue_scripts' action instead of 'admin_head' to output CSS
* Add version() to return plugin version
* Note compatibility through WP 3.3+
* Add link to plugin directory page to readme.txt
* Update copyright date (2012)

= 1.1 =
* Add admin color scheme-specific color defaults
* Improve CSS by making selector more specific in order to eliminate !important clauses
* Detect changed id/class selectors in jQuery and use WP 3.2 appropriate ids/classes
* Explicitly enqueue jQuery
* Note compatibility through WP 3.2+
* Minor documentation reformatting in readme.txt
* Fix plugin homepage and author links in description in readme.txt

= 1.0.1 =
* Fix bug with incorrect pending comment count when comment menu has submenu item(s)
* Explicitly declare all class function public static
* Note compatibility through WP 3.1+
* Update copyright date (2011)

= 1.0 =
* Initial release


== Upgrade Notice ==

= 1.3 =
Minor update: noted compatibility through WP 4.7+, dropped compatibility with version of WP older than 4.6, updated copyright date (2017), and other minor back-end tweaks

= 1.2.2 =
Trivial update: noted compatibility through WP 4.4+ and updated copyright date (2016)

= 1.2.1 =
Trivial update: noted compatibility through WP 4.1+ and updated copyright date (2015)

= 1.2 =
Minor update: better background color defaults under WP 3.8; updated banner and screenshot images; noted compatibility through WP 3.8+

= 1.1.3 =
Trivial update: noted compatibility through WP 3.5+

= 1.1.2 =
Trivial update: noted compatibility through WP 3.4+; explicitly stated license

= 1.1.1 =
Trivial update: noted compatibility through WP 3.3+ and minor tweaks (not related to functionality)

= 1.1 =
Minor update: added admin color scheme-specific color defaults; noted compatibility through WP 3.2+

= 1.0.1 =
Minor update: minor bugfix, noted compatibility with WP 3.1+, and updated copyright date.

= 1.0 =
Official initial release!
