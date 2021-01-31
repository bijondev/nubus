<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printsms extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		
 	}
	public function index(){
		$template['page'] = 'Printsms/printsms';
		$template['page_title'] = ":Print Ticket/SMS | Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation";
		$template['logo'] = get_settings_details(1);
		$this->load->view('template',$template);
	
	}
}