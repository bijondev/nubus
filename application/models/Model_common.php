<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_common extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
   }
    function get_settings_details($id){ 
	
       $select_data = "*"; 
		$where_data = array(	// ----------------Array for check data exist ot not
			'id'     => 1
	    );
			
		$table = "setting";  //------------ Select table
		$result = $this->get_table_where( $select_data, $where_data, $table );
		return $result;	
}

function get_email_template($id){ 
       $select_data = "*"; 
		$where_data = array(	// ----------------Array for check data exist ot not
			'id'     => $id
	    );
			
		$table = "ot_mail_template";  //------------ Select table
		$result = $this->get_table_where( $select_data, $where_data, $table );
		
		return $result;	
}

function get_table_where( $select_data, $where_data, $table){
        
		$this->db->select($select_data);
		$this->db->where($where_data);
		
		$query  = $this->db->get($table); 
       		//--- Table name = User
		$result = $query->row(); 
		
		return $result;	
   }	
}
  