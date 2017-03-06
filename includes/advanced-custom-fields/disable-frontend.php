<?php
/**
 * Disable Advanced Custom Fields on frontend
 *
 * @package    NickDavis\Core\AdvancedCustomFields
 * @since      1.0.0
 * @copyright  Copyright (c) 2016, Nick Davis
 * @license    GPL-2.0+
 */
namespace NickDavis\Core\AdvancedCustomFields;

add_filter( 'option_active_plugins', __NAMESPACE__ . '\disable_acf_on_frontend' );
/**
 * Disable Advanced Custom Fields on frontend
 *
 * Provides a performance boost if ACF frontend functions aren't being used
 *
 * @link https://gist.github.com/billerickson/ed27edc8d06ae137d4f245bdf16610b1
 *
 * @since 1.0.0
 */
function disable_acf_on_frontend( $plugins ) {
	if ( is_admin() ) {
		return $plugins;
	}
	foreach ( $plugins as $i => $plugin ) {
		if ( 'advanced-custom-fields-pro/acf.php' == $plugin ) {
			unset( $plugins[ $i ] );
		}
	}

	return $plugins;
}
