<?php 

class Search_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
		
		function select_bus($data){
			
			
			$this->db->select('b.id as bus_id,j.totel_seat,j.layout,
			a.id as route_id,b.bus_name,a.board_point,a.drop_point,a.fare,
			a.board_time,a.drop_time ,d.bus_type,h.cancel_time,h.percentage,
			h.flat,h.type,
			GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",c.pickup_point,c.pickup_time,c.landmark,c.address,c.id)) SEPARATOR " <=> ") as points,
			GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",g.stoping_point,g.drop_time,g.landmark,g.address)) SEPARATOR " <=> ") as droppoints,
			GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",e.image)) SEPARATOR " <=> ") as gallery,
			GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",f.amenities)) SEPARATOR " <=> ") as amenities,ROUND(AVG(i.average),1) AS AvgPrice,
			GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",k.seat_no)) SEPARATOR " <=> ") as existseat,i.bus_quality,i.punctuality,i.Staff_behaviour');
			
			$this->db->from('route a'); 
			$this->db->join('bus b', 'a.bus_id=b.id', 'left');
			$this->db->join('board_points c', 'c.board_point=a.id AND c.status = 1', 'left');
			$this->db->join('bus_type d', 'd.id=b.bus_type_id', 'left');
			$this->db->join('bus_gallery e', 'e.bus_id=b.id', 'left');
			$this->db->join('amenities f', 'FIND_IN_SET(f.id,b.amenities_id) > 0', 'left');
			$this->db->join('drop_points g', 'g.drop_point=a.id AND g.status = 1', 'left');
			$this->db->join('cancellation h', 'h.bus_id=b.id', 'left');
			$this->db->join('rating i', 'i.bus_id=b.id', 'left');
			$this->db->join('seat_layout j', 'j.bus_id=b.id', 'left');
			$this->db->join('booking_details k', 'k.bus_id=b.id', 'left');
			$this->db->where('a.board_point',$data->board_point );
			$this->db->where('a.drop_point',$data->drop_point);
			$this->db->where('b.bus_status','1');
		   /* $this->db->where('c.status=','1');
			 */
			$this->db->group_by('b.id'); 
			$query = $this->db->get(); 
			$result = $query->result_array();
			/*echo $this->db->last_query();*/
			return $result;
		}





             

		function select_booking_seat($bus_id,$route_id,$date)
		{
			$originalDate = $date;
            $newDate = date("d-m-Y", strtotime($originalDate));
			$table="booking_details";
			$this->db->select('GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",seat_no)) SEPARATOR " <=> ") as existseat');
			$this->db->where('rout_id',$route_id);
			$this->db->where('bus_id',$bus_id);
			$this->db->where('booking_date',$newDate);
			$this->db->where('status','Booking');
		
			$query  = $this->db->get($table);
			/*echo $this->db->last_query()*/  //--- Table name = User
			$result = $query->result_array(); 
			return $result;	
			
		}
		function select_one_bus($data){
			
			$this->db->select('b.id as bus_id,b.bus_name,j.layout,b.bus_name,c.pickup_point	,c.pickup_time,a.board_point,a.drop_point,a.fare,a.board_time,a.drop_time ,d.bus_type,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",c.pickup_point,c.pickup_time)) SEPARATOR " <=> ") as points,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",e.image)) SEPARATOR " <=> ") as gallery');
			$this->db->from('route a'); 
			$this->db->join('bus b', 'a.bus_id=b.id', 'left');
			$this->db->join('board_points c', 'c.board_point=a.id', 'left');
			$this->db->join('bus_type d', 'd.id=b.bus_type_id', 'left');
			$this->db->join('bus_gallery e', 'e.bus_id=b.id', 'left');
			$this->db->join('seat_layout j', 'j.bus_id=b.id', 'left');
			
			//$this->db->where('a.board_point',$data->board_point);
			//$this->db->where('a.drop_point',$data->drop_point);
			  $this->db->where('a.id',$data->route_id);
			//$this->db->where('c.id',$data->boarding_point_id);
			$this->db->group_by('b.id'); 
			
			       
			$query = $this->db->get(); 
			$result = $query->result_array();
		 
			return $result;
		}






		function filter_option($data){
			
			$this->db->select('b.id as bus_id,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",g.stoping_point)) SEPARATOR " <=> ") as drop_points,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",f.amenities)) SEPARATOR " <=> ") as amenities,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",b.bus_name,d.bus_type)) SEPARATOR " <=> ") as bus_name,GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",c.pickup_point)) SEPARATOR " <=> ") as points');
			$this->db->from('route a'); 
			$this->db->join('bus b', 'a.bus_id=b.id', 'left');
			$this->db->join('board_points c', 'c.board_point=a.id AND c.status = 1', 'left');
			$this->db->join('bus_type d', 'd.id=b.bus_type_id AND d.status = 1' , 'left');
			$this->db->join('bus_gallery e', 'e.bus_id=b.id', 'left');
			$this->db->join('amenities f', 'FIND_IN_SET(f.id,b.amenities_id) > 0 AND f.status = 1', 'left');
			$this->db->join('drop_points g', 'g.drop_point=a.id AND g.status = 1', 'left');
			$this->db->where('a.board_point',$data->board_point);
			$this->db->where('a.drop_point',$data->drop_point);
			 $this->db->where('b.bus_status','1');
			
			       
			$query = $this->db->get(); 
			$result = $query->result();
		 //echo $this->db->last_query();
			return $result;
		}
		function rating_details($data){

			$this->db->select('c.id,c.name,c.username,i.bus_quality,i.punctuality,i.Staff_behaviour,i.average,d.booking_date');
			$this->db->from('rating i'); 
		
			//$this->db->join('bus b', 'i.bus_id=b.id', 'left');
			$this->db->join('booking_details d', 'd.bus_id=i.bus_id', 'left');
			$this->db->join('user c', 'c.id=i.user_id', 'left');
			
			
		   $this->db->where('i.bus_id',$data->bus_id);
			 
		   $this->db->group_by('i.user_id'); 
			
			
			$query = $this->db->get(); 
			$result = $query->result_array();
		 
			return $result;
		}
		
		 function get_table_where( $select_data, $where_data, $table){
        
			$this->db->select($select_data);
			$this->db->where($where_data);
			$query  = $this->db->get($table);  //--- Table name = User
			$result = $query->result_array(); 
			return $result;	
        }
        function select_settings( ){
        
			
			
			$query  = $this->db->get('setting');  //--- Table name = User
			$result = $query->result(); 
			return $result;	
        }
}