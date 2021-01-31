<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
   
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		 $this->load->model('login_model');
		 $this->load->model('model_common');
		$this->load->library('form_validation');
 	}
	
	public function index()
	{
		
		$data = $_POST;
		$result = $this->login_model->check_login($data);
			
		if($result==true){
			
			$finresult[] = array( 'status'  => 'success','message' =>'Successfully Login', 'code'    => 'success' 
								
									
			);
			
		
			print json_encode($finresult);
		}else{
			$finresult[] = array( 'status'  => 'failed','message' => 'Unknown credential , please try again!', 'code'    => 'Login failed' ,
								
								);
			print json_encode($finresult);
		}
	}
	public function signup()
	{
		$data = $_POST;
		
			$user_status    = $this->login_model->is_username_exists($data['username']);
			$mail_status    = $this->login_model->is_mobile_exists($data['mob']);
			if( $mail_status || $user_status ) //CHECK MAIL ID OR USER NAME EXIST
			{	
				
				//$error_list = array();
				if($user_status){
					$error_list = array(
										'message' => 'Email already in use',
												
									);
				}
				if($mail_status){
					$error_list = array(
										'message' => 'Mobile Number already in use',
												
									);
				}
				
				$string="";
				foreach($error_list as $key=>$value){
				$string .= $value.'<br/>';
			 }
				$finresult = array( 
								'status'  => 'failed',
								'message' => $string,
								'code'    => 'exists'
							);
				
				print json_encode($finresult);
				
				
			}else{
				
			
			
			
		  $finresults=$this->login_model->registration($_POST);

		  $sess_array = array();
			    $sess_array = array(
			    'id' => $finresults['id'],
			    'username' => $finresults['username'],
			    'name' => $finresults['name']
				
		    );
         

			$this->session->set_userdata('logged_in',$sess_array);
			$user =$this->session->userdata('logged_in');
           /* var_dump($user);

			*/
				
		   $result = array( 'status'  => 'success','message' => 'Successfully registered','code'    => 'registered');
		   print json_encode( $result );
			}
		
	}
	public function forgot_password() {
        $request = $_POST;
        
        $finresult    = $this->login_model->forget_password($request);
		
        if($finresult=='true'){
           
            $finresult = array( 'status'  => 'success','message' => 'Link has been send your mail.','code'    => 'registered');
          print json_encode( $finresult );
            }else{
				$finresult = array( 'status'  => 'failed','message' => 'This email is not associated with any account.','code'    => 'registered');
         print json_encode( $finresult );
			}
        
        
        
    }
	public function reset_pass() {
		$template['page'] = 'Forgotpass/forgot';
		$template['page_title'] = ": Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation";
        
		
        $template['logo'] = get_settings_details(1);   
		$this->load->view('template',$template);
	}
	public function reset_password() {
        $request = $_POST;
        
        $finresult    = $this->login_model->reset_password_users($request);
		
        if($finresult=='true'){
           
            $finresult = array( 'status'  => 'success','message' => 'Updated Successfully ','code'    => 'registered');
          print json_encode( $finresult );
            }else{
				$finresult = array( 'status'  => 'failed','message' => 'Enter Valid Email','code'    => 'registered');
         print json_encode( $finresult );
			}
        
        
        
    }
}