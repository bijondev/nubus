<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Route_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}
		 /*else {
			  $menu = $this->session->userdata('admin');
			  if( $menu!=1  ) {
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access user page.",'class' => 'danger'));
				 redirect(base_url().'Bus_details/add_busdetails');
			 }
		}*/

    }

 //view Route details
     public function view_routedetails(){
			
			  $template['page'] = "Route/view-route";
			  $template['page_title'] = "Route View";
			  $template['data'] = $this->Route_model->get_busdetails();
			  $this->load->view('template',$template);
	 }
	 
// Add Route details
	 public function add_routedetails() { 
	 
			  $template['page'] = 'Route/add-route';
			  $template['page_title'] = 'Add Route';
		      $sessid=$this->session->userdata('logged_in_admin');
			  
		      if($_POST){		  
			  $data = $_POST;
			  
			   
				
			    $data['created_by']=$sessid['created_user'];
			    $result = $this->Route_model->routedetails_add($data);
				
				if($result) {
					/* Set success message */
					 array_walk($data, "remove_html");
					 $this->session->set_flashdata('message',array('message' => 'Add Route Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
			  $template['result'] = $this->Route_model->get_busname();
			  $this->load->view('template',$template);
     } 

//Edit Route details 

     	 public function edit_routedetails(){
		
		      $template['page'] = 'Route/edit-route';
		      $template['page_title'] = "Edit Route";	

		      $id = $this->uri->segment(3);
		      $template['data'] = $this->Route_model->get_single_route($id);
              if(!empty($template['data'])) {
					
					
		      if($_POST){
			  $data = $_POST;
			  
			    array_walk($data, "remove_html");
				
			  	$result = $this->Route_model->route_edit($data, $id);
					/* Set success message */
					 $this->session->set_flashdata('message', array('message' => 'Route Details Updated successfully','class' => 'success'));
					 redirect(base_url().'Route_details/view_routedetails');
				}
		 }
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					 redirect(base_url().'Route_details/view_routedetails');
				}
				
             $template['result'] = $this->Route_model->get_busnames();				
	         $this->load->view('template',$template); 	
	  }	
	  
	  public function view_routepop(){
		  
		  $id=$_POST['routedetails'];
		  $template['data'] = $this->Route_model->view_popup_route($id);
		  echo $this->load->view('Route/view-route-popup',$template);
	  }
	  
	   public function delete_route(){
	
			      $data1 = array(
				  "status" => '0'
							 );
				  $id = $this->uri->segment(3);		   
				  $s=$this->Route_model->routeupdate_delete_status($id, $data1);				  
				  $this->session->set_flashdata('message', array('message' => 'Delete Successfully','class' => 'success'));
				  redirect(base_url().'Route_details/view_routedetails');
	    }
	
 
}