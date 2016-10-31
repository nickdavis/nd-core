<?php
/**
 * ND Core Plugin
 *
 * @package    CoreFunctionality
 * @since      1.0.0
 * @copyright  Copyright (c) 2016, Nick Davis
 * @license    GPL-2.0+
 */

namespace NickDavis\Core;

add_filter( 'http_request_args', 'dont_update_core_func_plugin', 5, 2 );
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


// Use shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Pretty Printing
 *
 * @author Chris Bratlien
 *
 * @param mixed
 *
 * @return null
 */
function pretty_printing( $obj, $label = '' ) {

	$data = json_encode( print_r( $obj, true ) );
	?>
	<style type="text/css">
		#bsdLogger {
			position: absolute;
			top: 30px;
			right: 0px;
			border-left: 4px solid #bbb;
			padding: 6px;
			background: white;
			color: #444;
			z-index: 999;
			font-size: 1.25em;
			width: 400px;
			height: 800px;
			overflow: scroll;
		}
	</style>
	<script type="text/javascript">
		var doStuff = function () {
			var obj = <?php echo $data; ?>;
			var logger = document.getElementById('bsdLogger');
			if (!logger) {
				logger = document.createElement('div');
				logger.id = 'bsdLogger';
				document.body.appendChild(logger);
			}
			////console.log(obj);
			var pre = document.createElement('pre');
			var h2 = document.createElement('h2');
			pre.innerHTML = obj;

			h2.innerHTML = '<?php echo addslashes( $label ); ?>';
			logger.appendChild(h2);
			logger.appendChild(pre);
		};
		window.addEventListener("DOMContentLoaded", doStuff, false);

	</script>
	<?php
}


add_filter( 'mce_buttons_2', 'nd_mce_buttons_2' );
/**
 * [wpb_mce_buttons_2 description]
 *
 *  Change filter to mce_buttons_2 or mce_buttons_3 to add button to second or third row
 *
 * @param  [type] $buttons [description]
 *
 * @return [type]          [description]
 */
function nd_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}

// Attach callback to 'tiny_mce_before_init'.
add_filter( 'tiny_mce_before_init', 'nd_mce_before_init_insert_formats' );
/**
 * Callback function to filter the MCE settings
 *
 * @link http://www.billerickson.net/shortcode-ui-with-shortcake/
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-add-custom-styles-to-wordpress-visual-editor/
 */
function nd_mce_before_init_insert_formats( $init_array ) {

	// Define the style_formats array.
	$style_formats = array(
		// Each array child is a format with it's own settings.
		array(
			'title'   => 'Button Black',
			'block'   => 'a',
			'classes' => 'button-black',
			'wrapper' => true,
		),
		array(
			'title'   => 'Button Gray',
			'block'   => 'a',
			'classes' => 'button-gray',
			'wrapper' => true,
		),
		array(
			'title'   => 'Button White',
			'block'   => 'a',
			'classes' => 'button-white',
			'wrapper' => true,
		),
		array(
			'title'   => 'Caption',
			'block'   => 'span',
			// Note, p tag won't work here because WordPress removes it
			'classes' => 'wp-caption-text',
			'wrapper' => true,
		),
		array(
			'title'   => 'Cite',
			'block'   => 'cite',
			'classes' => '',
			'wrapper' => true,
		),
		array(
			'title'   => '"Go" Link',
			'block'   => 'a',
			'classes' => 'golink',
			'wrapper' => true,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'.
	$init_array['style_formats'] = wp_json_encode( $style_formats );

	return $init_array;
}
