<?php
/*
Plugin Name: Plugin Reload
Description: Enables you to deactivate+activate a plugin with one click. Mainly for plugin developers.
Plugin URI:  http://github.com/shadyvb/plugin-reload
Version:     1.0-dev2
Author:      Shady Sharaf
Author URI:  http://sharaf.me
*/

function wa_plugin_reload_script($hook) {
		wp_enqueue_script( 'plugin-reload', plugin_dir_url(__FILE__) . '/plugin-reload.js' );
}
add_action('admin_print_scripts-plugins.php', 'wa_plugin_reload_script');

function wa_plugin_reload() {
	$plugin = $_GET['plugin'];
	deactivate_plugins($plugin);
	activate_plugins($plugin);
	wp_redirect($_SERVER['HTTP_REFERER']);
	exit;
}
add_action('wp_ajax_plugin-reload', 'wa_plugin_reload');