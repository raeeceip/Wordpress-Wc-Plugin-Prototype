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
class SignUpController extends BaseController
{
    public $callbacks;
    public $permissions_callback;
    public $methods;
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
                'parent_slug' => 'custom_plugin',
                'page_title' => 'Signup',
                'menu_title' => 'Signup',
                'capability' => 'manage_options',
                'menu_slug' => 'custom_signup',
                'callback' => array( $this->callbacks, 'adminAuth' )
            )
        );
        // set another subpage for store creation
        $this->subpages[] = array(
            'parent_slug' => 'null',
            'page_title' => 'Create Store',
            'menu_title' => 'Create Store',
            'capability' => 'manage_options',
            'menu_slug' => 'custom_create_store',
            'callback' => array( $this->callbacks, 'adminCreateStore' )
        );

    }
}
