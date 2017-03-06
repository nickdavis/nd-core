<?php
/**
 * Plugin Name: ND Core
 * Plugin URI: https://github.com/nickdavis/nd-core
 * Description: Core functionality plugin designed to work with your site specific core functionality plugin and your WordPress theme
 * Version: 1.0.5
 * Author: Nick Davis
 * Author URI: https://iamnickdavis.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

namespace NickDavis\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

/**
 * Setup the plugin's constants.
 *
 * @since 1.0.6
 *
 * @return void
 */
function init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );

	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'ND_CORE_URL', $plugin_url );
	define( 'ND_CORE_DIR', plugin_dir_path( __DIR__ ) );
}

/**
 * Initialize the plugin hooks
 *
 * @since 1.0.6
 *
 * @return void
 */
function init_hooks() {
	register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );
	register_uninstall_hook( __FILE__, __NAMESPACE__ . '\uninstall_plugin' );
}

/**
 * Plugin activation handler
 *
 * @since 1.0.6
 *
 * @return void
 */
function activate_plugin() {
	init_autoloader();
}

/**
 * The plugin is deactivating.  Delete out the rewrite rules option.
 *
 * @since 1.0.6
 *
 * @return void
 */
function deactivate_plugin() {

}

/**
 * Uninstall plugin handler
 *
 * @since 1.0.6
 *
 * @return void
 */
function uninstall_plugin() {

}

/**
 * Kick off the plugin by initializing the plugin files.
 *
 * @since 1.0.6
 *
 * @return void
 */
function init_autoloader() {
	require_once( 'includes/general.php' );
	require_once( 'includes/advanced-custom-fields/disable-frontend.php' );
	require_once( 'includes/dev-tools.php' );
	require_once( 'includes/genesis.php' );
	require_once( 'includes/gravity-forms.php' );
	require_once( 'includes/jetpack.php' );
	require_once( 'includes/yoast-seo.php' );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\launch', 0 );
/**
 * Launch the plugin
 *
 * @since 1.0.6
 *
 * @return void
 */
function launch() {
	init_autoloader();
}

init_constants();
init_hooks();
