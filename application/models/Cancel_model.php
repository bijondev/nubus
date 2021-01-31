<?php 

class Cancel_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
		$model = Mage::getModel(form/form)->setData($data);
 	}
	
	
	
	
	function cancelation_ticket($data) {
	
           
			   $this->db->select('id');
			   $this->db->where('username',$data['username']);
			   $query=$this->db->get('user');
			   $row1 = $query->row();
			   if(!empty($row1)){
			   
			   
			   $this->db->select('booking_details.id as id,booking_details.*,booking_details.booking_date,user.username,bus.bus_name,route.board_point,
			   route.drop_point,route.board_time,customer_details.customer_name,customer_details.age,customer_details.gender,customer_details.seat_no');

			   $this->db->from('booking_details');
			   $this->db->join('user','user.id = booking_details.user_id','left');
			   $this->db->join('bus', 'booking_details.bus_id=bus.id', 'left');
			   $this->db->join('route', 'route.id=booking_details.rout_id', 'left');
			   $this->db->join('customer_details', 'booking_details.id = customer_details.order_id', 'left');
			   //$this->db->join('booking_details', 'booking_details.id = customer_details.order_id', 'left');
			   
			   
			   $this->db->where('booking_details.booking_id',$data['booking_id']);
			   $this->db->where('booking_details.user_id',$row1->id);
			   $query = $this->db->get();
			   $row = $query->row();
			   //var_dump($row); exit;
			   $id=$row1->id;
			  // return $row; 

		       if(count($row)>0){
						
				       $datas = array('status' => 'Cancelled','payment_status' => 'Cancelled');
					   $this->db->where('user_id',$id);
					   $this->db->where('booking_id',$data['booking_id']);
					   $result = $this->db->update('booking_details', $datas);
					  // echo $this->db->last_query();
					   return $row; 
					   
				   
			   }
			   else
			   {
				   return false;
			   }
			    }else
			   {
				   return false;
			   }

			   
			   


		      
	}
	
	
}