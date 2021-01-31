<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borderpoint_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Borderpoint_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}

    }
	
	
	 public function view_borderdetails(){
			
			  $template['page'] = "Borderpoint/view-borderpoint";
			  $template['page_title'] = "View BorderPoint";
			  $template['data'] = $this->Borderpoint_model->get_borderdetails();
			  $this->load->view('template',$template);
	 }
	 
  // Add Board Point
	 public function add_boardpointdetails() { 
	 
			  $template['page'] = 'Borderpoint/add-boardpoint';
			  $template['page_title'] = 'Add BoardPoint';
			  
		      if($_POST){		  
			  $data = $_POST;
			  
			  array_walk($data, "remove_html");
				
			    $result = $this->Borderpoint_model->boardpointdetails_add($data);
			  
				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Board Point Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
			  $template['resulting'] = $this->Borderpoint_model->get_busnamedetails();
			  $template['results'] = $this->Borderpoint_model->get_busroutedetails($template['resulting'][0]->id);

			  $this->load->view('template',$template);
     }
 //Add Select Box Ralated Values Get in Route	 
	  public function add_boardpointdetailsget() { 
	  
	  
	          if($_POST){		  
			  $data = $_POST;
			  
			  array_walk($data, "remove_html");
			  
			  $id=$_POST['value'];
			  $result = $this->Borderpoint_model->get_busroutedetails($id);
			  $template['results'] = '';
			  
			  foreach($result as $am)
			         {  //echo $am['foodname'];
				        $template['results'] .= '<option value="'.$am->id.'">'. $am->board_point.' </option>';
			         }							
					 echo $template['results'];
	          }
	  }
 //Edit Select Box Ralated Values Get in Route	  
	  public function Edit_boardpointdetailsget() { 
	  
	  
	          if($_POST){		  
			  $data = $_POST;
			  
			  array_walk($data, "remove_html");
			  
			  $template['resultsget'] = $this->Borderpoint_model->get_routeboardpoint();
	  }
	  }
	 
  // Edit Board Point
      public function edit_boardpointdetails(){
		
		      $template['page'] = 'Borderpoint/edit-boardpoint';
		      $template['page_title'] = "Edit BoardPoint";	

		      $id = $this->uri->segment(3);
		      $template['data'] = $this->Borderpoint_model->get_single_boardpoint($id);
			  $template['resulting'] = $this->Borderpoint_model->get_busdetails();				
              $template['results'] = $this->Borderpoint_model->get_busroutedetails($template['data']->bus_id);
			  if(!empty($template['data'])) {

		      if($_POST){
			  $data = $_POST;
			  
			  array_walk($data, "remove_html");
				
			  	$result = $this->Borderpoint_model->boardpoint_edit($data, $id);
					/* Set success message */
					 $this->session->set_flashdata('message', array('message' => 'Edit Board Point Details Updated successfully','class' => 'success'));
					redirect(base_url().'Borderpoint_details/view_borderdetails');
				}
			  }
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
					 redirect(base_url().'Borderpoint_details/view_borderdetails');
				}
				
             				
	         $this->load->view('template',$template); 	
	  }	


      public function delete_boardpoint(){
		
			 /* $id = $this->uri->segment(3);		   
			  $result = $this->Borderpoint_model->boarddetails_delete($id);		   
			  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
			  redirect(base_url().'Borderpoint_details/view_borderdetails');*/
			  
			      $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Borderpoint_model->boardupdate_delete_status($id, $data1);				  
				  $this->session->set_flashdata('message', array('message' => 'Delete Successfully','class' => 'success'));
				  redirect(base_url().'Borderpoint_details/view_borderdetails');
	 }	 
	 
	 public function view_boardpopup(){
		 
		  $id=$_POST['boarddetails'];
		  $template['data'] = $this->Borderpoint_model->view_popup_boardpoint($id);
		  echo $this->load->view('Borderpoint/view-board-popup',$template);
		 
	 }
	
}