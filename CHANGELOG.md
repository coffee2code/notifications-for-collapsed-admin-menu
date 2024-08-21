# Changelog

## _(in-progress)_
* Fix: Fix formatting of code in `readme.txt`
* Change: Note compatibility through WP 6.6+
* Change: Update copyright date (2024)
* Unit tests:
    * Hardening: Prevent direct web access to `bootstrap.php`
    * Change: In bootstrap, store path to plugin directory in a constant

## 1.6.1 _(2023-06-06)_
* Change: Note compatibility through WP 6.3+
* Change: Update copyright date (2023)
* New: Add `.gitignore` file
* Unit tests:
    * Allow tests to run against current versions of WordPress
    * New: Add `composer.json` for PHPUnit Polyfill dependency
    * Change: Prevent PHP warnings due to missing core-related generated files

## 1.6 _(2021-10-22)_

### Highlights:

This minor release adds support for other menu items that may have a count indicator, prevents potential JS errors, notes compatibility through WP 5.8+, and minor reorganization and tweaks to unit tests.

### Details:

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

## 1.5.1 _(2021-04-12)_
* Change: Note compatibility through WP 5.7+
* Change: Update copyright date (2021)

## 1.5 _(2020-09-01)_

### Highlights:

This minor update features a rewrite of the JavaScript to use vanilla JS instead of jQuery, restructures the unit test file structure, notes compatibility through WP 5.5+, and a few behind-the-scenes changes.

### Details:

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

## 1.4.1 _(2020-05-26)_
* New: Add TODO.md and move existing TODO list from top of main plugin file into it (and add to it)
* Change: Use HTTPS for link to WP SVN repository in bin script for configuring unit tests (and delete commented-out code)
* Change: Note compatibility through WP 5.4+
* Change: Update links to coffee2code.com to be HTTPS
* Change: Unit tests: Add comments to act as section labels for unit tests

## 1.4 _(2019-12-14)_
* New: Add HTML5 compliance by omitting `type` attribute when the theme explicitly supports 'html5'
* New: Extract code to determine admin menu item notification background color into `get_bg_color()`
* New: Add CHANGELOG.md file and move all but most recent changelog entries into it
* New: Add unit testing
* Fix: Correct typo in GitHub URL
* Change: Allow class to be defined outside of admin context
* Change: Note compatibility through WP 5.3+
* Change: Update copyright date (2020)
* Change: Split paragraph in README.md's "Support" section into two

## 1.3.2 _(2019-02-28)_
* New: Add inline documentation for hook
* Change: Initialize plugin on 'plugins_loaded' action instead of on load
* Change: Merge `do_init()` into `init()`
* Change: Removed unnecessary global variable
* Change: Note compatibility through WP 5.1+
* Change: Update copyright date (2019)
* Change: Update License URI to be HTTPS

## 1.3.1 _(2018-05-11)_
* New: Add README.md
* Change: Add GitHub link to readme
* Change: Note compatibility through WP 4.9+
* Change: Update copyright date (2018)

## 1.3 _(2017-02-23)_
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

## 1.2.2 _(2016-01-30)_
* New: Define 'Text Domain' plugin header attribute.
* New: Create empty index.php to prevent files from being listed if web server has enabled directory listings.
* Change: Minor tweak to how the JavaScript file path is defined for enqueuing.
* Change: Note compatibility through WP 4.4+.
* Change: Update copyright date (2016).

## 1.2.1 _(2015-02-25)_
* Reformat plugin header
* Minor code reformatting (spacing, bracing)
* Change documentation links to w.org to be https
* Minor documentation spacing changes throughout
* Note compatibility through WP 4.1+
* Update copyright date (2015)
* Add plugin icon

## 1.2 _(2013-12-18)_
* Detect WP 3.8 and determine default background colors based on the chosen admin color theme
* Minor code tweaks (spacing)
* Note compatibility through WP 3.8+
* Update copyright date (2014)
* Change donate link
* Update banner image to reflect WP 3.8 admin refresh
* Update screenshot to reflect WP 3.8 admin refresh

## 1.1.3
* Add check to prevent execution of code if file is directly accessed
* Note compatibility through WP 3.5+
* Update copyright date (2013)
* Move screenshot into repo's assets directory

## 1.1.2
* Re-license as GPLv2 or later (from X11)
* Add 'License' and 'License URI' header tags to readme.txt and plugin file
* Remove ending PHP close tag
* Update screenshot for WP 3.4
* Minor readme.txt changes
* Note compatibility through WP 3.4+

## 1.1.1
* Hook `admin_enqueue_scripts` action instead of `admin_head` to output CSS
* Add `version()` to return plugin version
* Note compatibility through WP 3.3+
* Add link to plugin directory page to readme.txt
* Update copyright date (2012)

## 1.1
* Add admin color scheme-specific color defaults
* Improve CSS by making selector more specific in order to eliminate !important clauses
* Detect changed id/class selectors in jQuery and use WP 3.2 appropriate ids/classes
* Explicitly enqueue jQuery
* Note compatibility through WP 3.2+
* Minor documentation reformatting in readme.txt
* Fix plugin homepage and author links in description in readme.txt

## 1.0.1
* Fix bug with incorrect pending comment count when comment menu has submenu item(s)
* Explicitly declare all class function public static
* Note compatibility through WP 3.1+
* Update copyright date (2011)

## 1.0
* Initial release
