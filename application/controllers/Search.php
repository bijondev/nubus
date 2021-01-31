<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
   
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		 $this->load->model('search_model');
 	}
	
	public function index()
	{
		$template['page'] = "Search/search";
		$template['page_title'] = "Book Ticket - Search Buses";
		$template['logo'] = get_settings_details(1);
		$this->load->view('template', $template);
	}
	public function select_bus() {
		 
		$data = file_get_contents("php://input");
		$request = json_decode($data);
		/*var_dump($request);
		die;
		*/
		$result = $this->search_model->select_bus($request);

		$i=0;
			$droppointw=""; 
			$droppointD=""; 
			$existseat4='';
			$points='';
			$singlep='';
			$new_result = array();



			foreach($result as $results){

				$gallery = array();
				$amenitie = array();
				$singlep = array();
				$droppointw = array();
				$droppointD = array(); 

			   if(!empty($results)) {	
					$layout =json_decode($results['layout']);
					$length = sizeof($layout);
					$new_array = array();
					$single =array();
					$seatexisting = $this->search_model->select_booking_seat($results['bus_id'],$results['route_id'],$request->dates);
					$existseat2=array();
					if($seatexisting[0]['existseat']!=null){
						$existseat= array_map('trim', explode('<=>',$seatexisting[0]['existseat'])); 
						 
						foreach($existseat as $existseatm){				
							$existseat5=array_map('trim', explode(',',$existseatm));
							$existseat2=array_merge($existseat2,$existseat5);				
						}
						
					}
						
					if($layout) {
						foreach($layout as $layouts ){	
							foreach($layouts as $row ){	
								if($existseat2 !=null && in_array($row->seat_no, $existseat2)){
									$row->status='true';
								}else{
									$row->status='false';
								}
							array_push($single ,$row);
						}
							array_push($new_array ,$layouts);
						}
					}
						
						
					if($results['cancel_time']!=null){
						$hour = $results['cancel_time']; 
						$board_time = $results['board_time'];
						$timestamp = strtotime($board_time) - 60*60*$hour;
						$time = date(' H:i', $timestamp);
						$canceltime = date("g:i a", strtotime($time));
					}else{
						$canceltime='0';
					}

					$droptime = strtotime($results['drop_time']);
					$pickuptime = strtotime($results['board_time']);
					$duration = ($droptime - $pickuptime)/3600;
					if($results['points']!=null){
						$poin= array_map('trim', explode('<=>',$results['points']));
						$points='';
						foreach( $poin as $rs){
							if(!empty($rs)) {
								$roww = array_map('trim', explode('<#>',$rs));
								$points[]=array('time'=>$roww[1],'dplace'=>$roww[0],'landmark'=>$roww[2],'address'=>$roww[3],'board_id'=>$roww[4]);
								$singlep []=$roww[0];					
							}
							
						}
					}
					
					if($results['droppoints']!=null){
						$stop= array_map('trim', explode('<=>',$results['droppoints']));
						foreach( $stop as $stops){
							if(!empty($stops)) {
								$rowss = array_map('trim', explode('<#>',$stops));
								$droppointw[]=array('time'=>$rowss[1],'dpoints'=>$rowss[0],'landmark'=>$rowss[2],'address'=>$rowss[3]);
								$droppointD []=$rowss[0];
							}
						}
					}


					if($results['gallery']!=null){
						$gallery = array_map('trim', explode('<=>',$results['gallery']));
					}


					if($results['amenities']!=null){
						$amenitie= array_map('trim', explode('<=>',$results['amenities']));
					}

					$amenities = array();
					$images = array();
                   
						 
					foreach($amenitie as $amenitiess){
							$amenities[]=$amenitiess;					
					} 

					foreach($gallery as $image){
							$images[]=array('image'=>$image);
					}



						
						
					$results['Dpoints']=$points;
					$results['seat_layout']=$new_array;
					$results['canceltime']=$canceltime;
					$results['singleP']=$singlep;
					$results['Stoppoints']=$droppointw;
					$results['singleD']=$droppointD;
					$results['duration']=$duration;
					$results['gallery']=$images;
					
					
					
					$results['amenities']=$amenities;


					$new_result[] = $results;
               

				}

				
			           
			}

			$result = $new_result;
			
		
		/*foreach($result as $results){


			if(!empty($results)) {	
			$layout =json_decode($results['layout']);
			
			$length = sizeof($layout);
			$new_array = array();
			$single =array();
			
				$seatexisting = $this->search_model->select_booking_seat($results['bus_id'],$results['route_id'],$request->dates);
				//print_r($seatexisting);
				$existseat2=array();
			if($seatexisting[0]['existseat']!=null){
			 $existseat= array_map('trim', explode('<=>',$seatexisting[0]['existseat'])); 
			 
			foreach($existseat as $existseatm){
				
				$existseat5=array_map('trim', explode(',',$existseatm));
				//print_r($existseat5);
				$existseat2=array_merge($existseat2,$existseat5);
				
			}
			
			
			//print_r($existseat2);
		    }
			if($layout) {
			foreach($layout as $layouts ){
				
				
				foreach($layouts as $row ){
					
					//echo $row->seat_no;
					if($existseat2 !=null && in_array($row->seat_no, $existseat2)){
					$row->status='true';
					}else{
						$row->status='false';
					}
				
				
				array_push($single ,$row);
			}
				array_push($new_array ,$layouts);
			}
			}
			
			
			if($results['cancel_time']!=null){
			 $hour = $results['cancel_time']; 
			 $board_time = $results['board_time'];
			 $timestamp = strtotime($board_time) - 60*60*$hour;

				$time = date(' H:i', $timestamp);

				$canceltime = date("g:i a", strtotime($time));
			}else{
				$canceltime='0';
			}
			$droptime = strtotime($results['drop_time']);
			$pickuptime = strtotime($results['board_time']);
			$duration = ($droptime - $pickuptime)/3600;
			if($results['points']!=null){
				$poin= array_map('trim', explode('<=>',$results['points']));
				$points='';
			foreach( $poin as $rs){
					if(!empty($rs)) {
						$roww = array_map('trim', explode('<#>',$rs));
						
					$points[]=array('time'=>$roww[1],'dplace'=>$roww[0],'landmark'=>$roww[2],'address'=>$roww[3],'board_id'=>$roww[4]
					
					);
					$singlep []=$roww[0];
					
					}
				
			}
			}
		
		if($results['droppoints']!=null){
			 $stop= array_map('trim', explode('<=>',$results['droppoints']));
			 foreach( $stop as $stops){
					if(!empty($stops)) {
						$rowss = array_map('trim', explode('<#>',$stops));
					$droppointw[]=array('time'=>$rowss[1],'dpoints'=>$rowss[0],'landmark'=>$rowss[2],'address'=>$rowss[3]
					
					);
					$droppointD []=$rowss[0];
					}

			}
		}


		if($results['gallery']!=null){

     
			 $gallery= array_map('trim', explode('<=>',$results['gallery']));
		

		}


		if($results['amenities']!=null){

			 $amenitie= array_map('trim', explode('<=>',$results['amenities']));
		}
			 foreach( $amenitie as $amenitiess){
						
						
					$amenities[]=$amenitiess;					
				
				
			} 
			
			foreach( $gallery as $image){
						
						
					$images[]=array('image'=>$image
					);
				
			}

			
			
		$result[$i]['Dpoints']=$points;
		$result[$i]['seat_layout']=$new_array;
		$result[$i]['canceltime']=$canceltime;
		$result[$i]['singleP']=$singlep;
		$result[$i]['Stoppoints']=$droppointw;
		$result[$i]['singleD']=$droppointD;
		$result[$i]['duration']=$duration;
		$result[$i]['gallery']=$images;
		
		
		
		$result[$i]['amenities']=$amenities;

			
		$i++;
		/*print_r($result);

		}
           
		}*/
		/*print_r($result);*/

		print json_encode($result);
		
	}public function select_one_bus() {
		$data = file_get_contents("php://input");
		$request = json_decode($data);
	
		$result = $this->search_model->select_one_bus($request);
		
			if($result[0]['points']!=null){
		 $poin= array_map('trim', explode('<=>',$result[0]['points']));
			
		foreach( $poin as $r){
						
						$row = explode('<#>',$r);
					$points[]=array('time'=>$row[1],'dplace'=>$row[0]
					
					);
				
			}
			
			$result['Dpoints']=$points;
			$result['seat_layout']=json_decode($result[0]['layout']);
			}
			$result['paypals']=get_settings_details(1);
		print json_encode($result);
	}
	public function filter_option() {
		$data = file_get_contents("php://input");
		$request = json_decode($data);
		
		$result = $this->search_model->filter_option($request);
		/*print_r($result);*/
		$bus_name= array_map('trim', explode('<=>',$result[0]->bus_name));
		$amenities= array_map('trim', explode('<=>',$result[0]->amenities));
		$points= array_map('trim', explode('<=>',$result[0]->points));
		$stoppoint= array_map('trim', explode('<=>',$result[0]->drop_points));
		//print_r($bus_name);
		if(!empty($bus_name[0])){
			foreach( $bus_name as $r){

						
						$row = array_map('trim', explode('<#>',$r));
						
					$bus_names[]=array('bus'=>$row[0]
					
					);
					$bus_types[]=array('bus_type'=>$row[1]
					
					);
					
				
			}
		} else {
			$bus_names = array();
			$bus_types = array();
		}
		
			foreach( $stoppoint as $spoint){
						
						
					$Spoint[]=array('Stop'=>$spoint
					
					);
			}
			foreach( $amenities as $amenitie){
						
						
					$Amenities[]=$amenitie;
					
					
			}
					foreach( $points as $point){
						
						
					$pointss[]=array('bpoints'=>$point
					
					);
					
					
				
			}
			$result['bus_names']=$bus_names;
			$result['bus_types']=$bus_types;
			$result['pointss']=$pointss;
			$result['Amenities']=$Amenities;
			$result['Stoppoint']=$Spoint;
		
		print json_encode($result);
	}

	public function rating_details() {
		$data = file_get_contents("php://input");
		$request = json_decode($data);
		$result = $this->search_model->rating_details($request);
		print json_encode($result);
	}
	public function select_settings() {
		
		$result = $this->search_model->select_settings();
		print json_encode($result);
	}
	
	
	
	

}