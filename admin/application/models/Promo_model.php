 <!-- promo code Management  created by Anju MS on 07-12-2016-->
<?php 

class Promo_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}


     function checkpromo($data){

     	$this->db->where('code',$data['code']);

      	 $query = $this->db->get('promo_details');
      	
			   $result = $query->result();

			   return $result;
			    
     }

 	//insert Promodetails

 	
 	 function  promodetails_add($data){
				
			   $result = $this->db->insert('promo_details', $data);
			   return $result;
     }
      //retrieve all promo code details
      function get_promodetails(){

      	 $query = $this->db->get('promo_details');
			   $result = $query->result();
			   return $result;
			    
     }
    //retrieve promodetails by id
     function get_single_promo($id){
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('promo_details');
			   $result = $query->row();
			   return $result;  
	   }
//edit promo details
	    function promodetails_edit($data, $id){
		    
			   $this->db->where('id', $id);
			   $result = $this->db->update('promo_details', $data);
			   return $result;
	 }
	 public function promoupdate_delete_status($id){
		 
				 $this->db->where('id',$id);
				 $result = $this->db->delete('promo_details');
				 return $result;
	     }

	     function get_promopopupdetails($id){
	
				$this->db->select('*'); 

				$this->db->where('id',$id); 
                $this->db->from('promo_details');
                  				             
                
                $query = $this->db->get();			
			    $result = $query->row();	
			    return $result;				
	         }

	       
 }
 ?>