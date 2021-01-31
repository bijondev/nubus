 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gallery_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('gallery_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}

    }
	   
	   	 public function add_gallery() {
		
				   $template['page'] = 'Gallery/bus_gallery';
			       $template['page_title'] = 'Gallery';
                   $userdetails=$this->session->userdata('logged_in_admin');
				   $userid=$userdetails['id'];				   
				   
		   
				  if($_POST) {
					  
				  $data = $_POST;
				  
				  array_walk($data, "remove_html");
				  
                  $data['user_id']=$userid;	
                       //$data['user_id'] = $this->session->userdata('logged_in_admin')['id'];

                                        $files = $_FILES;
										$cpt = count($_FILES['image']['name']);
										
										for($i=0; $i<$cpt; $i++) {           
											
											$_FILES['image']['name']= $data['user_id']."-".$files['image']['name'][$i];
											$_FILES['image']['type']= $files['image']['type'][$i];
											$_FILES['image']['tmp_name']= $files['image']['tmp_name'][$i];
											$_FILES['image']['error']= $files['image']['error'][$i];
											$_FILES['image']['size']= $files['image']['size'][$i];				  
				  
				  $config = set_upload_optionsgallery('assets/uploads/img');
			      $this->load->library('upload');
			
			      $new_name = time()."_".$_FILES["image"]['name'];
			      $config['file_name'] = $new_name;

				  $this->upload->initialize($config);

				  if ( ! $this->upload->do_upload('image')) {
					//$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred while uploading files. Please try again', 'title' => 'Error !', 'class' => 'danger'));
					$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
					
				  }
				  else {
					
				  $upload_data = $this->upload->data();
				  $data['image'] = $config['upload_path']."/".$upload_data['file_name']; 
			
			
				   $result = $this->gallery_model->Gallery_add($data);
				  
		          if($result) {
				/* Set success message */
				  $this->session->set_flashdata('message',array('message' => 'Add Gallery Details successfully','class' => 'success'));
			      }
			      else 
				  {
				/* Set error message */
				  $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
                  }
				  }	
				  }
				  }				  
				  //redirect(base_url().'Business_information/add_Businessinformation');
				  //Select Box values get
				  $template['busresult'] = $this->gallery_model->get_gallerydetails();
				  
				  $template['data'] = $this->gallery_model->get_gallery();
		          $this->load->view('template',$template);
	 }
	 
	 
	  	public function view_busgallery() {
		
					$id = $this->uri->segment(3);
					 //var_dump($id);
		            // exit();
					$template['page'] = 'Gallery/view-bus-gallery';
					$template['page_title'] = "Bus Gallery";
					$template['data'] = $this->gallery_model->get_bus_gallery($id);
					//var_dump($template['data']);
		            //exit();
					if(!empty($template['data'])) {
					$this->load->view('template',$template);
					}
						
					else {
						$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
							redirect(base_url().'gallery_details/add_gallery');
        	}
		}
		
		/*public function view_shop_gallery() {
		
		$id = $this->uri->segment(3);
		$template['page'] = 'Shops/view-shop-gallery';
		$template['page_title'] = "Shop Gallery";
		$template['data'] = $this->shop_model->get_shop_gallery($id);
		
		if(!empty($template['data'])) {
			//var_dump($template['data']);
		//exit();
		$this->load->view('template',$template);
		}
		else {
			$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
				 redirect(base_url().'shop/gallery');
		}
	}*/
		
		
		 public function delete_gallery_image() {
			 
					$id = $_POST['id'];
					$result = $this->gallery_model->delete_gallery_images($id);
					return  $result;
	     }


	
}