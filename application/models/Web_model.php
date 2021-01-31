<?php 

class Web_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}

 	public function check_user($data){ 	
 		$this->db->where('username',$data['email_id']);
		$this->db->or_where('mob',$data['phone_no']);
		return $query = $this->db->get('user')->num_rows();	
	}

	public function check_mail($data){ 	
 		$this->db->where('username',$data['email_id']);
		return $query = $this->db->get('user')->row();	
	}
	
 	public function reg_user($data){
 		$user = array('username'=>$data['email_id'],'password'=>md5($data['password']),'mob'=>$data['phone_no']);
 		$this->db->insert('user',$user);
 		$last_id = $this->db->insert_id();
 		$this->db->where('id',$last_id);
 		return $query = $this->db->get('user')->row();
 	}

 	public function update_user($data){
 		$this->db->where('id',$data['id']);
 		$this->db->update('user',$data);
 		return true;
 	}

 	public function log_user($data){
 		$mobile = $data['phone_no'];
 		if (is_numeric($mobile)) {
 			$this->db->where('mob',$mobile);
 			$this->db->where('password',md5($data['password']));
			$user= $this->db->get('user')->row();
 		}
 		else{
 			$this->db->where('username',$mobile);
 			$this->db->where('password',md5($data['password']));
			$user= $this->db->get('user')->row();
 		}
 		return $user;
 	}

  	public function change_password_forgot($data){
 		$this->db->where('id',$data['id']);
 		$this->db->update('user',$data);
 		return true;
 	}

 	public function search_city($data){
 		$this->db->distinct();
        $this->db->select('*')->from('route');  
        $this->db->like("".$data["type"]."",$data['term'],'after');  
		$this->db->group_by('route.'.$data["type"].'');
        return $this->db->get()->result();
 	}

 	public function check_password($data){
 		$this->db->where('id',$data['id']);
		$this->db->where('password',md5($data['oldP']));
		return $query = $this->db->get('user')->row();	
 	}

 	public function change_password($data){
 		$this->db->where('id',$data['id']);
 		$this->db->update('user',$data);
 		return true;
 	}

 	public function bus_search($data){
		$this->db->select('b.id as bus_id,j.totel_seat,j.layout,a.id as route_id,b.bus_name,a.board_point,a.drop_point,a.fare,a.board_time,a.drop_time ,d.bus_type,h.cancel_time,h.percentage,h.flat,h.type,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",c.pickup_point,c.pickup_time,c.landmark,c.address,c.id)) SEPARATOR " <=> ") as points,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",g.stoping_point,g.drop_time,g.landmark,g.address)) SEPARATOR " <=> ") as droppoints,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",e.image)) SEPARATOR " <=> ") as gallery,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",f.amenities)) SEPARATOR " <=> ") as amenities,ROUND(AVG(i.average),1) AS AvgPrice,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",k.seat_no)) SEPARATOR " <=> ") as existseat,i.bus_quality,i.punctuality,i.Staff_behaviour');
		$this->db->from('route a'); 
		$this->db->join('bus b', 'a.bus_id=b.id', 'left');
		$this->db->join('board_points c', 'c.board_point=a.id', 'left');
		$this->db->join('bus_type d', 'd.id=b.bus_type_id', 'left');
		$this->db->join('bus_gallery e', 'e.bus_id=b.id', 'left');
		$this->db->join('amenities f', 'FIND_IN_SET(f.id,b.amenities_id) > 0', 'left');
		$this->db->join('drop_points g', 'g.drop_point=a.id', 'left');
		$this->db->join('cancellation h', 'h.bus_id=b.id', 'left');
		$this->db->join('rating i', 'i.bus_id=b.id', 'left');
		$this->db->join('seat_layout j', 'j.bus_id=b.id', 'left');
		$this->db->join('booking_details k', 'k.bus_id=b.id', 'left');
		$this->db->where('a.board_point',$data['from'] );
		$this->db->where('a.drop_point',$data['to']);
		$this->db->where('b.bus_status','1');
		$this->db->group_by('b.id'); 
		       
		$query = $this->db->get(); 
		$result = $query->result_array();
	 
		return $result;
 	}

 	public function select_booking_seat($bus_id,$route_id,$date)
		{
			$originalDate = $date;
            $newDate = date("d-m-Y", strtotime($originalDate));
			$table="booking_details";
			$this->db->select('GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",seat_no)) SEPARATOR " <=> ") as existseat');
			$this->db->where('rout_id',$route_id);
			$this->db->where('bus_id',$bus_id);
			$this->db->where('booking_date',$newDate);
			$this->db->where('status','Booking');
		
			$query  = $this->db->get($table);  //--- Table name = User
			$result = $query->result_array(); 
			return $result;	
			
		}

 	public function get_trip_details($data){
 		$this->db->select('f.status,f.user_id,f.id,f.booking_id,b.id as bus_id,b.bus_name,a.fare,c.pickup_point,a.board_point,a.drop_point,a.fare,a.board_time,a.drop_time ,d.bus_type,f.booking_date,f.amount,f.payment_option,h.cancel_time,h.percentage,h.flat,h.type,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",g.customer_name,g.age,g.gender,g.seat_no)) SEPARATOR " <=> ") as customer');
			$this->db->from('route a'); 
			$this->db->join('bus b', 'a.bus_id=b.id', 'left');
			
			$this->db->join('bus_type d', 'd.id=b.bus_type_id', 'left');
			$this->db->join('bus_gallery e', 'e.bus_id=b.id', 'left');
			$this->db->join('booking_details f', 'f.rout_id=a.id', 'left');
			$this->db->join('board_points c', 'c.id=f.boarding_point_id', 'left');
			$this->db->join('customer_details g', 'g.order_id=f.id', 'left');
			$this->db->join('cancellation h', 'h.bus_id=b.id', 'left');
			$this->db->where('f.user_id',$data['id']);
			//$this->db->where('a.id','25');
			//$this->db->where('a.id',$data->route_id);
			//$this->db->where('f.status','Booking');
			$this->db->group_by('f.id'); 
			$this->db->order_by('f.id','desc'); 
			$query = $this->db->get(); 
			$result = $query->result_array();
			return $result;

 	}

 	public function filter_option($data){
			
			$this->db->select('b.id as bus_id,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",g.stoping_point)) SEPARATOR " <=> ") as drop_points,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",f.amenities)) SEPARATOR " <=> ") as amenities,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",b.bus_name,d.bus_type)) SEPARATOR " <=> ") as bus_name,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",c.pickup_point)) SEPARATOR " <=> ") as points');
			$this->db->from('route a'); 
			$this->db->join('bus b', 'a.bus_id=b.id', 'left');
			$this->db->join('board_points c', 'c.board_point=a.id', 'left');
			$this->db->join('bus_type d', 'd.id=b.bus_type_id', 'left');
			$this->db->join('bus_gallery e', 'e.bus_id=b.id', 'left');
			$this->db->join('amenities f', 'FIND_IN_SET(f.id,b.amenities_id) > 0', 'left');
			$this->db->join('drop_points g', 'g.drop_point=a.id', 'left');
			$this->db->where('a.board_point',$data['from']);
			$this->db->where('a.drop_point',$data['to']);
			 $this->db->where('b.bus_status','1');
			       
			$query = $this->db->get(); 
			$result = $query->result();
		 
			return $result;
	}

	public function booking( $data){
			$table1 ="booking_details";
			$bid ='TRB'.strtotime(date('m/d/Y H:i:s'));
			$insert_data=array(
				'booking_id'=>$bid ,
				'bus_id'=>$data['bus_id'],
				'rout_id'=>$data['route_id'],
				'amount'=>$data['amount'],
				'boarding_point_id'=>$data['brdPoint'],
				'user_id'=>$data['user_id'],
				'booking_date'=>$data['bdate'],
				'seat_no'=>$data['seat'],
				'payment_status'=>'Completed', // only after payment
				'payment_option'=>'paypal',  // only after payment
				'status'=>'Booking'   // only after payment

			);
			$this->db->insert($table1, $insert_data);
			$last_insert_id = $this->db->insert_id();

			// INSERT INTO CUSTOMER TABLE
			$seat_no = array();
			$no =$data['seat'];
			$seat_no = explode(',',$no);
			$arr='';
			for($i=0;$i<count($data['customer']['name']);$i++){
				$arr[$i]['customer_name'] =$data['customer']['name'][$i];
				$arr[$i]['order_id'] =$last_insert_id ;
				$arr[$i]['age'] =$data['customer']['age'][$i];
				$arr[$i]['gender'] =$data['customer']['gender'][$i];
				$arr[$i]['mobile'] =$data['customer']['mobile'];
				$arr[$i]['email'] =$data['customer']['email'];
				$arr[$i]['booking_id'] =$bid ;
				$arr[$i]['seat_no'] =$seat_no[$i] ;
			}
			$table ="customer_details";
			$this->db->insert_batch($table, $arr);

			$table="booking_details";
			$select_data="id,booking_id";
			$where_data = array('id'   => $last_insert_id);
			$bookResult = $this->get_table_where($select_data, $where_data, $table);
			return $bookResult;
	}

	public function get_table_where( $select_data, $where_data, $table){
        
			$this->db->select($select_data);
			$this->db->where($where_data);
			$query  = $this->db->get($table); 
			$result = $query->row(); 
			return $result;	
    }

    public function mail_details_bookingID( $data){
			$this->db->select('a.username,c.bus_name,b.booking_id,f.board_point,f.drop_point,f.board_time,b.booking_date,b.amount,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",d.customer_name,d.age,d.gender,d.seat_no)) SEPARATOR " <=> ") as customer,b.seat_no ,g.pickup_point,COUNT("d.booking_id") AS count,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",d.email)) SEPARATOR " <=> ") as email');
			$this->db->from('user a'); 
			//$this->db->join('bus b', 'i.bus_id=b.id', 'left');
			$this->db->join('booking_details b', 'b.user_id=a.id', 'left');
			$this->db->join('bus c', 'b.bus_id=c.id', 'left');
			$this->db->join('customer_details d', 'd.order_id=b.id', 'left');
			$this->db->join('route f', 'b.rout_id=f.id', 'left');
			$this->db->join('board_points g', 'g.board_point=f.id', 'left');
			
			$this->db->where('b.booking_id',$data);  
			
			$query = $this->db->get(); 
			$result = $query->result_array();
		 
			return $result;
	}

	public function check_ticket($data){
		$this->db->select('id');
		$this->db->from('booking_details');
		$this->db->where('booking_id',$data['booking_id']);
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('status','booking');
		return $query = $this->db->get()->row();
	}

	public function cancel_status($data){
		$this->db->where('id',$data['id']);
		$this->db->update('booking_details',$data);
		return true;
			
	}

 }

 ?>