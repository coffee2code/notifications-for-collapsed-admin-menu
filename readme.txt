=== Notifications for Collapsed Admin Menu ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: admin, menu, moderation, notifications, coffee2code
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 4.6
Tested up to: 6.6
Stable tag: 1.6.2

Highlights the comments and plugins icons in the collapsed admin sidebar menu when notifications are pending.


== Description ==

In the WordPress admin, when the left sidebar menu is expanded WordPress presents you with a highlighted number within the menu itself indicating the number of pending comments (i.e. comments in moderation) and a separate number for the number of plugins with updates.

However, if you collapse the sidebar menu, then there are *no* visual indications that either types of updates are available. You can view the count of updated plugins by hovering on the plugins icon (or, for comments, by hovering on the comments icon), but you must manually do that to learn of updates.

This plugin enhances the sidebar menu to display a visual indication that comments are in moderation and/or there are plugin updates available. It does so by using a different-colored background for the icon (see the screenshot). The visual indication is also updated when AJAX-based requests are made (so doing an in-line approval of the last pending comment will cause the comments icon background color to return to its non-highlighted color).

By default, the plugin utilizes WordPress's pending/update count background highlight color, which varies depending on the admin color scheme in use by the user.

*NOTE:* As the plugin's name suggests, this plugin only takes effect if the admin sidebar menu is collapsed. Also, the admin user must have JavaScript enabled.

Links: [Plugin Homepage](https://coffee2code.com/wp-plugins/notifications-for-collapsed-admin-menu/) | [Plugin Directory Page](https://wordpress.org/plugins/notifications-for-collapsed-admin-menu/) | [GitHub](https://github.com/coffee2code/notifications-for-collapsed-admin-menu/) | [Author Homepage](https://coffee2code.com)


== Installation ==

1. Install via the built-in WordPress plugin installer. Or install the plugin code inside the plugins directory for your site (typically `/wp-content/plugins/`).
2. Activate the plugin through the 'Plugins' admin menu in WordPress


== Frequently Asked Questions ==

= Why doesn't this plugin apply when the admin sidebar menu is expanded? =

There is no need for this plugin to do anything in this situation because WordPress already presents a visible count of pending comments and plugins with updates.

= Can I change the background color used to highlight the comments/plugins icons? =

Yes. You can customize the background color used by applying a filter to 'c2c_collapsed_admin_menu_icon_highlight_color'. For example, in your theme's functions.php file, you can add this line (but replace "#9932CC" with the color you want):

`add_filter( 'c2c_collapsed_admin_menu_icon_highlight_color', function( $color ) { return "#9932CC"; } );`

Or, you can make use of my [Add Admin CSS](https://wordpress.org/plugins/add-admin-css/) plugin to define CSS to override the background color using this snippet of CSS (once again, replace "#9932CC" with the color you want):

`
/* Override the highlight color used by the plugin Notifications for Collapsed Admin Menu. */
:root {
  --collapsed-admin-icon-highlight-color: #9932CC;
}
.folded #adminmenu li.collapsed-with-pending {
	background-color: var(--collapsed-admin-icon-highlight-color);
	border-left-color: var(--collapsed-admin-icon-highlight-color);
	border-right-color: var(--collapsed-admin-icon-highlight-color);
}
`

= Does this plugin include unit tests? =

Yes. The tests are not packaged in the release .zip file or included in plugins.svn.wordpress.org, but can be found in the [plugin's GitHub repository](https://github.com/coffee2code/notifications-for-collapsed-admin-menu/).


== Screenshots ==

1. A comparison of a collapsed admin sidebar menu for a stock WordPress installation, with the plugin activated under WP 2.8+/2.9+, and under WP 3.x+ and WP 4.x+.


== Changelog ==

= 1.6.2 (2024-08-21) =
* Fix: Fix formatting of code in `readme.txt`
* Change: Note compatibility through WP 6.6+
* Change: Update copyright date (2024)
* Change: Reduce number of 'Tags' from `readme.txt`
* Change: Remove development and testing-related files from release packaging
* Unit tests:
    * Hardening: Prevent direct web access to `bootstrap.php`
    * Change: In bootstrap, store path to plugin directory in a constant

= 1.6.1 (2023-06-06) =
* Change: Note compatibility through WP 6.3+
* Change: Update copyright date (2023)
* New: Add `.gitignore` file
* Unit tests:
    * Allow tests to run against current versions of WordPress
    * New: Add `composer.json` for PHPUnit Polyfill dependency
    * Change: Prevent PHP warnings due to missing core-related generated files

= 1.6 (2021-10-22) =
Highlights:

This minor release adds support for other menu items that may have a count indicator, prevents potential JS errors, notes compatibility through WP 5.8+, and minor reorganization and tweaks to unit tests.

Details:

* New: Add support for other menu items that borrow the plugin count indicator markup for their own count indicator
* Fix: Change `__wakeup()` method visibility from `private` to `public` to avoid warnings under PHP8
* Fix: Throw an error when attempting to unserialize an instance of the class to actually prevent it from happening
* Change: Prevent potential JavaScript errors
* Change: Amend FAQ to also suggest and explain use of Add Admin CSS plugin to customize highlight color as an alternative to setting color via filter
* Change: Tweak installation instruction
* Change: Note compatibility through WP 5.8+
* Change: Reduce the number of plugin tags in readme.txt
* Change: Restructure unit test file structure
    * Change: Restructure unit test directories
        * Change: Move `phpunit/` into `tests/phpunit/`
        * Change: Move `phpunit/bin/` into `tests/`
    * Change: Remove 'test-' prefix from unit test file
    * Change: In bootstrap, store path to plugin file constant
    * Change: In bootstrap, add backcompat for PHPUnit pre-v6.0
* New: Add a few more possible TODO items

_Full changelog is available in [CHANGELOG.md](https://github.com/coffee2code/notifications-for-collapsed-admin-menu/blob/master/CHANGELOG.md)._


== Upgrade Notice ==

= 1.6.2 =
Trivial update: noted compatibility through WP 6.6+, removed unit tests from release packaging, and updated copyright date (2024)

= 1.6.1 =
Trivial update: noted compatibility through WP 6.3+, updated unit tests to run against latest WordPress, and updated copyright date (2023)

= 1.6 =
Minor update: added support for other menu items that may have a count indicator, prevented potential JS errors, noted compatibility through WP 5.8+, and minor reorganization and tweaks to unit tests

= 1.5.1 =
Trivial update: noted compatibility through WP 5.7+ and updated copyright date (2021)

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
