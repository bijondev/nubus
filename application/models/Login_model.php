<?php 

class Login_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
		$model = Mage::getModel(form/form)->setData($data);
 	}
	function check_login($request ) {
		
		$remember='';
		if(isset($request['rememberme'])){
          $remember = $request['rememberme'];
		}
		$select_data = "*";
	    $table = "user";
		$this->db->select($select_data);
		$this->db->where('BINARY(username)', $request['username']);
      
		$this->db->where('BINARY(password)',  md5($request['password']));
		$query  = $this->db->get($table);  //--- Table name = User
		$result = $query->result(); 
	
		if(count($result) > 0){ // user credential is success
           $sess_array = array();
			$sess_array = array(
			    'id' => $result[0]->id,
			    'username' => $result[0]->username,
			     'name' => $result[0]->name
				
		    );
			$this->session->set_userdata('logged_in',$sess_array);
			$user = $this->session->userdata('logged_in');	
            if($remember=='on' && $remember!=''){
			
				  $cookie = array(
					'name'   => 'user',
					'value'  => $user,
					'expire' => 86500
				 );
		   
				$this->input->set_cookie($cookie);

				$this->input->cookie('logged_in', false);    
 

			
		    }	
            
          return true;			
		}else{
			return false;
			
		}
	}
	function is_mobile_exists($mobile){ 
		/* function return
		 ---------------------------------	 
		 'true'   if user exist
		 'false'  if user does not exist
		
		*/
		
		$select_data = "*"; 
		
		$where_data = array(	// ----------------Array for check data exist ot not
			'mob'     => $mobile
		);
		
		$table = "user";  //------------ Select table
		$result = $this->get_table_where( $select_data, $where_data, $table );
		
		if( count($result) > 0 ){ // check if user exist or not
			
			return true;
		}
		
		return false;
	 }
   
	 function is_username_exists($username){ 
			/* function return
			 ---------------------------------	 
			 'true'   if user exist
			 'false'  if user does not exist
			 
			*/
			
			$select_data = "*"; 
			
			$where_data = array(	// ----------------Array for check data exist ot not
				'username'     => $username
			);
			
			$table = "user";  //------------ Select table
			$result = $this->get_table_where( $select_data, $where_data, $table );
			
			if( count($result) > 0 ){ // check if user exist or not
				
				return true;
			}
			
			return false;
	 }
	 function registration($request){
		$table = 'user';
		$request['password']=md5($request['password']);
		
		$this->db->insert($table, $request);
		
		$insert_id = $this->db->insert_id();
        $where_data = array(	// ----------------Array for check data exist ot not
			'id'     => $insert_id
		);
		$select_data="*";
		  //------------ Select table
		$result = $this->get_table_where( $select_data, $where_data, $table );
		
       return $result[0];
		
	}
	function forget_password($data){
		
		 $select_data = "*"; 
			
			$where_data = array(	// ----------------Array for check data exist ot not
				'username'     => $data['email']
			);
			$table = "user"; 

			 //------------ Select table
			$result = $this->get_table_where( $select_data, $where_data, $table );
			//var_dump($result);
			//exit;
			 
			if( count($result) == 1 ){ // check if user exist or not
			 $email =$result[0]['username'];
			 
			 
			   $reset_key = 'TB'.strtotime(date('m/d/Y H:i:s'));
		      $update_data = array(
			  'reset_key'     => $reset_key
		       );
		    $where_data = array(	// ----------------Array for check data exist ot not
				'username'     => $data['email']
			);
			
		      $results = $this->update_table_where($update_data, $where_data, $table );
			  $this->send_link($email,$reset_key);
				return true;
			}
		 
	 }
	 public function send_link($email,$reset_key){
         $finresult    = get_settings_details(1);
        
         $from= $finresult->smtp_username;
         $name=$finresult->title;
         $s =base_url();
         $sub="Forgot Password";
         $template['userName']=$email;
		 
         $msg='<a href="'.$s.'login/reset_pass?id='.$reset_key.'" target="_blank">Forgot Password</a>';
		 
         
         $send = send_mail($from,$name,$email,$sub,$msg);
         if( $send ){ // check if user exist or not
              
                return true;
            }
     }public function reset_password_users($data){
		//var_dump($data['key']);
		
			$table="user";
		
        $where_data = array(	// ----------------Array for check data exist ot not
			  'reset_key'     => $data['key'],
			   'username'     => $data['email']
		);
		$select_data="*";
		$result = $this->get_table_where( $select_data, $where_data, $table);
		
		if(count($result)==1){
		$where_data = array(	// ----------------Array for check data exist ot not
			  
			   'username'     => $data['email']
		);
		$update_data = array(
			'reset_key'     => '',
			'password' =>md5($data['password'])
		);
		$results = $this->update_table_where($update_data, $where_data, $table );
		
		
			return true;
		
		}else{
			return false;
		}
	}
      function update_table_where( $update_data, $where_data, $table){	
		$this->db->where($where_data);
		$this->db->update($table, $update_data);
	
	
   } 
	 function get_table_where( $select_data, $where_data, $table){
        
		$this->db->select($select_data);
		$this->db->where($where_data);
		$query  = $this->db->get($table);  //--- Table name = User
		$result = $query->result_array(); 
		return $result;	
   }
}
?>