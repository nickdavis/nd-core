<?php
/**
 * ND Core Plugin
 *
 * @package    NickDavis\Core
 * @since      1.0.0
 * @copyright  Copyright (c) 2016, Nick Davis
 * @license    GPL-2.0+
 */
namespace NickDavis\Core;

add_filter( 'get_user_option_admin_color', __NAMESPACE__ . '\set_developer_admin_color_scheme', 5 );
/**
 * Force different admin color scheme when user is developer on development server
 *
 * @link https://gist.github.com/billerickson/654faf38a4eb98842c7c3524fc092d8f
 *
 * @since 1.0.0
 *
 * @param string $color_scheme
 *
 * @return string
 */
function set_developer_admin_color_scheme( $color_scheme ) {
	if ( is_developer() && is_dev_site() ) {
		$color_scheme = 'coffee';
	} else {
		$color_scheme = 'fresh';
	}

	return $color_scheme;
}

/**
 * Check if current user is the developer
 *
 * @since 1.0.0
 * @global array $current_user
 * @return boolean
 */
function is_developer() {
	// Check if user is logged in
	if ( ! is_user_logged_in() ) {
		return false;
	}
	// Approved developer
	$approved = array(
		'iamnickdavis',
		'nick',
	);
	// Get the current user
	$current_user = wp_get_current_user();
	$current_user = strtolower( $current_user->user_login );

	// Check if current user is approved developer
	return in_array( $current_user, $approved );
}

/**
 * Check if current site is a development site
 *
 * @since 1.0.0
 * @return boolean
 */
function is_dev_site() {
	$dev_strings = array( 'staging.', 'localhost', 'dev.', '.dev' );
	$is_dev_site = false;
	foreach ( $dev_strings as $string ) {
		if ( strpos( home_url(), $string ) ) {
			$is_dev_site = true;
		}
	}

	return $is_dev_site;
}
