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

use Yoast_Notification_Center;

/**
 * Don't let Yoast SEO metabox be high priority on Edit Post screen
 *
 * @since 1.0.2
 */
add_filter( 'wpseo_metabox_prio', function () {
	return 'low';
} );

add_action( 'init', __NAMESPACE__ . '\remove_yoastseo_notifications' );
/**
 * Remove Yoast SEO Notifications
 *
* @since 1.0.0
 */
function remove_yoastseo_notifications() {
	if ( ! class_exists( 'Yoast_Notification_Center' ) ) {
		return;
	}

	remove_action( 'admin_notices', array(
		Yoast_Notification_Center::get(),
		'display_notifications'
	) );
	remove_action( 'all_admin_notices', array(
		Yoast_Notification_Center::get(),
		'display_notifications'
	) );
}

add_action( 'wp_before_admin_bar_render', __NAMESPACE__ . '\remove_yoastseo_admin_bar' );
/**
 * Remove Yoast SEO from admin bar
 *
 * @link https://digwp.com/2011/04/admin-bar-tricks/#add-remove-links
 *
* @since 1.0.0
 */
function remove_yoastseo_admin_bar() {
	if ( ! class_exists( 'Yoast_Notification_Center' ) ) {
		return;
	}

	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wpseo-menu' );
}
