<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('AdminLogin_model');
		$this->load->model('Settings_model');
		$this->load->library('session');

		if($this->session->userdata('logged_in_admin')) { 
			redirect(base_url().'Bus_details/view_busdetails');
		}
 	}
	public function index(){
		
		    $template['page_title'] = "Login";
		    if(isset($_POST)) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
                  
			if($this->form_validation->run() == TRUE) {
				redirect(base_url().'Bus_details/view_busdetails');
			}
		    }
		    $this->load->view('login-form');	
	}
	
	function check_database($password) {
		
			$username = $this->input->post('username');
			$result = $this->AdminLogin_model->login($username, md5($password));
		
			if($result) {
				$user=$result->id;
				if($result->user_type == 1){
					$user="admin";
				}
			      
				  
				    $sess_array = array();
			        $sess_array = array(
					'id' => $result->id,
					'username' => $result->username,
					'user_type' => $result->user_type,
			        'created_user' =>$user,
					'image' => $result->image
			        );
				  
				  
				  
				  $resulttitles = $this->Settings_model->settings_viewing();
				  
				  $sessing_arrays = array(
				  'title' => $resulttitles->title
				  );
				  
				   $this->session->set_userdata('title', $sessing_arrays);
				
		     $this->session->set_userdata('logged_in_admin',$sess_array);
			 $this->session->set_userdata('admin',$result->user_type);
			 $this->session->set_userdata('id',$result->id);
			 $this->session->set_userdata('profile_pic',$result->profile_picture);
			 //$this->session->set_userdata('image',$result->profile_picture);
			 //$this->session->set_userdata('profile_pic',base_url()."/assets/images/user_avatar.jpg");

		     return TRUE;
		     }
		    else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		 }
	}

}
