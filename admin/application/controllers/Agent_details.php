 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Agent_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}
		 else {
			  $menu = $this->session->userdata('admin');
			  if( $menu!=1  ) {
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access user page.",'class' => 'danger'));
				 redirect(base_url().'User_details/view_userdetails');
			 }
		}

    }
	
	
	  public function view_Agent_details(){
		  
		  $template['page'] = 'Agent/view-agent';
		  $template['title'] = 'View Agent';
		  $template['data'] = $this->Agent_model->get_agent_details();
		  $this->load->view('template',$template);
	  }
	  
	  public function add_agent_details(){
		  
		  $template['page'] = 'Agent/add-agent';
		  $template['title'] = 'Add Agent';
		  $sessid=$this->session->userdata('logged_in_admin');
		  if($_POST){
			  $data = $_POST;
			  
			  array_walk($data, "remove_html");
			  
			//$config = set_upload_agent('assets/uploads/img');
				if(isset($_FILES['profile_pic'])) {
            $data['created_by']=$sessid['created_user'];					
			$config = set_upload_agent('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["profile_pic"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('profile_pic')) {
					unset($data['profile_pic']);
					$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
				}
				else {
					$upload_data = $this->upload->data();
					$data['profile_picture'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
			  
			 $result = $this->Agent_model->add_aget($data);
			 if($result)
			 {
				  $this->session->set_flashdata('message',array('message' => 'Add Agent Details successfully','class' => 'success'));
			 }
			 else
			 {
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
			 }			 
		    
		  }
			 //$template['result'] = $this->Agent_model->get_bustype_id();
			 $this->load->view('template',$template);
			  
	  }
	  
	  public function edit_agent_details(){
		  
		  $template['page'] = 'Agent/edit-agent';
		  $template['page_title'] = 'Edit Agent';
		  
		  $id = $this->uri->segment(3);
		  $template['data'] = $this->Agent_model->editget_bustype_id($id);
		  
          if(!empty($template['data'])) {
		  
		  if($_POST){
			  $data = $_POST;
			  
			  array_walk($data, "remove_html");

			  unset($data['submit']);

			if(isset($_FILES['profile_pic'])) {  
			$config = set_upload_editagent('assets/uploads/img');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["profile_pic"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('profile_pic')) {
					unset($data['profile_pic']);
				}
				else {
					$upload_data = $this->upload->data();
					$data['profile_picture'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
	
			  
			      $result = $this->Agent_model->edit_aget($data, $id);
				  $this->session->set_flashdata('message',array('message' => 'Edit Agent Details successfully','class' => 'success'));
				  redirect(base_url().'Agent_details/view_Agent_details');
			 }
		  }
			 else
			 {
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
				 redirect(base_url().'Agent_details/view_Agent_details');
			 			 
		     }
			// $template['result'] = $this->Agent_model->get_bustypeid();		  
			 $this->load->view('template',$template);
			  
	  }  
	  
	  
	  public function agent_delete(){
		  
		  $id = $this->uri->segment(3);
		  $result = $this->Agent_model->delete_agent($id);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Agent_details/view_Agent_details');
	  }
	  
	  public function view_agentpopup(){
		  
		  $id=$_POST['agentdetails'];
		  $template['data'] = $this->Agent_model->view_popup_agentdetails($id);
		  echo $this->load->view('Agent/view-agent-popup',$template);
	  }
	 
	  
	
	 
}	 
?>