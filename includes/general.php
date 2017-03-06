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

add_filter( 'http_request_args', __NAMESPACE__ . '\dont_update_core_func_plugin', 5, 2 );
/**
 * Dont Update the Plugin
 * If there is a plugin in the repo with the same name, this prevents WP from prompting an update.
 *
 * @since  1.0.0
 * @author Jon Brown
 *
 * @param  array $r Existing request arguments
 * @param  string $url Request URL
 *
 * @return array Amended request arguments
 */
function dont_update_core_func_plugin( $r, $url ) {
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/plugins/update-check/1.1/' ) ) {
		return $r;
	} // Not a plugin update request. Bail immediately.
	$plugins = json_decode( $r['body']['plugins'], true );
	unset( $plugins['plugins'][ plugin_basename( __FILE__ ) ] );
	$r['body']['plugins'] = json_encode( $plugins );

	return $r;
}

add_action( 'init', __NAMESPACE__ . '\add_excerpts_to_pages' );
/**
 * Description.
 *
 * @since 1.0.2
 *
 * @return void
 */
function add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
