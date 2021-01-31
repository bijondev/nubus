 <!-- promo code Management admin side created by Anju MS on 07-12-2016-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_details extends CI_Controller {

	public function __construct() {
	parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('promo_model');
		
		if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}
		
		

    }
    //add promodetails

      public function add_promodetails() { 
	 
			  $template['page'] = 'Promodetails/add-promodetails';
			  $template['page_title'] = 'Add Promo';			  
		      $sessid=$this->session->userdata('logged_in_admin');		  
			  
		      if($_POST){		  
			  $data = $_POST;
			 
			  $checkpromo=$this->promo_model->checkpromo($data);
			  
			  if($checkpromo==null)
			  {
			  
			    //array_walk($data, "remove_html");
				
			    $data['created_by']=$sessid['created_user'];
			    $result = $this->promo_model->promodetails_add($data);
			
				if($result) {
					 array_walk($data, "remove_html");
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Add Promo Details successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Code Already Exist!!','class' => 'error'));  
				}
			}
			 		  
			  $this->load->view('template',$template);
     } 
     //view promodetails
     public function view_promodetails(){
		
		 
		      //$a = $sessid=$this->session->userdata('logged_in_admin');
			  //$sessid = (($a->user_type == 1));		  
			  $template['page'] = "Promodetails/view-promodetails";
			  $template['page_title'] = "Promo Details";
			  $template['data'] = $this->promo_model->get_promodetails();
			  $this->load->view('template',$template);
	 }

	 //edit Promo details	
	 public function edit_bus(){
		
		      $template['page'] = 'Promodetails/edit-promodetails';
		      $template['page_title'] = 'Edit Promo';

		      $id = $this->uri->segment(3); 
		      $template['data'] = $this->promo_model->get_single_promo($id);
			  if(!empty($template['data'])) {
				  
				  
		      if($_POST){
			  $data = $_POST;
			 
			    //array_walk($data, "remove_html");
				
				
				
			  	$result = $this->promo_model->promodetails_edit($data, $id);
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Edit Promo  Details Updated successfully','class' => 'success'));
					 redirect(base_url().'Promo_details/view_promodetails');
				}
			  }
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
					 redirect(base_url().'Promo_details/view_promodetails');
				}
			
    
	          $this->load->view('template',$template); 	
	 }
	 //pop up view promo Details
	     public function promodetails_view(){
		
	           $id=$_POST['getpromo'];

	           $template['data'] = $this->promo_model->get_promopopupdetails($id);
	           echo $this->load->view('Promodetails/promo-popup',$template);
		 
         } 
	 
	 //delete promoCode
	  public function delete_bus(){

				  $id = $this->uri->segment(3);		   
				  $s=$this->promo_model->promoupdate_delete_status($id);				  
				  $this->session->set_flashdata('message', array('message' => 'Delete Successfully','class' => 'success'));
				  redirect(base_url().'Promo_details/view_promodetails');
	 }
	 
	
	}
		
