<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancellation_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Cancellation_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}

    }
	       
     public function view_cancellation(){
		 
		 $template['page'] = 'canceldetails/view-cancellation';
		 $template['title'] = 'View Cancellation';
		 $template['canceldatadata'] = $this->Cancellation_model->view_cancel_details();
		 $this->load->view('template',$template);
	 }
 
	 public function add_cancellation(){
		  
		  $template['page'] = "canceldetails/cancellation";
		  $template['page-title'] = "Cancellation";	 
          $userdetails=$this->session->userdata('logged_in_admin');
		   
		  if($_POST){
			  $data = $_POST;		
				  
		  $data['created_by']=$userdetails['created_user'];
          $data['advertisement_status'] = 1;
		  $result = $this->Cancellation_model->cancel_tickets($data);
		  if($result)
			  
		  {
			   //array_walk($data, "remove_html");
			   $this->session->set_flashdata('message',array('message' => 'Cancel Tickets successfully','class' => 'success'));
		  }
		  else
		  {
			  $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
		  }
		  }
		  
		  $template['cancelresult'] = $this->Cancellation_model->get_bus_details();
		  $this->load->view('template',$template);
	 }
	 
	 public function edit_cancel($id){
		 
		  $template['page'] = "canceldetails/edit-cancellation";
		  $template['page-title'] = "Cancellation";	
          
          $id = $this->uri->segment(3);
          $template['data'] = $this->Cancellation_model->get_single_cancel($id);
		  if(!empty($template['data'])) {
			  
			  
		  if($_POST){
			  $data = $_POST;
			  
			      $result = $this->Cancellation_model->edit_cancel_details($data ,$id);				  
				  $this->session->set_flashdata('message', array('message' => 'Edit Cancel Tickets Details Updated successfully','class' => 'success'));
				  redirect(base_url().'Cancellation_details/view_cancellation');
			  }
		  }
			  else
			  {
				  $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
				  redirect(base_url().'Cancellation_details/view_cancellation');
			  }
		  $template['cancelresults'] = $this->Cancellation_model->edi_bus_details();
		  $this->load->view('template',$template); 
	 }
	 
	  public function delete_cancellation(){
		  
		  $id = $this->uri->segment(3);
		  $result= $this->Cancellation_model->cancellation_delete($id);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
	      redirect(base_url().'Cancellation_details/view_cancellation');
		  
	  }
	  
	  public function view_cancelpopup(){
		  
		  $id=$_POST['canceldetails'];
		  $template['data'] = $this->Cancellation_model->view_popup_cancellation($id);
		  echo $this->load->view('canceldetails/view-cancellation-popup',$template);
	  }
	  
	 
}