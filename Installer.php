<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('model_installer');
        
 	}
	public function index(){
		
		$template['page_title'] = ": Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation";
		
		$this->load->view('Installer/installer',$template);
	
	}public function dbconnect()
	{
		$data=$_POST;
		$res=$this->model_installer->db_connect($data);
			if($res == true){
				$finresult = array( 'status'  => 'success','message' => 'Successfully registered','code'    => 'registered');
		
		     print json_encode( $finresult );
			}	 
		
	}
	public function smtp_setup()
	{
		$data=$_POST;
		$res=$this->model_installer->smtp_setup($data);
		if($res == true){
				$finresult = array( 'status'  => 'success','message' => 'Successfully registered','code'    => 'registered');
		
		     print json_encode( $finresult );
			}	
	}
}