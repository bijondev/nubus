<?php 

class AdminLogin_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
 	}
	
	
	       function login($username, $password) {
			   
			   
			                 $this->db->where('username',$username);					 
							 $this->db->where('password',$password);							 
							 $query=$this->db->get('admin');
							 $query_value=$query->row();

							        if ($query -> num_rows() == 1) {
									return $query_value;
								    }

					   else{
							 
						  $this -> db -> where('status', '1');
			          	  $this->db->where('username',$username);					 
					      $this->db->where('password',$password);
					 
						  $query=$this->db->get('agent');
						  $query_value=$query->row();

						 
					   
								   if ($query -> num_rows() == 1) {
								   return $query_value;
								   }
													
					   }
		   }
	
}