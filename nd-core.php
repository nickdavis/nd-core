<?php
/**
 * Plugin Name: ND Core
 * Plugin URI: https://github.com/nickdavis/nd-core
 * Description: Core functionality plugin designed to work with your site specific core functionality plugin and your WordPress theme
 * Version: 1.0.1
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

// Plugin Directory
define( 'ND_CORE_DIR', dirname( __FILE__ ) );

require_once( ND_CORE_DIR . '/includes/general.php' );
require_once( ND_CORE_DIR . '/includes/dev-tools.php' );
require_once( ND_CORE_DIR . '/includes/genesis.php' );
require_once( ND_CORE_DIR . '/includes/gravity-forms.php' );
require_once( ND_CORE_DIR . '/includes/jetpack.php' );
require_once( ND_CORE_DIR . '/includes/yoast-seo.php' );
