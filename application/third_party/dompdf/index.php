<?php
error_reporting(0);
require_once ('dompdf_config.inc.php');
$pdf_content='
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			</head>
		
			<style type="text/css">							
				#pdf_header, #pdf_container{ border: 1px solid #CCCCCC; padding:10px; }				
				#pdf_header{ margin:10px auto 0px; border-bottom:none; }				
				table{ width:580px; }				
				#pdf_container{margin:0px auto; }
				.rpt_title{ background:#99CCFF; }															
			</style>
							
			<body>
			<div id="pdf_header" >
			<table border="0" cellspacing="1" cellpadding="2">
			<tr id="hdRow">
				<td width="20%"><img src="space_age_header.jpg" style="width:250px" ></td>				
				<td width="30%" align="center">Sample File</td>
				<td width="30%" align="left">Marimuthu<br>User Code : 179865420</td>
			</tr>
			</table>
			</div>
			<div id="pdf_container" >
			<table border="0" cellspacing="1" cellpadding="2">
			<tr align="center" bgcolor="pink" style="color:#FFF"><td colspan="3"><b>Your Statement Summery</b></td> </tr>
			<tr bgcolor="#006" style="color:#FFF"><td colspan="3" align="left">Your Heading.</td></tr>
	 		</table>
			<table> <tr> <td> Name </td><td> Department</td><td>Total </td><td>Grade </td> </tr>
			<tr> <td> Marimuthu </td><td> Admin</td><td>250 </td><td>A </td> </tr>			
	 		</div></body></html>'
			;
			$name = date("Ymd").rand().'.pdf';
			$reportPDF=createPDF(12, $pdf_content, 'activity_Report', $name );
	function createPDF($pdf_userid, $pdf_content, $pdf_For, $filename){
	
	$path='UsersActivityReports/';
	/*$rndNumber=rand();
	$filename=$pdf_userid.date("Ymd").$rndNumber.'.pdf';*/
	$dompdf=new DOMPDF();
	$dompdf->load_html($pdf_content);
	$dompdf->render();
	$output = $dompdf->output();
	file_put_contents($path.$filename, $output);
	return $filename;		
	}	
	echo '<a href="UsersActivityReports/'.$name.'" > Download </a>';
?>