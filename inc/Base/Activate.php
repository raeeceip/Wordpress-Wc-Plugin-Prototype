<?php
/**
 * @package  customPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$default = array();

		if ( ! get_option( 'custom_plugin' ) ) {
			update_option( 'custom_plugin', $default );
		}

		if ( ! get_option( 'custom_plugin_cpt' ) ) {
			update_option( 'custom_plugin_cpt', $default );
		}

		if ( ! get_option( 'custom_plugin_tax' ) ) {
			update_option( 'custom_plugin_tax', $default );
		}
	}
}