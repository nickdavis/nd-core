<?php
/**
 * Plugin Name: ND Core
 * Plugin URI: https://designtowebsite.com
 * Description: Core functionality plugin designed to work with your site specific functionality plugin and theme
 * Version: 1.0.0
 * Author: Nick Davis
 * Author URI: https://designtowebsite.com
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

// Plugin Directory
define( 'ND_DIR', dirname( __FILE__ ) );

require_once( ND_DIR . '/inc/general.php' );
require_once( ND_DIR . '/inc/dev-tools.php' );
//require_once( ND_DIR . '/inc/genesis.php' );
require_once( ND_DIR . '/inc/gravity-forms.php' );
require_once( ND_DIR . '/inc/yoast-seo.php' );
