<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Droppoint_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Droppoint_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}

    }
	
	
	 public function view_dropdetails(){
			
			  $template['page'] = "Droppoint/view-droppoint";
			  $template['page_title'] = "View Droppoint";
			  $template['data'] = $this->Droppoint_model->get_dropdetails();
			  $this->load->view('template',$template);
	 }
	 
	 // Add Board Point
	 public function add_droppointdetails() { 
	 
			  $template['page'] = 'Droppoint/add-droppoint';
			  $template['page_title'] = 'Add DropPoint';
		     
		      if($_POST){		  
			  $data = $_POST;
			  
			  
			  
			 // array_walk($data, "remove_html");
				
			  
			    $result = $this->Droppoint_model->droppointdetails_add($data);
			     
				// var_dump($data);
			 // exit();
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Drop Point Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
			  $template['resultingbus'] = $this->Droppoint_model->get_dropbusname();
			  $template['resultsbus'] = $this->Droppoint_model->get_dropbusroutedetails($template['resultingbus'][0]->id);

			  $this->load->view('template',$template);
     }
	 
	 //Add Select Box Ralated Values Get in Route	 
	  public function add_droppointdetailsget() { 
	  
	  
	          if($_POST){		  
			  $data = $_POST;
			  
			  array_walk($data, "remove_html");
			  
			  $id=$_POST['value'];
			  $result = $this->Droppoint_model->get_dropbusroutedetails($id);
			  $template['resultsbus'] = '';
			  
			  foreach($result as $dam)
			         {  //echo $am['foodname'];
				        $template['resultsbus'] .= '<option value="'.$dam->id.'">'. $dam->drop_point.' </option>';
			         }							
					 echo $template['resultsbus'];
	          }
	  }
	  
	  //Edit Select Box Ralated Values Get in Route	  
	  public function Edit_droppointdetailsget() { 
	  
	  
	          if($_POST){		  
			  $data = $_POST;
			  
			  array_walk($data, "remove_html");
			  
			  $template['resultsget'] = $this->Droppoint_model->get_droprouteboardpoint();
	  }
	  }
	  
	  // Edit Board Point
      public function edit_droppointdetails(){
		
		      $template['page'] = 'Droppoint/edit-droppoint';
		      $template['page_title'] = "Edit DropPoint";	

		      $id = $this->uri->segment(3);
		      $template['data'] = $this->Droppoint_model->get_single_dropdpoint($id);
			  $template['resultingbus'] = $this->Droppoint_model->get_dropbusdetails();				
              $template['resultsbus'] = $this->Droppoint_model->get_dropbusroutedetails($template['data']->bus_id);
              if(!empty($template['data'])) {
				  
				  
		      if($_POST){
			  $data = $_POST;
			  
			  //array_walk($data, "remove_html");
				
			  	$result = $this->Droppoint_model->dropdpoint_edit($data, $id);
					/* Set success message */
					 $this->session->set_flashdata('message', array('message' => 'Edit Drop Point Details Updated successfully','class' => 'success'));
					redirect(base_url().'Droppoint_details/view_dropdetails');
				}
			  }
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					 redirect(base_url().'Droppoint_details/view_dropdetails');
				}
	
             				
	         $this->load->view('template',$template); 	
	  }

       public function delete_droppoint(){
		
			  /*$id = $this->uri->segment(3);		   
			  $result = $this->Droppoint_model->dropdetails_delete($id);		   
			  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
			  redirect(base_url().'Droppoint_details/view_dropdetails');*/
			  
			      $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Droppoint_model->dropupdate_delete_status($id, $data1);				  
				  $this->session->set_flashdata('message', array('message' => 'Delete Successfully','class' => 'success'));
				  redirect(base_url().'Droppoint_details/view_dropdetails');
			  
	 }	 	
      
      public function view_dropdpopup(){
		  
		  $id=$_POST['dropdetails'];
		  $template['data'] = $this->Droppoint_model->view_popup_dropdetails($id);
		  echo $this->load->view('Droppoint/view-drop-popup',$template);
	  }	  

	 
}