<?php 

class Borderpoint_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	
	 function get_borderdetails(){
					  
			   /*$query = $this->db->get('board_points');
			   $result = $query->result();
			   return $result;	*/
			   
				 $this->db->select('bp.id as id, bp.pickup_point, bp.landmark, bp.address, bp.pickup_time, bus.bus_name, route.board_point');
			     $this->db->from('board_points as bp' );
			     $this->db->join('route', 'bp.board_point = route.id','left');
			     $this->db->join('bus', 'bp.bus_id = bus.id','left');
				 
				 $this->db->where('bp.status = 1', $user);
				 $this->db->where('bus.bus_status','1');
			     $this->db->group_by("bp.id");
				 
				  $menu = $this->session->userdata('admin');
					    if($menu!='1'){						
						$user = $this->session->userdata('id');
						$this->db->where('bus.created_by', $user);
					}
			    
				 $query = $this->db->get();
			     $result = $query->result();
			     return $result;  
			    
	 }

     function  boardpointdetails_add($data){
		   
			   $result =$this->db->insert('board_points',$data);
			   return $result;
     }	

      public function get_busnamedetails() {
		               
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

     public function get_busroutedetails($id) {
		 
				
				$this->db->where('bus_id', $id);
				$query = $this->db->get('route');
			    $result = $query->result();
									
					return $result;
					 
	   } 
	 
	 function get_single_boardpoint($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('board_points');
			   $result = $query->row();
			   return $result;  
	 }
	 
	 function boardpoint_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('board_points', $data); 
			   return "Success";
	 }
	 
	  public function get_busdetails() {
		  
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
	 
	 public function get_routeboardpoint() {
	
		        //$this->db->where('id', $id);
				$id=$_POST['value'];
				$this->db->where('bus_id', $id);
				$query = $this->db->get('route');
			    $result = $query->result();
				
				foreach($result as $editrouteget)
				{
					echo '<option value="'.$editrouteget->id.'">'. $editrouteget->board_point.' </option>';
				}
			
				    return $result; 	

              
	 } 
	 
	 function boardupdate_delete_status($id, $data1){
		 
			   /*var_dump($id);
			   $this->db->where('id', $id);
			   $result = $this->db->delete('board_points');	
			   if($result){
			   return "success";
			   
		       }
		       else
			   {
			   return "error";
		       }*/
			     $this->db->where('id',$id);
				 $result = $this->db->update('board_points',$data1);
				 return $result;
	 }
	 
	 
	 function view_popup_boardpoint($id){
		 
		       $this->db->select('board_points.*, bus.id, bus.bus_name, route.board_point');
			   $this->db->from('board_points');
			   $this->db->join('bus','board_points.bus_id = bus.id','left');
			   $this->db->join('route','route.id = board_points.board_point','left');
			   
			   $this->db->where('board_points.id',$id);
			   $query = $this->db->get();
			   $result = $query->row();
			   return $result;
	 }
}