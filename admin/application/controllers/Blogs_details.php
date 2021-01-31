<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Blogs_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}

    }
	
	      public function view_blogs(){
			
			  $template['page'] = "FrontEnd/view-blogs";
			  $template['page_title'] = "View Blogs";
			  $template['data'] = $this->Blogs_model->get_blogdetails();
			  $this->load->view('template',$template);
	      }  
	      
         public function edit_blogs($id){
		 
		  $template['page'] = "FrontEnd/admin-add-static";
		  $template['page_title'] = "Edit Blogs";
          
          $id = $this->uri->segment(3);
          $template['row'] = $this->Blogs_model->editget_blogs_id($id);
		  
		    if($blogsdetails['id']=="5"){
			                  $s ="add_banner";
		                      }else{
			                  $s ="add_page";
		                      }  
			  
			  
		  if($_POST){
			  $data = $_POST;
			  	
                  $result = $this->Blogs_model->edit_blog_details($data, $id);				  
				  $this->session->set_flashdata('message', array('message' => 'Edit Blogs Details Updated successfully','class' => 'success'));
				  redirect(base_url().'Blogs_details/view_blogs');
			  }
		  
			 
		  $this->load->view('template',$template); 
	 }

        
	 
}