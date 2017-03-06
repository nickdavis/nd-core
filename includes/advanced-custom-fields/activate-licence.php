<?php
/**
 * Pull ACF licence key from wp-config.php after WP Migrate DB update
 *
 * @package     NickDavis\Core\AdvancedCustomFields
 * @since       1.0.6
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Core\AdvancedCustomFields;

add_action( 'wpmdb_migration_complete', __NAMESPACE__ . '\activate_acf_license_key_from_wp_config' );
/**
 * Pull ACF licence key from wp-config.php after WP Migrate DB update
 *
 * @link https://gist.github.com/jacobdubail/d5b5e76e6daca8a3258518fe710ed102
 * @link https://support.advancedcustomfields.com/forums/topic/pro-license-key-in-config/
 *
 * @since 1.0.6
 *
 * @return void
 */
function activate_acf_license_key_from_wp_config() {
	if ( get_option( 'acf_pro_license' ) || ! defined( 'ACF_LICENSE_KEY' ) ) {
		return;
	}

	$save = array(
		'key' => ACF_LICENSE_KEY,
		'url' => home_url()
	);

	$save = maybe_serialize( $save );
	$save = base64_encode( $save );

	update_option( 'acf_pro_license', $save );
}
