<?php
	$term=$_GET["term"];
	$type=$_GET["type"];
 $query = $this->db->query("SELECT * FROM route WHERE  '$type' like '%$term%'   order by id ");
		 foreach($query->result_array() as $row){
			 if($type=='board_point'){
				 $json[]=array(
                    'value'=> $row["id"],
                    'label'=>$row['board_point']
                        );
			 }else{
				 $json[]=array(
                    'value'=> $row["id"],
                    'label'=>$row['drop_point']
                        );
			 }
			   
						
		 }
		  echo json_encode($json);
		 ?>