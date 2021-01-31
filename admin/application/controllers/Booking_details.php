<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Booking_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}
		
		
    }
	
	  	 public function view_bookingdetails(){
			
			  $template['page'] = "Bookingdetails/view-booking-details";
			  $template['page_title'] = "View Booking Details";
			  $template['data'] = $this->Booking_model->get_bookindetails();
			  $this->load->view('template',$template);
	      } 

         public function view_bookingpopup(){
		 
		  $id=$_POST['bookingdetailsget'];
		  $template['data'] = $this->Booking_model->view_popup_booking($id);
		  echo $this->load->view('Bookingdetails/view-booking-popup',$template);
		 
	    }	
	
	  
}