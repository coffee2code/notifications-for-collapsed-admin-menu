<?php

defined( 'ABSPATH' ) or die();

class Notifications_for_Collapsed_Admin_Menu_Test extends WP_UnitTestCase {

	public function tearDown() {
		wp_dequeue_script( 'notifications-for-collapsed-admin-menu' );
	}


	//
	//
	// DATA PROVIDERS
	//
	//

	public static function get_theme_colors() {
		return array(
			array( 'fresh', '#444' ),
			array( 'light', '#ccc' ),
			array( 'default', '#7c7976' ),
			array( 'unknown', '#7c7976' ),
		);
	}


	//
	//
	// HELPER FUNCTIONS
	//
	//

	private function create_user( $role, $set_as_current = true ) {
		$user_id = $this->factory->user->create( array( 'role' => $role ) );
		if ( $set_as_current ) {
			wp_set_current_user( $user_id );
		}
		return $user_id;
	}


	//
	//
	// TESTS
	//
	//

	public function test_class_exists() {
		$this->assertTrue( class_exists( 'c2c_NotificationsForCollapsedAdminMenu' ) );
	}

	public function test_plugin_version() {
		$this->assertEquals( '1.3.2', c2c_NotificationsForCollapsedAdminMenu::version() );
	}

	public function test_hooks_plugins_loaded() {
		$this->assertEquals( 10, has_filter( 'plugins_loaded', array( 'c2c_NotificationsForCollapsedAdminMenu', 'init' ) ) );
	}

	public function test_hooks_admin_enqueue_scripts() {
		$this->assertEquals( 10, has_action( 'admin_enqueue_scripts', array( 'c2c_NotificationsForCollapsedAdminMenu', 'add_css' ) ) );
		$this->assertEquals( 10, has_action( 'admin_enqueue_scripts', array( 'c2c_NotificationsForCollapsedAdminMenu', 'enqueue_js' ) ) );
	}

	public function test_enqueue_js() {
		c2c_NotificationsForCollapsedAdminMenu::enqueue_js();

		$this->assertTrue( wp_script_is( 'notifications-for-collapsed-admin-menu' ) );
	}

	/**
	 * @dataProvider get_theme_colors
	 */
	public function test_add_css( $theme, $color ) {
		$user_id = $this->create_user( 'author' );
		update_user_option( $user_id, 'admin_color', $theme );

		$expected = <<<HTML
		<style type="text/css">
		.folded #adminmenu li.collapsed-with-pending {
			background-color:{$color};
			border-left-color:{$color};
			border-right-color:{$color};
		}
		</style>

HTML;

		c2c_NotificationsForCollapsedAdminMenu::add_css();
		$this->expectOutputString( $expected );
	}

	/**
	 * @dataProvider get_theme_colors
	 */
	public function test_add_css_with_html5_support( $theme, $color ) {
		$user_id = $this->create_user( 'author' );
		update_user_option( $user_id, 'admin_color', $theme );

		add_theme_support( 'html5', array( 'script', 'style' ) );

		$expected = <<<HTML
		<style>
		.folded #adminmenu li.collapsed-with-pending {
			background-color:{$color};
			border-left-color:{$color};
			border-right-color:{$color};
		}
		</style>

HTML;

		c2c_NotificationsForCollapsedAdminMenu::add_css();
		$this->expectOutputString( $expected );
	}

}
