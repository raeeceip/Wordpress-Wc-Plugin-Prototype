<?php 
/**
 * @package  customPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminCpt()
	{
		return require_once( "$this->plugin_path/templates/cpt.php" );
	}

	public function adminAuth()
	{
        return require_once( "$this->plugin_path/templates/signup.php" );
	}
	public function adminLogin()
	{
        return require_once( "$this->plugin_path/templates/login.php" );
	}

	public function adminChat()
	{
        return require_once( "$this->plugin_path/templates/contact-form.php" );
	}
    public function admincustom()
	{
        return require_once( "$this->plugin_path/templates/Custom-Products.php" );
	}
    public function adminHelp()
	{
        return require_once( "$this->plugin_path/templates/help.php" );
	}
	public function adminSearchResults()
	{
		return require_once( "$this->plugin_path/templates/search.php" );
	}
	public function adminCreateStore()
	{
		return require_once( "$this->plugin_path/templates/create-store.php" );
	}

}