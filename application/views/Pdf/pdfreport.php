<?php 
//var_dump($result[0]['booking_date']);
?>
<div style="width:1000px; height:1300px; margin:0 auto; background:white; padding:20px 20px 20px 20px; font-family: Century Gothic,Verdana,Geneva,sans-serif; background-color:#f4f4f4;">
	<div style="width:100%;float:left;">
		<div style="width:50%;float:left;"><img src="<?php echo base_url();?>assets/images/tb-logo.png"></div>	
		<div style="width:50%;float:left;"></div>	
	
		</div>
		<p style="font-size:19px;color:black;text-align:center;">E-Ticket/Reservation Voucher</p>
	
	<div style="width:930px; height:500px; margin:0 auto; background:white; padding:20px 20px 20px 20px; font-family: Century Gothic,Verdana,Geneva,sans-serif;">
		<div style="width:100%;float:left;">
		
		<div style="width:40%;float:left;">
			
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">PNR Number :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['booking_id'];?></div>
			
			
			</div>
			
			<div style="width:100%;float:left; border-bottom: 2px solid #eeeeee;padding:10px;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Service Start Place :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['board_point'];?></div>
			
			
			</div>
			
			<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Trip Code :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">2000EKMSHE</div>
			
			
			</div-->
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">No. of Seats :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['count'];?></div>
			
			
			</div>
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Board Time :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['pickup_time'];?></div>
			
			
			</div>
			<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Bank Txn. No. :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">BKVB3676375626</div>
			
			
			</div-->
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Bus ID No. :<?php echo $result[0]['bus_name'];?></div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">Seat No/s : <?php echo $result[0]['seat_no'];?></div>
			
			
			</div>
			
			
				<div style="width:100%;float:left;padding:10px;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color:   black;
    font-size: 14px;
    font-weight: 600;">Bus ID No. : <?php echo $result[0]['bus_name'];?></div>
			<div style="width:50%;float:left;text-align:right; color:  black;
    font-size: 14px;
    font-weight: 400;">&nbsp;</div>
					
				
			
			
			
			</div>
			
				
				<div style="width:100%;float:left;padding:10px;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color:   black;
    font-size: 14px;
    font-weight: 600;">SEAT NO/S :<?php echo $result[0]['seat_no'];?></div>
			<div style="width:50%;float:left;text-align:right; color:  black;
    font-size: 14px;
    font-weight: 400;">&nbsp;</div>
					
				
			
			
			</div>
					

			
			</div>	
			
			
			<div style="width:7%;float:left;">&nbsp;</div>
			
		<div style="width:53%;float:left;">
			
			
			
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Date of Journey :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['booking_date'];?></div>
			
			
			</div>
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Bus starting point  :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['board_point'];?></div>
			
	
			</div>
			<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Platform Number :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"></div>
			
			
			</div-->
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Pickup Point :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['pickup_point'];?></div>
			
			
			</div>
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Service End Point :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['drop_point'];?></div>
			
			
			</div>
			<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Status :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;"><?php echo $result[0]['payment_status'];?></div>
			
			
			</div>
			<!--<div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Time of Departure :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">20:00 Hrs.</div>
			
			
			</div-->
			
		<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Service End Point :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">SHENCOTTAH</div>
			
			
			</div-->
			<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Passenger End Point :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">DINDIGUL</div>
			
			
			</div-->
			<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Route No :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">730</div>
			
			
			</div-->
			
			<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">Corporation :</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">SETC</div>
			
			
			</div-->
			<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">OB Reference No.:</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">OB4152076</div>
			
			
			</div-->
			
				<!--div style="width:100%;float:left;padding:10px;border-bottom: 2px solid #eeeeee;padding-left:0px;padding-right:0px;">
			
			<div style="width:50%;float:left;  color: #666464;
    font-size: 14px;
    font-weight: 400;">OB Reference No.:</div>
			<div style="width:50%;float:left;text-align:right; color: #161616;
    font-size: 14px;
    font-weight: 400;">OB4152076</div>
			
			
			</div-->
			
			</div>
		
		
		
		</div>
		
		<div style="width:100%;margin-top:100px;margin-top:100px;float:left;">
		
		
	<p style="font-size:19px;color:black;text-align:center;">PASSENGER INFORMATION</p>
		
		   <div style="width:100%;float:left; color:white;  padding: 15px 0; font-size:12px;background-color:#525254;margin-top:7px;font-weight:500;">
			
				
				<div style="font-size:14px;width:26%;float:left;padding-left:5px;">
					Name 
				
				</div>
				
				<div style="font-size:14px;width:20%;float:left;">
					Age 
				</div>
				
				
				<div style="font-size:14px;width:27%;float:left;">
					Gender
				</div>
				
				
				
				<div style="font-size:14px;width:26%;float:left;">
					Seat No
				</div>
				
			
				
			</div>
			<?php
		      $poin= array_map('trim', explode('<=>',$result[0]['customer']));
			
		foreach( $poin as $row){
			$r = explode('<#>',$row);
			?>
		
			   <div style="width:100%; float:left; color:black;  padding: 15px 0; font-size:12px;background-color:white;margin-top:7px;font-weight:500;">
			
				
				<div style="font-size:14px;width:26%;float:left;padding-left:5px;">
					<?php echo $r[0];?>
				
				</div>
				
				<div style="font-size:14px;width:20%;float:left;">
					<?php echo $r[1];?>
				
				</div>
				
				
				<div style="font-size:14px;width:27%;float:left;">
					<?php echo $r[2];?>
				</div>
				
				
				
				<div style="font-size:14px;width:26%;float:left;">
					<?php echo $r[3];?>
				</div>
				
			
				
			</div>
		<?php
		}
		?>
		
			   <div style="width:100%; float:left; color:black;  padding: 15px 0; font-size:12px;background-color:white;margin-top:7px;font-weight:500;">
			
				
				<div style="font-size:13px;width:26%;float:left;padding-left:5px; color: #404043;font-weight:600;display:none">
				ID Card Type : Driving Licence
				
				</div>
				
				<div style="font-size:13px;width:20%;float:left; color: #404043;font-weight:600;display:none">
				ID Card Number :
				</div>
				
				
				<div style="font-size:13px;width:27%;float:left;">
					&nbsp;
				</div>
				
				
				
				<div style="font-size:13px;width:26%;float:left; color: #404043;font-weight:600;">
				Total Fare :TK.<?php echo ($result[0]['amount']-$result[0]['off_amount']);?>.00 
				</div>
				
			
				
			</div>
		
		</div>
		
		
		  <div style="float:left; width:96.3%;    border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; padding:20px 12px 20px 12px;  ">
        <div style="width:100%; float:left; font-size:16px; padding:0 0 10px 0;color: #404043;font-weight:500;"> IMPORTANT</div> 
        <div style="width:100%; float:left; color:#666262; font-size:13px; line-height:25px;">
        
                 		The seat(s) booked under this ticket is/are not transferable.</br>
                            This e-ticket is valid only for the seat number and bus service specified herein.</br>
                            This e-ticket has to be carried by the passenger during the journey along with an ID Card of the</br>
                            passenger whose name appears above.</br>
                            Please keep the ticket safely till the end of the journey.</br>
                            Please show the ticket at the time of checking.</br> 
                            Corporation reserves the rights to change/cancel the class of service.</br>
                            Time is in 24 hour Railways time format(24HH:MM).</br>
                            Half ticket eligible for children between 3 to 12 years. Children above 130cms height will be charged</br>
                            full fare unless original age proof certificate is produced at time of journey</br>
        </div>

<div style="width:100%; float:left; color:#666262; font-size:13px; line-height:22px;text-align:center;">


 <button style="background-color:#E24648;font-size:15px;width:200px;padding:10px;border:none;color:white;margin-top:30px;display:none;">Print</button>
	
</div>
        </div>
		
		
		
		</div>
		
		
		
		
		
		
	
	
	
	</div>
<script>
 window.print();
</script>
