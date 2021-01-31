<?php 

class Home_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	function get_board_point($data) {
		
		$this->db->distinct();
        $this->db->select('*')->from('route');  
        $this->db->like("".$data["type"]."",$data['term'],'after');  
		$this->db->group_by('route.'.$data["type"].'');
        $query1 = $this->db->get();      
         $query = $query1->result(); 
		
		 if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'value' => $row->$data["type"],  
                                     );  //Add a row to array  
            }  
        }  
		return $data;
	}
	

}