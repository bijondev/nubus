<?php 

class Payment_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
 	public function add_payment_details($data){

 		$query=$this->db->insert('payment',$data);
 		return $query;

 	}
 	public function 
 	dd($id){

        $this->db->where('id',$id);
 		$query=$this->db->get('payment');
 		return $query;

 	}
 	public function edit_payment_details($id){
        $this->db->where('id',$id);
 		$query=$this->db->get('payment');
 		return $query;

 	}
 	public function update_payment_details($id,$data){
        $this->db->where('id',$id);
 		$query=$this->db->update('payment',$data);
 		return $query;

 	}
 	public function delete_payment_details($id,$data){
        $this->db->where('id',$id);
 		$query=$this->db->update('payment',$data);
 		return $query;

 	}
	
	
}

?>