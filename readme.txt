=== Notifications for Collapsed Admin Menu ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: admin, sidebar, menu, comments, moderation, pending, plugins, update, notification, highlight, coffee2code
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 4.6
Tested up to: 5.5
Stable tag: 1.5

Highlights the comments and plugins icons in the collapsed admin sidebar menu when notifications are pending.


== Description ==

In the WordPress admin, when the left sidebar menu is expanded WordPress presents you with a highlighted number within the menu itself indicating the number of pending comments (i.e. comments in moderation) and a separate number for the number of plugins with updates.

However, if you collapse the sidebar menu, then there are *no* visual indications that either types of updates are available. You can view the count of updated plugins by hovering on the plugins icon (or, for comments, by hovering on the comments icon), but you must manually do that to learn of updates.

This plugin enhances the sidebar menu to display a visual indication that comments are in moderation and/or there are plugin updates available. It does so by using a different-colored background for the icon (see the screenshot). The visual indication is also updated when AJAX-based requests are made (so doing an in-line approval of the last pending comment will cause the comments icon background color to return to its non-highlighted color).

By default, the plugin utilizes WordPress's pending/update count background highlight color, which varies depending on the admin color scheme in use by the user.

*NOTE:* As the plugin's name suggests, this plugin only takes effect if the admin sidebar menu is collapsed. Also, the admin user must have JavaScript enabled.

Links: [Plugin Homepage](https://coffee2code.com/wp-plugins/notifications-for-collapsed-admin-menu/) | [Plugin Directory Page](https://wordpress.org/plugins/notifications-for-collapsed-admin-menu/) | [GitHub](https://github.com/coffee2code/notifications-for-collapsed-admin-menu/) | [Author Homepage](https://coffee2code.com)


== Installation ==

1. Install via the built-in WordPress plugin installer. Or download and unzip `notifications-for-collapsed-admin-menu.zip` inside the plugins directory for your site (typically `wp-content/plugins/`)
2. Activate the plugin through the 'Plugins' admin menu in WordPress


== Frequently Asked Questions ==

= Why doesn't this plugin apply when the admin sidebar menu is expanded? =

There is no need for this plugin to do anything in this situation because WordPress already presents a visible count of pending comments and plugins with updates.

= Can I change the background color used to highlight the comments/plugins icons? =

Yes. You can customize the background color used by applying a filter to 'c2c_collapsed_admin_menu_icon_highlight_color'. For example, in your theme's functions.php file, you can add this line (but replace "#9932CC" with the color you want):

`add_filter( 'c2c_collapsed_admin_menu_icon_highlight_color', function( $color ) { return "#9932CC"; } );`

= Does this plugin include unit tests? =

Yes.


== Screenshots ==

1. A comparison of a collapsed admin sidebar menu for a stock WordPress installation, with the plugin activated under WP 2.8+/2.9+, and under WP 3.x+ and WP 4.x+.


== Changelog ==

= 1.5 (2020-09-01) =
Highlights:

This minor update features a rewrite of the JavaScript to use vanilla JS instead of jQuery, restructures the unit test file structure, notes compatibility through WP 5.5+, and a few behind-the-scenes changes.

Details:

* Change: Rewrite JavaScript into vanilla JS and away from using jQuery
* Change: Add `$admin_color` as second arg to `c2c_collapsed_admin_menu_icon_highlight_color` filter
* Change: Remove check for theme support of HTML5 since that isn't relevant to admin
* Change: Restructure unit test file structure
    * New: Create new subdirectory `phpunit/` to house all files related to unit testing
    * Change: Move `bin/` to `phpunit/bin/`
    * Change: Move `tests/bootstrap.php` to `phpunit/`
    * Change: Move `tests/` to `phpunit/tests/`
    * Change: Rename `phpunit.xml` to `phpunit.xml.dist` per best practices
* Change: Note compatibility through WP 5.5+
* New: Add FAQ indicating presence of unit tests
* Unit tests:
    * New: Add tests for filter `c2c_collapsed_admin_menu_icon_highlight_color`
    * New: Add test for default value for `get_bg_color()`
    * Change: Test that JS script is both enqueued and registered

= 1.4.1 (2020-05-26) =
* New: Add TODO.md and move existing TODO list from top of main plugin file into it
* Change: Use HTTPS for link to WP SVN repository in bin script for configuring unit tests (and delete commented-out code)
* Change: Note compatibility through WP 5.4+
* Change: Update links to coffee2code.com to be HTTPS
* Change: Unit tests: Add comments to act as section labels for unit tests

= 1.4 (2019-12-14) =
* New: Add HTML5 compliance by omitting `type` attribute when the theme explicitly supports 'html5'
* New: Extract code to determine admin menu item notification background color into `get_bg_color()`
* New: Add CHANGELOG.md file and move all but most recent changelog entries into it
* New: Add unit testing
* Fix: Correct typo in GitHub URL
* Change: Allow class to be defined outside of admin context
* Change: Note compatibility through WP 5.3+
* Change: Update copyright date (2020)
* Change: Split paragraph in README.md's "Support" section into two

_Full changelog is available in [CHANGELOG.md](https://github.com/coffee2code/notifications-for-collapsed-admin-menu/blob/master/CHANGELOG.md)._


== Upgrade Notice ==

= 1.5 =
Minor update: Rewrote all JavaScript to use vanilla JS instead of jQuery, restructured the unit test file structure, noted compatibility through WP 5.5+, and a few behind-the-scenes changes.

= 1.4.1 =
Trivial update: Added TODO.md file, updated a few URLs to be HTTPS, and noted compatibility through WP 5.4+

= 1.4 =
Minor update: added HTML5 compliance when supported by the theme, introduced unit tests, created CHANGELOG.md to store historical changelog outside of readme.txt, noted compatibility through WP 5.3+, and updated copyright date (2020)

= 1.3.2 =
Trivial update: aded more inline documentation, noted compatibility through WP 5.1+, updated copyright date (2019)

= 1.3.1 =
Trivial update: noted compatibility through WP 4.9+, added README.md for GitHub, and updated copyright date (2018)

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
