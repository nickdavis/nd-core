<?php
/**
 * ND Core Plugin
 *
 * @package     NickDavis\Core
 * @since       1.0.0
 * @author      iamnickdavis
 * @link        http://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Core;

if ( class_exists( 'Jetpack' ) ) {
	if ( is_dev_site() ) {
		add_filter( 'jetpack_development_mode', '__return_true' );
	}
}