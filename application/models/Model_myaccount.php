<?php 

class Model_myaccount extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	function profile_details() {
		
		$user = $this->session->userdata('logged_in');
		$select_data="*";
		$where_data=array(    // ----------------Array for check data exist ot not
			'id'     => $user['id']
			
         );
		$table	="user";
		$result = $this->get_table_wheres( $select_data, $where_data, $table );
		return $result;
	}
	function get_table_wheres( $select_data, $where_data, $table){
       
		$this->db->select($select_data);
		$this->db->where($where_data);
		 
		$query  = $this->db->get($table); 
       		//--- Table name = User
		$result = $query->result_array(); 
		
		return $result;	
   }
   public function update_picture_details($data) {
   	
   
		$user = $this->session->userdata('logged_in');
		$select_data="*";
		$where_data=array(    // ----------------Array for check data exist ot not
			'id'     => $user['id']
			
         );
		$table	="user";
		$result = $this->get_table_wheres( $select_data, $where_data, $table );
	
		if(count($result)>0){

			$update_data=$data;
		    
			$where_data=array(    // ----------------Array for check data exist ot not
			'id'     => $user['id']
			
         );
		   $results = $this->update_table_where( $update_data, $where_data, $table);
		   $query = $this->get_table_wheres( $select_data, $where_data, $table );
	          $sess_array = array();
			    $sess_array = array(
			    'id' => $query[0]['id'],
			    'username' => $query[0]['username'],
			    'name' => $query[0]['name']
				
		    );
			    
         $this->session->set_userdata('logged_in',$sess_array);
		
		   return $results;
		}

		
	}
	public function change_password($data) {
		
		$select_data="*";
		$where_data=array(    // ----------------Array for check data exist ot not
			'id'     => $data['id'],
			'password'=>md5($data['password'])
         );
		$table	="user";
		$result = $this->get_table_wheres( $select_data, $where_data, $table );
		if(count($result)==1){
			if($data['changepass']== $data['confirmpass']){
				$update_data=array(
			     'password'  =>md5( $data['changepass'])
		        );
				 $where_data=array(    // ----------------Array for check data exist ot not
			      'id'     => $data['id']
			 
                    );
					$this->update_table_where( $update_data, $where_data, $table);
					$res = 'true';
			}else{
				$res = 'missmatch';
			}
		}else{
			$res = 'incorrect';
		}
		return $res;
	}
	public function get_tripdetails() {
		$user_id=$this->session->userdata('logged_in')['id'];
		
		$this->db->select('count(g.booking_id) as total_count,f.status,f.promo_code,i.amount as off_amount,f.amount,f.user_id,f.id,f.booking_id,b.id as bus_id,b.bus_name,a.fare,c.pickup_point,a.board_point,a.drop_point,a.fare,a.board_time,a.drop_time ,d.bus_type,f.booking_date,f.payment_option,h.cancel_time,h.percentage,h.flat,h.type,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",g.customer_name,g.age,g.gender,g.seat_no)) SEPARATOR " <=> ") as customer');
			$this->db->from('route a'); 
			$this->db->join('bus b', 'a.bus_id=b.id', 'left');
			
			$this->db->join('bus_type d', 'd.id=b.bus_type_id', 'left');
			$this->db->join('bus_gallery e', 'e.bus_id=b.id', 'left');
			$this->db->join('booking_details f', 'f.rout_id=a.id', 'left');
			$this->db->join('board_points c', 'c.id=f.boarding_point_id', 'left');
			$this->db->join('customer_details g', 'g.order_id=f.id', 'left');
			$this->db->join('cancellation h', 'h.bus_id=b.id', 'left');
			$this->db->join('promo_details i', 'i.code=f.promo_code', 'left');
			//$this->db->where('a.board_point',$data->board_point);
			$this->db->where('f.user_id',$user_id);
			$this->db->where('f.status!=','');

			/*$this->db->where('f.payment_status','Completed');*/

			//$this->db->where('a.id','25');
			//$this->db->where('a.id',$data->route_id);
			$this->db->group_by('f.id'); 

			$this->db->order_by('f.id','desc'); 
			
			   
			$query = $this->db->get(); 
			 /*echo  $this->db->last_query() ; */
			$result = $query->result_array();
		 
			return $result;
		
	}
	public function get_rating() {
		
		$this->db->select('f.user_id,f.id,f.booking_id,b.id as bus_id,b.bus_name,a.fare,c.pickup_point,a.board_point,a.drop_point,a.fare,a.board_time,a.drop_time ,d.bus_type,f.booking_date,f.payment_option,g.email as customer_email,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",g.customer_name,g.age,g.gender)) SEPARATOR " <=> ") as customer');
			$this->db->from('route a'); 
			$this->db->join('bus b', 'a.bus_id=b.id', 'left');
			
			$this->db->join('bus_type d', 'd.id=b.bus_type_id', 'left');
			$this->db->join('bus_gallery e', 'e.bus_id=b.id', 'left');
			$this->db->join('booking_details f', 'f.bus_id=b.id', 'left');
			$this->db->join('board_points c', 'c.id=f.boarding_point_id', 'left');
			$this->db->join('customer_details g', 'g.order_id=f.id', 'left');
			
			//$this->db->where('a.board_point',$data->board_point);
		
			//$this->db->where('a.id',$data->route_id);
			$this->db->where('f.booking_date',date('d-m-Y',strtotime('-1 DAY')));
			$this->db->group_by('f.id'); 
			       
			$query = $this->db->get(); 
			$result = $query->result_array();
		return $result;
	}
	 function update_table_where( $update_data, $where_data, $table){	
	$this->db->where($where_data);
	$this->db->update($table, $update_data);
	
	
 }
 	public function cancel() {
      $select_data="*";
	  $update_data=array(
			     'status'     =>'Cancelled'
		        );
	 $where_data=array(    // ----------------Array for check data exist ot not
	  'booking_id'     => $data['id']
 
		);
		$table='booking_details';
	  $this->update_table_where( $update_data, $where_data, $table);
	  return true;
	}
	public function rating_update($data) {
		
		 $select_data="*";
		  $where_data=array(    // ----------------Array for check data exist ot not
	      'user_id'     => $data['user'],
		  'bus_id'     => $data['bus_id']
 
		  );
		  $table='rating';
		$result = $this->get_table_wheres( $select_data, $where_data, $table );
		if(count($result)==0){
			$average = ($data['quality']+$data['punctuality']+$data['behaviour'])/3;
			
			$update_data=array(
			  'bus_quality'     =>$data['quality'], 
			  'punctuality'     =>$data['punctuality'],
			  'Staff_behaviour'     =>$data['behaviour'],
			  'user_id'     => $data['user'],
		      'bus_id'     => $data['bus_id'], 
			  'average'     => $average,
			  'comments'     => $data['comments']
		    );
		 $table='rating';
		 
		 $this->db->insert($table, $update_data); 
		  return true;
		}else{
			return false;
		}
	}
	function deatils_book($data){
			$this->db->select('f.name,f.username,i.booking_id,i.booking_date,c.board_point,c.drop_point,b.bus_name,d.bus_type');
			$this->db->from('booking_details i'); 
		
			$this->db->join('bus b', 'i.bus_id=b.id', 'left');
			$this->db->join('route c', 'c.id=i.rout_id', 'left');
			$this->db->join('bus_type d', 'd.id=b.bus_type_id', 'left');
			$this->db->join('user f', 'f.id=i.user_id', 'left');
			
			
			
			
			
			
			
			$this->db->where('i.id',$data->order_id);
			 
		   $this->db->group_by('i.id'); 
			
			
			       
			$query = $this->db->get(); 
			$result = $query->result();
		 
			return $result[0];
		}
}