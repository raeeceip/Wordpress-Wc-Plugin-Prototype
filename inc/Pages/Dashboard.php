<?php 
/**
 * @package  customPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{

	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Account Info' )->register();
	}

	public function setPages()
	{
		$this->pages = array(
			array(
				'page_title' => 'custom Plugin',
				'menu_title' => 'custom',
				'capability' => 'manage_options',
				'menu_slug' => 'custom_plugin',
				'callback' => array( $this->callbacks, 'adminDashboard' ),
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);
	}

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'custom_plugin_settings',
				'option_name' => 'custom_plugin',
				'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
			)
		);

		$this->settings->setSettings( $args );
	}
// if user is logged in show this page

    public function setSections()
	{
		$args = array(
			array(
				'id' => 'custom_admin_index',
				'title' => '<h1 style="color:#FFFFFF">Settings Manager</h1>',
				'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
				'page' => 'custom_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array();

		foreach ( $this->managers as $key => $value ) {
			$args[] = array(
				'id' => $key,
				'title' => $value,
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'custom_plugin',
				'section' => 'custom_admin_index',
				'args' => array(
					'option_name' => 'custom_plugin',
					'label_for' => $key,
					'class' => 'ui-toggle'
				)
			);
		}

		$this->settings->setFields( $args );
	}
}

