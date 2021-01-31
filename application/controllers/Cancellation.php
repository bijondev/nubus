<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancellation extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('cancel_model');

		
 	}
	public function index(){
		$template['page'] = 'Cancellation/cancellation';
		$template['page_title'] = ":Cancel your Bus Tickets  | Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation";
		$template['logo'] = get_settings_details(1);
		
		$this->load->view('template',$template);
	
	}
	public function cancelation_ticket()
	{
		
		
		$data = $_POST;
	/*	$emailcheck=$this->cancel_model->cancel_email($data['username']);
		{}*/

		$result = $this->cancel_model->cancelation_ticket($data);
		
		if($result){
			 $finresult = array( 'status'  => 'success','message' =>'Successfully Ticket Canceled', 'code'    => 'Success');	
				}else{
					$finresult = array( 'status'  => 'failed','message' => 'Invalid Ticket Number or Email Id Doesnot Match', 'code'    => 'Invalid Ticket' );	 
		}
		print json_encode($finresult);
	 }
		

}