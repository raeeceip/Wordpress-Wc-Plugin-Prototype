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

// register this page but don't add it to the admin submenu


class LoginController extends BaseController
{
    public $callbacks;

    public $subpages = array();

    public function register()
    {
        if ( ! $this->activated( 'login_manager' ) ) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

        $this->settings->addSubPages( $this->subpages )->register();
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'null',
                'page_title' => 'Login',
                'menu_title' => 'Login',
                // make hidden
                'capability' => 'manage_options',
                'menu_slug' => 'custom_login',
                'callback' => array( $this->callbacks, 'adminLogin' )
            )
        );
   

    }
}