<?php 

class Model_seat extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	function deatils($data) {
		$table1 ="seat_layout";
		
		
		$select_data="*";
		  $where_data=array(    // ----------------Array for check data exist ot not
	      'bus_id'     => $data->bus
		 
 
		  );
		  
		$result = $this->get_table_wheres( $select_data, $where_data, $table1 );
		if(count($result)==0){
			$bid ='TRB'.strtotime(date('m/d/Y H:i:s'));
			$insert_data=array(
				'bus_id'=>$data->bus ,
				'bus_type'=>$data->bus_type,
				'totel_seat'=>$data->totel_seat,
				'layout'=>json_encode($data->layout),
				'layout_type'=>$data->layout_type,
				'last_seat'=>$data->last_seat	
			);
			$this->db->insert($table1, $insert_data);
			return true;
		}else{
			return false;
		}
			
	}
	function get() {
		$select_data="*";
		  $where_data=array(    // ----------------Array for check data exist ot not
	      'id'     => '47'
		 
 
		  );
		  $table='seat_layout';
		$result = $this->get_table_wheres( $select_data, $where_data, $table );
		return $result ;
	}
	function exist($data) {
		$select_data="*";
		  $where_data=array(    // ----------------Array for check data exist ot not
	      'seat_no'     => '3'
		 
 
		  );
		  $table='booking_details';
		
		$this->db->select('*');
		$this->db->where("FIND_IN_SET('".$data."',seat_no) ");
		 
		$query  = $this->db->get($table); 
       		//--- Table name = User
		$result = $query->result_array();
		if(count($result)>0){
			return true;
		}else{
			return false;
		}
		
	}
	function get_label() {
		$select_data="*";
		  $where_data="";
		  $table='seat_layout';
		
		$this->db->select($select_data);
		
		 
		$query  = $this->db->get($table); 
       		//--- Table name = User
		$result = $query->result_array(); 
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
   
   function get_selectbus(){
	           
			   
				 $menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bus.created_by', $user);
					}
					
	           $this->db->where('bus_status','1');
	           $query = $this->db->get('bus');
			   $result = $query->result();
			   return $result;
   }

}