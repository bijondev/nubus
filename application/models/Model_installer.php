<?php 

class Model_installer extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
		function db_connect($data)

{ 

		$filename = 'sql/truebus.sql';
		// MySQL host
		 $mysql_host = $data['dbhost'];
		// MySQL username
		$mysql_username = $data['dbuser'];
		// MySQL password
		$mysql_password = $data['dbpass'];
		// Database name
		 $mysql_database = $data['dbname'];
		$con = mysqli_connect($mysql_host, $mysql_username, $mysql_password,$mysql_database) or die('Error connecting to MySQL server');
		
		// Select database


		// Temporary variable, used to store current query
		$templine = '';
		// Read in entire file
		$lines = file($filename);
		// Loop through each line
		foreach ($lines as $line)
		{
		// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		// Add this line to the current segment
		$templine .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';')
		{
			// Perform the query
			mysqli_query($con,$templine);
			// Reset temp variable to empty
			$templine = '';
		}
		}

		 
		 
		 

		 $myfile = fopen("application/config/database.php", "w") or die("Unable to open file!");
		 $myfile1 = fopen("admin/application/config/database.php", "w") or die("Unable to open file!");
		 $active_record='';
		$txt = '<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");$active_group = "default";
		$active_record = TRUE;'."\r\n";

		$txt .='$db["default"]["hostname"] = "'.$mysql_host.'";'."\r\n";
		$txt .='$db["default"]["username"] = "'.$mysql_username.'";'."\r\n";
		$txt .='$db["default"]["password"] = "'. $mysql_password.'";'."\r\n";
		$txt .='$db["default"]["database"] ="'.$mysql_database.'";'."\r\n";
		$txt .='$db["default"]["dbdriver"] = "mysqli";
		$db["default"]["dbprefix"] = "";
		$db["default"]["pconnect"] = TRUE;
		$db["default"]["db_debug"] = FALSE;
		$db["default"]["cache_on"] = FALSE;
		$db["default"]["cachedir"] = "";
		$db["default"]["char_set"] = "utf8";
		$db["default"]["dbcollat"] = "utf8_general_ci";
		$db["default"]["swap_pre"] = "";
		$db["default"]["autoinit"] = TRUE;
		$db["default"]["stricton"] = FALSE;';

		fwrite($myfile, $txt);
		fwrite($myfile1, $txt);
		fclose($myfile);
		fclose($myfile1);
		return true;
}
function smtp_setup($data)

{ 

 $select_data="*";
	  $update_data=array(
			     'smtp_username'     =>$data['smtp_username'], 
				 'smtp_host'     =>$data['smtp_host'],
				 'smtp_password'     =>$data['smtp_password']
		        );
	 $where_data=array(    // ----------------Array for check data exist ot not
	  'id'     => '1'
	  
 
		);
		$table='setting';
	  $this->update_table_where( $update_data, $where_data, $table);
	  return true;
}
 function update_table_where( $update_data, $where_data, $table){	
	$this->db->where($where_data);
	$this->db->update($table, $update_data);
	
	
 }
}