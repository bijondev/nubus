<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Rating_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}
		


    }
	
	 public function view_ratingdetails(){
		 
		 $template['page'] = "Rating/view-rating-details";
		 $template['page_title'] = "View Rating";
		 $template['data'] = $this->Rating_model->get_taing_details();
		 $this->load->view('template',$template);
	 }
	 
	   //pop up view Rating Details
	 public function ratingdetails_view(){
		
	           $id=$_POST['getratingdetails'];
	           $template['result'] = $this->Rating_model->get_ratingpopupdetails($id);

	           echo $this->load->view('Rating/view-rating-popup',$template);
		 
         }
	
	
	
}