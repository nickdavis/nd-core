<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 01/10/2016
 * Time: 17:06
 */

namespace NickDavis\Core;

//add_filter( 'theme_page_templates', 'ideabook_remove_default_genesis_page_templates' );
/**
 * Remove Genesis Page Templates
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/remove-genesis-page-templates
 *
 * @param array $page_templates
 * @return array
 */
function remove_default_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );

	return $page_templates;
}