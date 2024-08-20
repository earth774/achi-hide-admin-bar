<?php

/**
 * Setup Hide Admin Bar.
 *
 * @package Hide_Admin_Bar
 */

namespace Achi\HideAdminBar;

/**
 * Setup Hide Admin Bar.
 */
class Setup
{

	/**
	 * Whether to remove admin bar for current user.
	 *
	 * @var bool
	 */
	public static $remove_admin_bar = false;

	/**
	 * The class instance.
	 *
	 * @var object
	 */
	public static $instance;

	/**
	 * Get instance of the class.
	 */
	public static function get_instance()
	{

		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Init the class setup.
	 */
	public static function init()
	{

		self::$instance = new self();

		add_action('plugins_loaded', array(self::$instance, 'setup'));
	}


	/**
	 * Setup action & filters.
	 */
	public function setup()
	{

		add_action('admin_menu', array($this, 'hsab_admin_menu'));

		add_action('admin_init', array($this, 'hsab_register_settings'));

		add_filter('show_admin_bar', array($this, 'hide_show_admin_bar'), 20);
	}

	// Add a menu page for the plugin
	function hsab_admin_menu()
	{
		if (current_user_can('administrator')) {
			add_options_page(
				'Hide and Show Admin Bar', // Page title
				'Admin Bar Settings', // Menu title
				'manage_options', // Capability
				'hsab-settings', // Menu slug
				array($this, 'hsab_settings_page') // Function to display the settings page
			);
		}
	}

	// Display the settings page
	public function hsab_settings_page()
	{
		require_once(plugin_dir_path(__FILE__) . 'templates/settings-page.php');
	}

	// Register settings
	public function hsab_register_settings()
	{
		$roles = get_all_roles();
		foreach ($roles as $role_key => $role) {
			register_setting('hsab-settings-group', 'hsab_hide_admin_bar_role'.$role_key);
		}
		
	}


	public function hide_show_admin_bar($show)
	{
		// Usage example
		$current_user_roles = get_current_user_roles();
		foreach ($current_user_roles as $role) {
			if (!get_option('hsab_hide_admin_bar_role' . $role)) {
				return true;
			}
		}

		// Hide admin bar for all other users
		return false;
	}
}
