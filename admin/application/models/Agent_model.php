<?php 

class Agent_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	 public function get_agent_details(){
		  
		 $query = $this->db->get('agent');
		 $result = $query->result();
		 return $result;

	 }
	 
	 public function add_aget($data){
	 	$data['password']=md5($data['password']);
		 
		 $result = $this->db->insert('agent', $data);
		 return $result;
	 }
	 
	/* public function get_bustype_id(){
		 
		 $query = $this->db->get('bus_type');
		 $result = $query->result();
		 return $result;
	 }*/
	 
	 public function editget_bustype_id($id){
		 
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('agent');
		 $result = $query->row();
		 return $result;
	 }
	 
	 public function edit_aget($data, $id){
		 
	     $this->db->where('id',$id);
		 $result = $this->db->update('agent',$data);
		 return $result; 
	 }
	/* public function get_bustypeid(){
		 
		 $query = $this->db->get('bus_type');
		 $result = $query->result();
		 return $result;
	 }*/
	 
	 public function delete_agent($id){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->Delete('agent');
		 if($result){
			 echo "success";
		 }
		 else
		 {
			 echo "error";
		 }	 
		 
		 
	 }
	 
	 public function view_popup_agentdetails($id){
		  
		 $this->db->where('id', $id);
		 $query = $this->db->get('agent');
		 $result = $query->row();
		 return $result;

	 }
		 
	 
}
?>
	