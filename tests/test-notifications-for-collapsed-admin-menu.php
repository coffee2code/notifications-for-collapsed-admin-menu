<?php

defined( 'ABSPATH' ) or die();

class Notifications_for_Collapsed_Admin_Menu_Test extends WP_UnitTestCase {

	//
	//
	// HELPER FUNCTIONS
	//
	//


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

}
