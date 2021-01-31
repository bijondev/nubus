<?php 

class Blogs_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	
	
	   	  public function get_blogdetails(){
					  
			 $query = $this->db->get('blogs');
		     $result = $query->result();
		     return $result;   
			    
	    }
		
		  public function editget_blogs_id($id){
		 
			 $query = $this->db->where('id',$id);
			 $query = $this->db->get('blogs');
			 $result = $query->row();			
			 return $result;
	    }
		
		  public function edit_blog_details($data, $id){
		 
			 $this->db->where('id',$id);
			 $result = $this->db->update('blogs',$data);
			  
			  return $result;			 
			 
	    }

          public function get_singlecustomer($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('customer');
			   $result = $query->row();
			   return $result;  
	    }	
		
          public function customer_edit($data, $id){
		       md5($data, id);
			   $this->db->where('id', $id);
			   $result = $this->db->update('customer', $data); 
			   return "Success";
	    }		
 
}