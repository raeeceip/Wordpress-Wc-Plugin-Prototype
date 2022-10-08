<?php
/**
 * @package customPlugin
Plugin Name: Custom Plugin
Plugin URI: http://custom.com/plugin
Description: Adding functionality of custom platform onto Wordpress..
Version: 1.0.0
Author: Chibogu Chisom Raphael
Author URI: http://custom.com
License: GPLv2 or later
Text Domain: Custom-plugin
 */
/*

*/



// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_custom_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_custom_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_custom_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_custom_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::registerServices();
}