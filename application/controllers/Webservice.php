<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');

	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); 
    }

	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

		exit(0);
	}
*/

class Webservice extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Web_model');
 	}

 	

 	public function user_signup(){

 		$data = $_POST; 
 		$check_user = $this->Web_model->check_user($data);

 		if($check_user>0){
			$result =  array( 'status'=>'failure','message'=> "User Already exists");
 		} else {
 			$user =$this->Web_model->reg_user($data);
 			if($user){
 				$result =  array( 'status'=>'success','message'=> "Registration Successfull",'user'=>$user);
 			} else {
 				$result =  array( 'status'=>'failure','message'=> "User registration Failed. Please try again");
 			}
 			
 		}
 				
 		print json_encode($result);
 	}

 	public function user_signin(){
 		$data = $_POST;		
		$result =$this->Web_model->log_user($data);
		if(count($result)>0){
			$result =  array('status'=>'success','message'=> "SignIn Successfully completed",'user'=>$result);
		} else {
			$result =  array('status'=>'failure','message'=> "Invalid Credentials.!!");
		}
 				
 		print json_encode($result);
 	}

 	public function update_user_info(){
 		$data = $_POST;
		$user =$this->Web_model->update_user($data);
		if($user){
			$result =  array( 'status'=>'success','message'=> "Profile Updated");
		} else {
			$result =  array( 'status'=>'failure','message'=> "Profile Updation Failed.Please try again..");
		}
 			
 		print json_encode($result);

 	}

 	public function change_password(){
		$data = $_POST;
		$user = $this->Web_model->check_password($data);
		if(count($user)>0){
			$updatePaswrd = array('id'=> $data['id'],'password'=>md5($data['newP']));
			$change = $this->Web_model->change_password($updatePaswrd);
			if($change){
				$result =  array('status'=>'true','message'=> "Password updated successfully");
			}
			else{
				$result =  array('status'=>'false','message'=> "Something went wrong.Please try again later..");
			}
		}
		else {
			$result =  array('status'=>'false','message'=> "Wrong password.!!");
		}
 				
 		print json_encode($result);
	}

	public function forgot_password(){
		$data = $_POST;
		$user = $this->Web_model->check_mail($data);
		if(count($user)>0){
			$this->load->helper('string');
       		$rand_pwd= random_string('alnum', 6);	

       		//--------MAIL SENDING-------------
       		$finresult    = get_settings_details(1);
        
	        $from= $finresult->smtp_username;
	        $name=$finresult->title;
	        $s =base_url();
	        $sub="NEW NUBUS PASSWORD";
	        $email= $data['email_id'];
	        $msg="Your new NUBUS pasword is  ".$rand_pwd.". Please use this for authentication purpose. You can also reset the password later...";
	        $send = send_mail($from,$name,$email,$sub,$msg);
	        //if( $send ){ 
            $data1 = array('id'=>$user->id,'username' =>$user->username,'password' => md5($rand_pwd));
			$forgot = $this->Web_model->change_password_forgot($data1);
			if($forgot){
				$result =  array('status'=>'true','message'=> "New pasword is sent to the given email");
        	}
			else{
			$result =  array('status'=>'false','message'=> "Something went wrong.Please try again later..");
			}
		}
		else {
			$result =  array('status'=>'false','message'=> "Email doesn't exist.!");
		}
 				
 		print json_encode($result);
	}

	public function get_app_details(){
		$data = $_POST;
		$finresult = get_settings_details(1);
		if($data['app_key'] == $finresult->app_key){
			$result =  array('status'=>'success');
		}
		else{
			$result =  array('status'=>'failed');
		}
		print json_encode($result);
	}

 	public function search_city(){
 		$data = $_POST;
 		$result =$this->Web_model->search_city($data);
		if(count($result)>0){
			$result =  array('status'=>'success','result'=>$result);
		} else {
			$result =  array('status'=>'failure');
		}
 				
 		print json_encode($result);
 	}

 	public function bus_search(){
 		$data = $_POST;
 		$result = $this->Web_model->bus_search($data);

 		$i=0;
			$droppointw=""; 
			$droppointD=""; 
			$existseat4='';
			$points='';
			 $singlep='';
		
		foreach($result as $results){
			
			if(!empty($results)) {	
			$layout =json_decode($results['layout']);
			
			$length = sizeof($layout);
			$new_array = array();
			$single =array();
			
				$seatexisting = $this->Web_model->select_booking_seat($results['bus_id'],$results['route_id'],$data['book_date']);
				//print_r($seatexisting);
				$existseat2=array();
			if($seatexisting[0]['existseat']!=null){
			 $existseat= array_map('trim', explode('<=>',$seatexisting[0]['existseat'])); 
			 
			foreach($existseat as $existseatm){
				
				$existseat5=array_map('trim', explode(',',$existseatm));
				//print_r($existseat5);
				$existseat2=array_merge($existseat2,$existseat5);
				
			}
			
			//print_r($existseat2);
		    }
			if($layout) {
			foreach($layout as $layouts ){
				
				
				foreach($layouts as $row ){
					
					//echo $row->seat_no;
					if($existseat2 !=null && in_array($row->seat_no, $existseat2)){
					$row->status='true';
					}else{
						$row->status='false';
					}
				
				array_push($single ,$row);
			}
				array_push($new_array ,$layouts);
			}
			}
			
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
			if($results['points']!=null){
				$poin= array_map('trim', explode('<=>',$results['points']));
				$points='';
			foreach( $poin as $rs){
					if(!empty($rs)) {
						$roww = array_map('trim', explode('<#>',$rs));
						
					$points[]=array('time'=>$roww[1],'dplace'=>$roww[0],'landmark'=>$roww[2],'address'=>$roww[3],'board_id'=>$roww[4]
					
					);
					$singlep []=$roww[0];
					
					}
				
			}
			}
		
		if($results['droppoints']!=null){
			 $stop= array_map('trim', explode('<=>',$results['droppoints']));
			 foreach( $stop as $stops){
					if(!empty($stops)) {
						$rowss = array_map('trim', explode('<#>',$stops));
					$droppointw[]=array('time'=>$rowss[1],'dpoints'=>$rowss[0],'landmark'=>$rowss[2],'address'=>$rowss[3]
					
					);
					$droppointD []=$rowss[0];
					}

			}
		}
		if($results['gallery']!=null){
			 $gallery= array_map('trim', explode('<=>',$results['gallery'])); 
			 $images='';
			foreach( $gallery as $image){
						
						
					$images[]=array('image'=>$image
					);
				
			}
			
		}
		if($results['amenities']!=null){
			 $amenitie= array_map('trim', explode('<=>',$results['amenities']));

			 foreach( $amenitie as $amenitiess){
						
						
					$amenities[]=$amenitiess;					
				
				
			} 
		}
			
		$result[$i]['Dpoints']=$points;
		$result[$i]['seat_layout']=$new_array;
		$result[$i]['canceltime']=$canceltime;
		$result[$i]['singleP']=$singlep;
		$result[$i]['Stoppoints']=$droppointw;
		$result[$i]['singleD']=$droppointD;
		$result[$i]['duration']=$duration;
		$result[$i]['gallery']=$images;
		$result[$i]['amenities']=$amenities;
		$i++;
		}
		}

 		if(count($result)>0){
			$result =  array('status'=>true,'message' => '','result'=>$result);
		} else {
			$result =  array('status'=>false,'message'=>'No bus found.!!','result'=>array());
		}
 				
 		print json_encode($result);

 	}

 	public function get_trip_details(){
 		$data = $_POST;
 		$result = $this->Web_model->get_trip_details($data);

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
 		if(count($result)>0){
			$res =  array('status'=>'true','message' => 'success','data'=>$result);
		} else {
			$res =  array('status'=>'false','message'=>'No trips found.!!');
		}
 				
 		print json_encode($res);
 	}

 	public function filter_option() {
		$data = $_POST;
		$result = $this->Web_model->filter_option($data);
		if($result[0]->bus_name!=''){
		$bus_name= array_map('trim', explode('<=>',$result[0]->bus_name));
		$amenities= array_map('trim', explode('<=>',$result[0]->amenities));
		$points= array_map('trim', explode('<=>',$result[0]->points));
		$stoppoint= array_map('trim', explode('<=>',$result[0]->drop_points));
		foreach( $bus_name as $r){
						
						if($r!=''){
					$row = array_map('trim', explode('<#>',$r));
					if(!empty($row)){
						$bus_names[]=array('bus'=>$row[0]);
						$bus_types[]=array('bus_type'=>$row[1]);
					}
				}
			}
				foreach( $stoppoint as $spoint){

						
					$Spoint[]=array('Stop'=>$spoint
					
					);
				}

			foreach( $amenities as $amenitie){
					$Amenities[]=$amenitie;
			}
					foreach( $points as $point){
					$pointss[]=array('bpoints'=>$point
					
					);
			}
			$res['bus_names']=$bus_names;
			$res['bus_types']=$bus_types;
			$res['pointss']=$pointss;
			$res['Amenities']=$Amenities;
			$res['Stoppoint']=$Spoint;
			$details =  array('status'=>'true','result'=>$res);
		} else {
			$details =  array('status'=>'false');
			/*$res['bus_names']='';
			$res['bus_types']='';
			$res['pointss']='';
			$res['Amenities']='';
			$res['Stoppoint']='';*/
		}
		
		print json_encode($details);
	}

	public function booking() {
		$data = $_POST;
		$result = $this->Web_model->booking($data);
		if($result){
			$result =  array('status'=>true,'message' => 'success','result'=>$result);
		}
		else{
			$result =  array('status'=>false,'message' => 'Failed');
		}
		print json_encode($result);
		
	}

	public function email_notification() {
		
		$data = $_POST;
		$details=$this->Web_model->mail_details_bookingID($data['booking_id']);
		$s = $this->booking_details($details);
		$result = array( 'status'  => 'success','message' => 'Successfully registered');
		print json_encode( $result );
	}

	public function booking_details($data){

		$finresult    = get_settings_details(1);
        
         $from= $finresult->smtp_username;
         $name=$finresult->title;
         $s =base_url();
         $sub="Booking_details";
         $email=$data[0]['email'];
		 $template['data']=$data;
         $msg=$this->load->view('Email/booking_detail', $template, true);
         $send = send_mail($from,$name,$email,$sub,$msg);
         if( $send ){ // check if user exist or not
                return true;
            }
	}

	public function cancel_ticket(){
		$data = $_POST;
		$id = $this->Web_model->check_ticket($data);
		if($id == null){
			$result = array( 'status'  => 'fail','message' => 'This ticket number is unavailable.!!');
			print json_encode( $result );
		}
		else{
			$details = array('id' => $id->id,'status' => 'Cancelled');
			$res = $this->Web_model->cancel_status($details);
			if($res){
				$mail = $this->cancel_mail($data);
				$result = array( 'status'  => 'success','message' => 'Ticket cancelled successfully');
			}
			else{
				$result = array( 'status'  => 'fail','message' => 'Something went wrong..Pls try again later !');
			}
			print json_encode( $result );
		}
	}

	public function cancel_mail($data){
		$finresult    = get_settings_details(1);
        
         $from= $finresult->smtp_username;
         $name=$finresult->title;
         $s =base_url();
         $sub="TICKET CANCELLATION";
         $email=$data['email'];
         $msg="<h3>Booking for the Ticket Number <i style = 'color:red;'> ".$data['booking_id']." </i> has been cancelled successfully..!!</h3>";
         $send = send_mail($from,$name,$email,$sub,$msg);
         if( $send ){ // check if user exist or not
                return true;
          }

	}



 }
 ?>