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

add_filter( 'gform_notification', __NAMESPACE__ . '\gravityforms_domain', 10, 3 );
/**
 * Gravity Forms Domain
 *
 * Adds a notice at the end of admin email notifications
 * specifying the domain from which the email was sent.
 *
 * @since 1.0.0
 *
 * @param array $notification
 * @param object $form
 * @param object $entry
 * @return array $notification
 */
function gravityforms_domain( $notification, $form, $entry ) {

	if( $notification['name'] == 'Admin Notification' ) {
		$notification['message'] .= 'Sent from ' . home_url();
	}

	return $notification;
}
