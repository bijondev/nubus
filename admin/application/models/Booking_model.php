<?php 

class Booking_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	   	 function get_bookindetails(){
					  
			   
			     $this->db->select('pm.amount as offamount,bd.id as id, bd.booking_id, bd.payment_status,customer_details.customer_name, bd.amount, bs.bus_name, rt.drop_point, rt.board_point, rt.drop_time, rt.board_time, bd.booking_date, GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",customer_details.customer_name,customer_details.age,customer_details.gender,customer_details.seat_no)) SEPARATOR " <=> ") as customer');
				 $this->db->from('booking_details as bd' );
			     $this->db->join('customer_details', 'bd.booking_id = customer_details.booking_id','left'); 
				 $this->db->join('bus as bs', 'bs.id = bd.bus_id','left');
				 $this->db->join('route as rt', 'rt.id = bd.rout_id','left');
				  $this->db->join('promo_details as pm', 'pm.code = bd.promo_code','left');
				 
				 $this->db->where('bs.bus_status','1');	
				  $this->db->where('bd.payment_status!=','');							
			     $this->db->group_by("bd.id");
				 
				  $menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bs.created_by', $user);
					}

			     $result = $this->db->get()->result();	
			    			 
			     return $result;  
			    
	 }
	     
		 function view_popup_booking($id){
			 
	              $this->db->select('bd.id as id, bd.booking_id, bd.payment_status, bd.amount, bs.bus_name, rt.drop_point, rt.board_point, rt.drop_time, rt.board_time, bd.booking_date, GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",customer_details.customer_name,customer_details.age,customer_details.gender,customer_details.seat_no)) SEPARATOR " <=> ") as customer');
				  
				
				 $this->db->from('booking_details as bd' );
			     $this->db->join('customer_details', 'bd.booking_id = customer_details.booking_id','left'); 
				 $this->db->join('bus as bs', 'bs.id = bd.bus_id','left');
				 $this->db->join('route as rt', 'rt.id = bd.rout_id','left');
				 $this->db->where('bd.id',$id);
			    
				 
				 $query = $this->db->get();
			     $result = $query->result();
				 
			     return $result;  
				
		 }
		 
	
		 
		 
}