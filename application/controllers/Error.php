<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
 	}
	
	public function index()
	{
		
		$template['page'] = "404";
		
		$template['logo'] = get_settings_details(1);
		$this->load->view('Notfound/notfound', $template);
	}
	
	
}
