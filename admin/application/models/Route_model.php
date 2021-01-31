<?php 

class Route_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	 function get_busdetails(){
	   
			   /*$query = $this->db->get('route');
			   $result = $query->result();
			   return $result;*/
				 
                 $this->db->select('route.id as id, route.board_point, route.board_time, route.drop_point, route.drop_time,
				 route.fare, bus.bus_name');
			     $this->db->from('route' );
			     $this->db->join('bus', 'route.bus_id = bus.id','left');
				 $this->db->where('route.status = 1', $user);
				 $this->db->where('bus.bus_status','1');
			     $this->db->group_by("route.id");
				 
				    $menu = $this->session->userdata('admin');
					if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bus.created_by', $user);
					}
			    
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;			   
     }
	 
	 function  routedetails_add($data){
			   
			   $result = $this->db->insert('route', $data);
			   return $result;
			   
			  /* $data1 = array(
			           
					   'bus_id' => $data['bus_id'],
					   'board_point' => $data['board_point'],
					   'board_time' => $data['board_time'],
					   'drop_point' => $data['drop_point'],
					   'drop_time' => $data['drop_time'],
					   'fare' => $data['fare'],
					   'created_by' => $data['created_by']
			   );
			
			    $this->db->insert('route', $data1);
			    return "success";*/
     }
	 
	 public function get_busname() {		 
		            
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
	  
	  public function get_busnames() {
		  
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
	 
	 function get_single_route($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('route');
			   $result = $query->row();
			   return $result;  
	   }
	   
	 function route_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('route', $data); 
			   return "Success";
	 }
	 
	 function view_popup_route($id){
		 
		       $this->db->select('route.*, bus.id, bus.bus_name');
			   $this->db->from('route');
			   $this->db->join('bus','route.bus_id = bus.id','left');
			   
			   $this->db->where('route.id',$id);
			   $query = $this->db->get();
			   $result = $query->row();
			   return $result;
	 }
	 
	 	
      function routeupdate_delete_status($id, $data1)
	  {
		         $this->db->where('id',$id);
				 $result = $this->db->update('route',$data1);
				 return $result;
	  }
	 
		
}
?>