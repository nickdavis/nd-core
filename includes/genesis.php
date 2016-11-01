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

add_filter( 'theme_page_templates', __NAMESPACE__ . '\remove_default_genesis_page_templates' );
/**
 * Remove Genesis Page Templates
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/remove-genesis-page-templates
 *
 * @since 1.0.0
 *
 * @param array $page_templates
 * @return array
 */
function remove_default_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );

	return $page_templates;
}
