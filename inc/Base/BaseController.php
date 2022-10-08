<?php 
/**
 * @package  customPlugin
 */
namespace Inc\Base;

class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public $managers = array();

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/custom-plugin.php';

		$this->managers = array(
			'cpt_manager' => '<p class="font-raleway color-white">Activate Product Manager</p>',
            'help_manager' => '<p class="font-raleway color-white">Activate Help Manager</p>',
			'login_manager' => '<p class="font-raleway color-white">Activate Login/Signup</p>',
            'custom_products_manager' => '<p class="font-raleway color-white">Activate custom Products Manager</p>',
			'chat_manager' => '<p class="font-raleway color-white">Activate ContactUs Page</p>'
		);
	}

	public function activated( string $key )
	{
		$option = get_option( 'custom_plugin' );

		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}
}