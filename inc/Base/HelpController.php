<?php
/**
 * @package  customPlugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
 *
 */
class HelpController extends BaseController
{
    public $callbacks;

    public $subpages = array();

    public function register()
    {
        if ( ! $this->activated( 'chat_manager' ) ) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

        $this->settings->addSubPages( $this->subpages )->register();
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'custom_plugin',
                'page_title' => 'Help Page',
                'menu_title' => 'Help',
                'capability' => 'manage_options',
                'menu_slug' => 'custom_help',
                'callback' => array( $this->callbacks, 'adminHelp' )
            )
        );
    }
}