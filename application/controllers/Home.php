<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		
		
		
		$this->load->helper(array('form'));
		
		$this->load->model('home_model');
		
 	}
	
	public function index(){
		$s = file_exists(APPPATH.'controllers/Installer.php');
	if($s ==1)
	{
		redirect('installer');
	}
		$template['page'] = 'Home/home';
		$template['logo'] = get_settings_details(1);
		$template['page_title'] = ": Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation";
        
		
           
		$this->load->view('template',$template);

		
	}
	public function first_show(){
	unlink(APPPATH.'controllers/Installer.php');
	redirect(base_url());
    }	
	public function auto_search() {
		
		$this->load->view('Home/auto-search');
		
		
	}
	public function get_board_point() {
		$data =  $_POST;
		
		$query = $this->home_model->get_board_point($data);
		//$data = $_POST;
		//$results = $this->model_home->auto_search_product($data);
		print json_encode($query);
		
	}


	/*$scope.clickMe = function(){ 

   $scope.datepicker = null;
 };*/





}
