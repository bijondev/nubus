<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('model_myaccount');
        if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}
 	}
	public function index(){
		$template['page'] = 'Myaccount/myaccount';
		$template['page_title'] = ": Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation";
		$template['logo'] = get_settings_details(1);
		$this->load->view('template',$template);
	
	}
	public function user_details(){
		$result = $this->model_myaccount->profile_details();
		print json_encode($result);
	}
	public function edit_profile(){
		$data = $_POST;
		$data['dob']=$_POST['month'].'/'.$_POST['day'].'/'.$_POST['year'];

          $data_new = array();
			    $data_new = array(
			    'name' => $data['name'],
			    'gender' => $data['gender'],
			    'dob' => $data['dob']
				
		    );




		
		
		$error = false;
		if(isset($_FILES['image']['name'])){
			
			$config = $this->set_upload_image();
			$this->load->library('upload');
			$this->upload->initialize($config);	
		  if (!$this->upload->do_upload('image'))
		    {
			   $finresult = array( "status" => 'failed','message' => $this->upload->display_errors('Image ') ,'code'    => 'error');
				$error = true;
			   

		    }
		     else{
			   $data['image'] = $config['upload_path']."/".$_FILES['image']['name'];
			 
			   $finresult = array( 'status'  => 'success','message' => 'Successfully registered','code'    => 'registered');
				
			}
			
			
	    }
		if($error == true){
				print json_encode( $finresult );
				
			}else{

				 $result = $this->model_myaccount->update_picture_details($data_new);

				 /* $sess_array = array();
			    $sess_array = array(
			    'id' => $result['id'],
			    'username' => $result['username'],
			    'name' => $result['name']
				
		    );*/
         
				 
		$finresult = array( 'status'  => 'success','message' => 'Successfully updated','code'    => 'registered');
		
		print json_encode( $finresult );
		/*redirect(base_url().'Myaccount/index'); 
*/
			}
	}
	public function set_upload_image()
	{
		
		$config = array();
		$config['upload_path'] = 'assets/uploads/profilepic';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '150*150';    
		$config['overwrite']     = FALSE;
	
		return $config;
	}
	public function change_password() {
		$data = $_POST;
		$result = $this->model_myaccount->change_password($data);
		if( $result == 'true'){
				$status = "sucess";
				$message ="Password Changed Successfully";
				$code="exist";
				
			}else if( $result == 'missmatch'){
				$status = "failed";
				$message ="Password and Confirm password not match";
				$code="exist";
			}else {
				$status = "failed";
				$message ="Password not match";
				$code="exist";
			}
			
			
		 $finresult = array( 
				'status'  => $status,
				'message' => $message,
				'code'    => $code
			);
				
			print json_encode($finresult);
	}
	public function get_tripdetails() {
		$result = $this->model_myaccount->get_tripdetails();
		
		
		 $i=0;
		
		foreach($result as $results){
			
			if($results['cancel_time']!=null){
			 $hour = $results['cancel_time']; 
			 $board_time = $results['board_time'];
			 $timestamp = strtotime($board_time) - 60*60*$hour;

				$time = date(' H:i', $timestamp);

				$canceltime = date("g:i a", strtotime($time));
			}else{
				$canceltime='0';
			}
			$droptime = strtotime($results['drop_time']);
		$pickuptime = strtotime($results['board_time']);
		$duration = ($droptime - $pickuptime)/3600;
			$customer= array_map('trim', explode('<=>',$results['customer']));
				foreach( $customer as $rs){
					
						$roww = array_map('trim', explode('<#>',$rs));
						
					$points[]=array('name'=>$roww[0],'age'=>$roww[1],'gender'=>$roww[2],'seat'=>$roww[3]
					);
					
					
					
				
			}
			$result[$i]['customer_details']=$points;
			$result[$i]['duration']=$duration;
			$result[$i]['canceltime']=$canceltime;
			 $points='';
			$i++;
		}	
		
		print json_encode($result);
	}
	function rating(){
		$result = $this->model_myaccount->get_rating();
		
		foreach($result as $book){
			
			$finresult    = get_settings_details(1);
			$from= $finresult->smtp_username;
            $name=$finresult->title;
			$email =$book['customer_email'];
				$sub="Rating";
				$data['book']=$book;
				
			$msg =$this->load->view('Rating/rating', $data, true);
		
		  $send = send_mail($from,$name,$email,$sub,$msg);
			
		}
		
	}
	public function rating_bus()
	{
		$data=$_POST;
		
		 $user=$this->model_myaccount->rate_bus($data);
		 if($user==true){
			 $this->load->view('ratings');
		 }
		
	}
	public function rate_bus()
	{
		$template['page'] = 'Rating/rating';
		$template['page_title'] = ": Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation";
		$template['logo'] = get_settings_details(1);
		$this->load->view('template',$template);
		// $this->load->view('Rating/rating');
	}
	function cancel(){
		$data = $_POST;
		$result = $this->model_myaccount->cancel($data );
	}
	public function rating_update()
	{
		$data = $_POST;
		$result = $this->model_myaccount->rating_update($data);
		if($result == true){
			$finresult = array( 'status'  => 'success','message' => 'Successfully rated','code'    => 'registered');
			print json_encode($finresult);
		}else{
			$finresult = array( 'status'  => 'failed','message' => 'already  rated','code'    => 'registered');
				print json_encode($finresult);
		}
	}
	public function deatils_book()
	{
		
		$request= file_get_contents("php://input");
		$data = json_decode($request);
		
		$result = $this->model_myaccount->deatils_book($data);
		
		print json_encode($result);
	}
}