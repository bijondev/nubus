<div style="width:660px; height:880px; margin:0 auto; background:white; padding:20px 20px 20px 20px; font-family: Century Gothic,Verdana,Geneva,sans-serif; border:solid #c79e13 1px;">
	
    <div style="width:100%; float:left; padding:0 0 10px 0;">
    <div style="width:138px; height:73px; float:left; margin:0 0 0 20px;"> <img src="<?php echo base_url();?>assets/images/tb-logo.png" alt="" /></div>
    <div style="width:350px; float:left; padding:25px 0 0 0; text-align:center; font-size:18px;font-weight:600; "> BOOKING DETAILS </div>
    
    
    </div>
    
    
    
    
        <div style="background:#f4f4f4;  float:left; width:96.3%;   border-top-right-radius: 8px; border-top-left-radius: 8px; padding:15px 12px 0 12px;  ">
    		<div style="width:100%; padding:10px 0 10px 0; float:left; color:#666261; font-size:14px;"> Hi <?php echo $data[0]['username'];?>, thanks for booking with us. </div>
                 <div style="width:100%; float:left; padding:20px 0 20px 0; border-bottom:solid #cdcdcd 1px; border-top:solid #cdcdcd 1px;"> 
                
                 <div style="width:70%; float:left; font-size:17px;"> <?php echo $data[0]['booking_id'];?> </div>
                 <div style="width:30%; float:left;"> 
                 
                 <a href="#"> <div style="color:black; 
                 text-align:center; line-height:25px; text-decoration:none; float:right;">Status:<?php echo $data[0]['payment_status'];?>  </div> </a>
                 
                  </div>
            </div>
        </div>
        
        
        
        
        
        <div style="background:#3a3a3c;     float:left; width:96.3%;  padding:0px 12px 10px 12px;">
        	<div style="width:100%; float:left; padding:35px 0 30px 0;">
            <div style="width:43%; float:left; color:white; font-size:15px; padding:5px 0 0 0; line-height:22px;"> <?php echo $data[0]['board_point'];?>
				
				
			
				</div>
            <div style="width:33.3% ;float:left; text-align:center;"> <img src="<?php echo base_url();?>assets/images/arrowround.png" alt="" /> </div>
            <div style="width:33.3%; float:left; color:white; font-size:16px; padding:5px 0 0 0; line-height:22px;"> <?php echo $data[0]['drop_point'];?></div>
            </div>
            
            
            <div style="width:100%; float:left;">
                <div style="width:32%;   float:left; background:#585858; padding:24px 0 24px 0; "> 
                <div style="width:100%; float:left; text-align:center; color:#fff; font-size:15px;"> BUS NAME </div>
                <div style="width:100%; float:left; text-align:center; color:#bbbbbb; font-size:14px; padding:5px 0 0 0;"> <?php echo $data[0]['bus_name'];?></div> 
                </div>
                
                <div style="width:32%; margin:0 12px 0 12px;   float:left; background:#585858; padding:47px 0 24px 0; "> 
                <div style="width:100%; float:left; text-align:center; color:#fff; font-size:15px;"> Rs.<?php echo ($data[0]['amount']-$data[0]['off_amount']);?> </div>
                
                </div>
                
                <div style="width:32%;   float:left; background:#585858; padding:24px 0 24px 0; "> 
                <div style="width:100%; float:left; text-align:center; color:#fff; font-size:15px;"> <?php echo $data[0]['board_time'];?> . </div>
                <div style="width:100%; float:left; text-align:center; color:#bbbbbb; font-size:14px; padding:5px 0 0 0;"> <?php echo date('D, d M',strtotime($data[0]['booking_date']));?></div> 
                </div>
            </div>
           <br>
            <div style="width:100%; float:left; color:white; padding:3px 0 8px 0; font-size:12px;background-color:#525254;margin-top:7px;font-weight:500;">
				<p style="font-size:14px;padding-left:5px;">
				Passenger Information</p>
				<div style="width:100%;">
				<div style="font-size:14px;width:32%;float:left;padding-left:5px;">
					Name <br>
				
				</div>
				
				<div style="font-size:14px;width:20%;float:left;">
					Age <br>
				
				</div>
				
				
				<div style="font-size:14px;width:20%;float:left;">
					Gender <br>
				
				</div>
				
				
				
				<div style="font-size:14px;width:20%;float:left;">
					SEAT NUMBER <br>
				
				</div>
				
			</div>
				<?php
				$detailss =array_map('trim', explode("<=>",$data[0]['customer']));
				
				foreach($detailss as $s){
					$rowss = explode('<#>',$s);
				?>
	
				
				<div style="width:100%;margin-top:11px;float:left">
				<div style="font-size:14px;width:32%;float:left;padding-left:5px;color:#bbbbbb;">
					<?php echo $rowss[0];?> <br>
				
				</div>
				
				<div style="font-size:14px;width:20%;float:left;color:#bbbbbb;">
					<?php echo $rowss[1];?> <br>
				
				</div>
				
				
				<div style="font-size:14px;width:20%;float:left;color:#bbbbbb;">
					<?php echo $rowss[2];?> <br>
				
				</div>
				
				
				
				<div style="font-size:14px;width:20%;float:left;color:#bbbbbb;">
					<?php echo $rowss[3];?> <br>
				
				</div>
				
			</div>
				
				
				
				
				
				
				
				
				
				
				
				
			<?php
				}
				?>
				
			</div>
       </div>
            
           
	
	    <div style="background:#fff;  float:left; width:96.3%;    border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; padding:20px 12px 20px 12px;  ">
       
       
       
			
			
		
	</div>
            
            
        <!-- <div style="background:#fff;  float:left; width:96.3%;    border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; padding:20px 12px 20px 12px;  ">
        <div style="width:100%; float:left; font-size:16px; padding:0 0 10px 0;"> Extra Charges: </div> 
        <div style="width:100%; float:left; color:#666262; font-size:11px; line-height:22px;">
        
        * Maximum of 4 passengers allowed for Indica & Sedan. <br />
        * Cancellation charges of Rs.100 applicable if cancelled within 30 mins of pickup time. <br />
        * Any Toll, Parking, as applicable. <br />
        * No waiting charges upto 15 mins after scheduled pickup time. Rs.50 per 30 mins after that. <br /> 
        * Final fare payable will include Service Tax
        
        </div>
 
        </div> -->
            
            
            
            
            
            
            
        </div>







</div>
