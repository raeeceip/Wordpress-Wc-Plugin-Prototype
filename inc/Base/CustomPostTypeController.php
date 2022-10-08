<?php 
/**
 * @package  customPlugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\CptCallbacks;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
// add woocommerce support

class CustomPostTypeController extends BaseController
{
    public $settings;

    public $callbacks;

    public $cpt_callbacks;


    public $subpages = array();

    public $custom_post_types = array();

    public function register()
    {
        if (!$this->activated('cpt_manager')) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->cpt_callbacks = new CptCallbacks();

        $this->setSubpages();

        $this->setSettings();

        $this->settings->addSubPages($this->subpages)->register();


        if (!empty($this->custom_post_types)) {
            add_action('init', array($this, 'registerCustomPostTypes'));
        }
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'custom_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'My Products',
                'capability' => 'manage_options',
                'menu_slug' => 'custom_products',
                'callback' => array($this->callbacks, 'adminCpt')
            )
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'custom_plugin_cpt_settings',
                'option_name' => 'custom_plugin_cpt',
                'callback' => array($this->cpt_callbacks, 'cptSanitize')
            )
        );

        $this->settings->setSettings($args);
    }
}




