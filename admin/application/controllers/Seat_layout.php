<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat_layout extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();	
	
	      date_default_timezone_set("Asia/Kolkata");
		  
		  $this->load->model('model_seat');		
		   
		  //$this->load->library('image_lib');
		  
		 
		  
	}
	public function index()
	{
		$template['page'] = "seat-layout-test";
		$template['page_title'] = "Seat Layout";
		$template['data'] = "Seat layout";
		$this->load->view('seat-layout-test', $template);
	}
	
	   
   public function test()
	{
		$template['page'] = "seat-layout-test";
		$template['page_title'] = "Seat Layout";
		$template['data'] = "Seat layout";
		$this->load->view('template', $template);
	}
	public function add_seat()
	{
		$request= file_get_contents("php://input");
		$data = json_decode($request);
		
		$result = $this->model_seat->deatils($data);
		
		if($result == true){
				$finresult = array( 'status'  => 'success','message' => 'Successfully registered','code'    => 'registered');
		
		     print json_encode( $finresult );
			}	else{
				$finresult = array( 'status'  => 'failed','message' => 'Successfully registered','code'    => 'registered');
		
		     print json_encode( $finresult );
				
			}
	}
	public function get_results()
	{
		
		
		$result = $this->model_seat->get_label();
		
		print json_encode($result);
	}
	public function exist()
	{
		$request= file_get_contents("php://input");
		$data = json_decode($request);
		
		$result = $this->model_seat->exist($data);
		
		print json_encode($result);
	}
	
	public function layout()
	{
		$template['page'] = "layout";
		$id = $this->uri->segment("3");
		$template['page_title'] = "Test Page";
		$template['data'] = $this->model_seat->get_label($id);
		$this->load->view('template', $template);
	}
	public function get_label()
	{
		
		//$request= file_get_contents("php://input");
		//$data = json_decode($request);
		//var_dump($data->id);
		
		$result = $this->model_seat->get_label();
	
		
		print json_encode($result);
	}
	
      public function get_busname(){
		  
		  $bus = $this->model_seat->get_selectbus();
		  print json_encode($bus);
	  }
		
}