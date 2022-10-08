<?php
/**
 * @package  customPlugin
 */
namespace Inc\Api;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;

class RestRoutes
{
    public $methods;
    public $callbacks;
    public $data = array();
    public $permissions_callback;
    public $request;
    public $user;
    public $password;
    public $password_2;
    public $email;
    public function register()
    {
        add_action('rest_api_init',array($this, 'register_login_hooks'));
        add_action('rest_api_init',array($this, 'register_signup_hooks'));
        add_action('rest_api_init',array($this, 'register_store_hooks'));
    }
    public function register_login_hooks() {
        register_rest_route( 'custom/v1', '/login', array(
            'methods' => 'GET',
            'permissions_callback' => '__return_true',
            'callback' =>  array($this,'custom_login'),
        ) );
    }
   public function custom_login(){
            $data="";
            $response= wp_remote_get("https://restcountries.com/v3.1/all", $args=array(
                'method' => 'GET',
            ));
            $body = wp_remote_retrieve_body( $response );
            $data = json_decode( $body );
            return $data;
            // redirect to the store page
            wp_redirect( admin_url( 'admin.php?page=custom_plugin' ) );
            exit;
    }

    public function register_signup_hooks() {
        register_rest_route( 'custom/v1', '/signup', array(
            'methods' => 'POST',
            'callback' =>  array($this,'custom_signup'),
        ) );
    }
    public function custom_signup($request) {
        $response = wp_remote_post( 'https://webhook.site/84f7d912-f41b-4b4e-b1d1-d8354fb34487', array(
            'method' => 'POST',
            'body' => array(
                'user' => isset( $_POST["username"] ) ? $_POST["username"] : "visitor",
                'password' => isset( $_POST["password"] ) ? $_POST["password"] : "visitor",
               'password_2' => isset( $_POST["password_2"] ) ? $_POST["password_2"] : "visitor",
               'email' => isset( $_POST["email"] ) ? $_POST["email"] : "visitor",

            ),
        ) );
        // check if response is ok
        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();
            echo "Something went wrong: $error_message";
        } else {
            echo 'Response:<pre>';
            print_r( $response );
            echo '</pre>';
        }
        if ( $response->success ) {
            // redirect to dashboard
            wp_redirect( admin_url( 'admin.php?page=custom_plugin' ) );
            exit;
        } else {
            // redirect to signup page
            wp_redirect( admin_url( 'admin.php?page=custom_signup' ) );
            exit;
        }
    }

    public function register_store_hooks()
    {
        register_rest_route( 'custom/v1', '/store', array(
            'methods' => 'POST',
            'callback' =>  array($this,'custom_store'),
        ) );
    }
    public function custom_store($request) {
        // get form data from store page request
        $data = array(
            'name' => $_POST['store_name'],
            'website_url' => $_POST['store_url'],
            'category' => $_POST['store_category'],
            'sub_category' => $_POST['store_sub_category'],
            'store_question_1' => $_POST['store_question_1'],
            'store_country' => $_POST['store_country'],
            'store_question_2' => $_POST['store_question_2'],
        );
        // send form data to custom api (when ready)
        $response = wp_remote_post( 'https://webhook.site/84f7d912-f41b-4b4e-b1d1-d8354fb34487', array(
            'method' => 'POST',
            'body' => $data,
        ) );
        // check if response is ok
        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();
            echo "Something went wrong: $error_message";
        } else {
            echo 'Response:<pre>';
            print_r( $response );
            echo '</pre>';
        }
        if ( $data->success ) {
            // redirect to dashboard
            wp_redirect( admin_url( 'admin.php?page=custom_plugin' ) );
            exit;
        } else {
            // redirect to store page
            wp_redirect( admin_url( 'admin.php?page=custom_store' ) );
            exit;
        }
    }

}


