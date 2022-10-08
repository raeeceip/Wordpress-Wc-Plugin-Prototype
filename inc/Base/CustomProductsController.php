<?php

namespace Inc\Base;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\CptCallbacks;
use Inc\Api\SettingsApi;
use Inc\Api\RestRoutes;

class customProductsController extends BaseController
{
    public $settings;

    public $callbacks;

    public $cpt_callbacks;

    public $rest_routes;

    public $subpages = array();

    public $custom_post_types = array();

    public function register()
    {
        if (!$this->activated('custom_products_manager')) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->cpt_callbacks = new CptCallbacks();

        $this->rest_routes = new RestRoutes();
    
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
                'menu_title' => 'custom Dashboard',
                'capability' => 'manage_options',
                'menu_slug' => 'my_custom_products',
                'callback' => array($this->callbacks, 'admincustom')
            )
        );
        // create admin search page
        $this->subpages[] = array(
            'parent_slug' => 'null',
            'page_title' => 'Search',
            'menu_title' => 'Search',
            'capability' => 'manage_options',
            'menu_slug' => 'custom_search_results',
            'callback' => array($this->callbacks, 'adminSearchResults')
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
