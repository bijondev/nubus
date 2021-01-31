<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Customer_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}
		
		
    }
	
	  	 public function view_customerdetails(){
			
			  $template['page'] = "customer/view-customer-details";
			  $template['page_title'] = "View Customer Details";
			  $template['data'] = $this->Customer_model->get_customerdetails();
			  $this->load->view('template',$template);
	      } 

       
	  
}