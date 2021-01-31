<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Bus_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}
		
		

    }

 //view user details
     public function view_busdetails(){
		 
		
		 
		      //$a = $sessid=$this->session->userdata('logged_in_admin');
			  //$sessid = (($a->user_type == 1));		  
			  $template['page'] = "Busdetails/view-busdetails";
			  $template['page_title'] = "Bus Details";
			  $template['data'] = $this->Bus_model->get_busdetails();
			  $this->load->view('template',$template);
	 }
	
 //popup view userdetails		 
	/* public function userdetails_view(){
		 
		      $id=$_POST['userdetails'];
              $categori = $this->Bus_model->get_usercategory($id);
        
			  if($categori=='Novalue')
			  {
				$template['data'] = $this->User_model->get_usercategori($id);
				$template['categori']="";
				$this->load->view('userdetails/userdetails-popup',$template);
			  }
			  else
			  {
				$template['data'] = $this->User_model->get_usercategori($id);
				$template['categori']=$categori;
				$this->load->view('userdetails/userdetails-popup',$template); 
			  }	 
	 }*/
  // Add Userdetails
	 public function add_busdetails() { 
	 
			  $template['page'] = 'Busdetails/add-busdetails';
			  $template['page_title'] = 'Add Bus';			  
		      $sessid=$this->session->userdata('logged_in_admin');		  
			  
		      if($_POST){		  
			  $data = $_POST;
			  
			    //array_walk($data, "remove_html");
				
			    $data['created_by']=$sessid['created_user'];
			    $result = $this->Bus_model->busdetails_add($data);
			
				if($result) {
					 array_walk($data, "remove_html");
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Bus Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
			  $template['result'] = $this->Bus_model->get_bustype_id();
              $template['amenitiesresult'] = $this->Bus_model->get_amenities_id();			  
			  $this->load->view('template',$template);
     } 
			  
  //edit Bus details	
	 public function edit_bus(){
		
		      $template['page'] = 'Busdetails/edit-busdetails';
		      $template['page_title'] = 'Edit Bus';

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->Bus_model->get_single_bus($id);
			  if(!empty($template['data'])) {
				  
				  
		      if($_POST){
			  $data = $_POST;
			 
			    //array_walk($data, "remove_html");
				
				
				
			  	$result = $this->Bus_model->busdetails_edit($data, $id);
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Edit Bus Details Updated successfully','class' => 'success'));
					 redirect(base_url().'Bus_details/view_busdetails');
				}
			  }
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
					 redirect(base_url().'Bus_details/view_busdetails');
				}
			
              $template['result'] = $this->Bus_model->get_bus_typeid();		  
              //$template['editamenitiesresult'] = $this->Bus_model->get_amenities();
			  $template['amenitiesresult'] = $this->Bus_model->get_amenities_id();
	          $this->load->view('template',$template); 	
	 }
	 
	 
	
  //delete user details	
     public function delete_bus(){
		
			 /* $id = $this->uri->segment(3);		   
			  $result = $this->Bus_model->busdetails_delete($id);		   
			  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
			  redirect(base_url().'Bus_details/view_busdetails');*/
			      $data1 = array(
				  "bus_status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Bus_model->busupdate_delete_status($id, $data1);				  
				  $this->session->set_flashdata('message', array('message' => 'Delete Successfully','class' => 'success'));
				  redirect(base_url().'Bus_details/view_busdetails');
	 }
    
      //Delete Category 
  
	 public function bus_status(){
		 
				  $data2 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Bus_model->update_delete_status($id, $data2);				  
				  $this->session->set_flashdata('message', array('message' => 'Disable Successfully','class' => 'success'));
				  redirect(base_url().'Bus_details/view_bustypedetails');
	 }
	 
     public function bus_active(){
		 
				  $data2 = array(
				  "status" => '1'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Bus_model->update_delete_status($id, $data2);				
				  $this->session->set_flashdata('message', array('message' => 'Active Successfully','class' => 'success'));
				  redirect(base_url().'Bus_details/view_bustypedetails');
	 }
	 
	 
	 
	 

// View Bus Type Details	 
	 public function view_bustypedetails(){
			
			  $template['page'] = "Busdetails/add-view-bustype";
			  $template['page_title'] = "View Bus Type";
			  //$sessid=$this->session->userdata('logged_in_admin');
		  
		      if($_POST){		  
			  $data = $_POST;
			  
			    array_walk($data, "remove_html");
				
			   // $data['created_by']=$sessid['created_user'];
			    $checktype = $this->Bus_model->check_Bustype($data);
			    if($checktype==null)
			    {
			    $result = $this->Bus_model->bustype_add($data);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add BusType Details successfully','class' => 'success'));
				}
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error!! Bustype already exist','class' => 'error'));  
				}

				}
			  $template['data'] = $this->Bus_model->view_Bustype();
			  $this->load->view('template',$template);

	 }
	 
 //edit Bus Type details	
	 public function edit_busType(){
		
		      $template['page'] = 'Busdetails/edit-bustype';
		      $template['page_title'] = 'Edit BusType';

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->Bus_model->get_single_bustype($id);
			 
		      if($_POST){
			  $data = $_POST;
				
				array_walk($data, "remove_html");
				
			  	$result = $this->Bus_model->bustypedetails_edit($data, $id);
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Edit BusType Details Updated successfully','class' => 'success'));
					 redirect(base_url().'Bus_details/view_bustypedetails');
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error')); 
					 redirect(base_url().'Bus_details/view_bustypedetails');
				}
				}	
	      $this->load->view('template',$template); 	
	 }

  //pop up view bus Details
	     public function busdetails_view(){
		
	           $id=$_POST['getbusdetails'];
	           $template['data'] = $this->Bus_model->get_buspopupdetails($id);
	           echo $this->load->view('Busdetails/bus-popup',$template);
		 
         } 
		 public function bus_details_view(){
		
	           $id=$_POST['getbusdetails'];
	           $data = $this->Bus_model->get_buspopupdetails($id);
	           print json_encode( $finresult );
		 
         }

		 public function seatdetails_view(){
		
	           $id=$this->uri->segment(3);
	           $data = $this->Bus_model->get_buspopupdetails($id);
	           print json_encode($data);		 
         }
}