<?php 

class Cancellation_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 public function view_cancel_details(){
		 
		         $this->db->select('cancellation.id as id, cancellation.percentage, cancellation.cancel_time, cancellation.flat, bus.bus_name');
			     $this->db->from('cancellation' );
			     $this->db->join('bus', 'cancellation.bus_id = bus.id','left');
				  $this->db->where('bus.bus_status','1');
			     $this->db->group_by("cancellation.id");
				 
				    $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bus.created_by', $user);
					}
			    
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;  
	 }
	
	 function cancel_tickets($data){
		 
	
		 //$result = $this->db->insert('cancellation', $data);
		 //return $result;
		 
		 $data1 = array(							 
							 'bus_id' => $data ['bus_id'],
							 'advertisement_status' => $data ['advertisement_status'],
                             'cancel_time'=>$data ['cancel_time'],
                             'percentage'=>$data ['percentage'],
                             'flat'=>$data ['flat'],
                             'type'=>$data ['type']

                                        );										
						      $this->db->insert('cancellation', $data1);

						      return "success";
		 

	 }
	 
	 public function get_bus_details(){
		 
		    $this->db->select('bus.id, bus.bus_name, cancellation.bus_id');
		    $this->db->from('bus' );
			$this->db->join('cancellation', 'bus.id = cancellation.bus_id','left');
			//$this->db->join('cancellation ON bus.id = cancellation.bus_id','left');
			$this->db->where('bus_status','1');
			$query = $this->db->where('NOT EXISTS (select * from cancellation where bus.id=cancellation.bus_id)', '', FALSE);
			
			 $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bus.created_by', $user);
					}
			
			
		    $query = $this->db->get();
		    $result = $query->result();
		 
		    return $result;
		
	 }
	 
	 public function get_single_cancel($id){
		 
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('cancellation');
		 $result = $query->row();
		 return $result;
	 }
	 
	 public function edit_cancel_details($data ,$id){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('cancellation', $data);
		 return $result;
	 }
	 
	 public function edi_bus_details(){
		 
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
	 
	 public function cancellation_delete($id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->delete('cancellation');
		 if($result)
		 {
			return "success"; 
		 }
		 else
		 {
			 return "error";
		 }
	 }
	 
	 function view_popup_cancellation($id){
		 
		       $this->db->select('cancellation.*, bus.id, bus.bus_name');
			   $this->db->from('cancellation');
			   $this->db->join('bus','cancellation.bus_id = bus.id','left');
			   
			   $this->db->where('cancellation.id',$id);
			   $query = $this->db->get();
			   $result = $query->row();
			   return $result;
	 }
	 

	
}
	
	