<?php

defined( 'ABSPATH' ) or die();

class Notifications_for_Collapsed_Admin_Menu_Test extends WP_UnitTestCase {

	public function tearDown(): void {
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

	public function filter_c2c_collapsed_admin_menu_icon_highlight_color( $color, $admin_color = '' ) {
		return 'blue' === $admin_color ? '#fff' : '#000';
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
		$this->assertEquals( '1.7', c2c_NotificationsForCollapsedAdminMenu::version() );
	}

	public function test_hooks_plugins_loaded() {
		$this->assertEquals( 10, has_filter( 'plugins_loaded', array( 'c2c_NotificationsForCollapsedAdminMenu', 'init' ) ) );
	}

	public function test_unable_to_instantiation_object_from_class() {
		$this->expectException( Error::class );
		new c2c_NotificationsForCollapsedAdminMenu;
	}

	public function test_unable_to_unserialize_an_instance_of_the_class() {
		$this->expectException( Error::class );
		$data = 'O:38:"c2c_NotificationsForCollapsedAdminMenu":0:{}';

		unserialize( $data );
	}

	public function test_hooks_admin_enqueue_scripts() {
		$this->assertEquals( 10, has_action( 'admin_enqueue_scripts', array( 'c2c_NotificationsForCollapsedAdminMenu', 'add_css' ) ) );
		$this->assertEquals( 10, has_action( 'admin_enqueue_scripts', array( 'c2c_NotificationsForCollapsedAdminMenu', 'enqueue_js' ) ) );
	}

	/*
	 * get_bg_color()
	 */

	public function test_get_bg_color_default() {
		$this->assertEquals( '#7c7976', c2c_NotificationsForCollapsedAdminMenu::get_bg_color() );
	}

	/**
	 * @dataProvider get_theme_colors
	 */
	public function test_get_bg_color( $theme, $color ) {
		$user_id = $this->create_user( 'author' );
		update_user_option( $user_id, 'admin_color', $theme );

		$this->assertEquals( $color, c2c_NotificationsForCollapsedAdminMenu::get_bg_color() );
	}

	/**
	 * @dataProvider get_theme_colors
	 */
	public function test_get_bg_color_with_explicit_color( $theme, $color ) {
		$this->assertEquals( $color, c2c_NotificationsForCollapsedAdminMenu::get_bg_color( $theme ) );
	}

	/*
	 * filter: c2c_collapsed_admin_menu_icon_highlight_color
	 */

	public function test_filter_c2c_collapsed_admin_menu_icon_highlight_color() {
		add_filter( 'c2c_collapsed_admin_menu_icon_highlight_color', array( $this, 'filter_c2c_collapsed_admin_menu_icon_highlight_color' ) );

		$this->assertEquals( '#000', c2c_NotificationsForCollapsedAdminMenu::get_bg_color() );

		remove_filter( 'c2c_collapsed_admin_menu_icon_highlight_color', array( $this, 'filter_c2c_collapsed_admin_menu_icon_highlight_color' ) );
	}

	public function test_filter_c2c_collapsed_admin_menu_icon_highlight_color_second_arg() {
		add_filter( 'c2c_collapsed_admin_menu_icon_highlight_color', array( $this, 'filter_c2c_collapsed_admin_menu_icon_highlight_color' ), 10, 2 );

		$this->assertEquals( '#fff', c2c_NotificationsForCollapsedAdminMenu::get_bg_color( 'blue' ) );

		remove_filter( 'c2c_collapsed_admin_menu_icon_highlight_color', array( $this, 'filter_c2c_collapsed_admin_menu_icon_highlight_color' ) );
	}

	/*
	 * enqueue_js()
	 */

	public function test_enqueue_js() {
		c2c_NotificationsForCollapsedAdminMenu::enqueue_js();

		$this->assertTrue( wp_script_is( 'notifications-for-collapsed-admin-menu', 'registered' ) );
		$this->assertTrue( wp_script_is( 'notifications-for-collapsed-admin-menu', 'enqueued' ) );
	}

	/*
	 * add_css()
	 */

	/**
	 * @dataProvider get_theme_colors
	 */
	public function test_add_css( $theme, $color ) {
		$user_id = $this->create_user( 'author' );
		update_user_option( $user_id, 'admin_color', $theme );

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

	public function test_add_css_when_filter_returns_markup() {
		$user_id = $this->create_user( 'author' );
		update_user_option( $user_id, 'admin_color', 'fresh' );
		$expected_color = '#dede';

		add_filter( 'c2c_collapsed_admin_menu_icon_highlight_color', function ( $color ) use ( $expected_color ) {
			return "<script>alert('Danger');</script>" . $expected_color;
		} );

		$expected = <<<HTML
<style>
.folded #adminmenu li.collapsed-with-pending {
	background-color:{$expected_color};
	border-left-color:{$expected_color};
	border-right-color:{$expected_color};
}
</style>

HTML;

		c2c_NotificationsForCollapsedAdminMenu::add_css();
		$this->expectOutputString( $expected );
	}

}
