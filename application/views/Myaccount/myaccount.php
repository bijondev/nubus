<div class="row" style="min-height:80px;">
      <div class="container">
          <div class="row">
    
          </div>
           </div>
          </div>
		      <div class="row mtop20" ng-controller="search">
			  <input type="button" value="fsd" id="rating" ng-click="rating()" style="display:none;" >
           <div class="container" ng-init="getTripdetails()">
    <div class="col-md-12">
	<ul class="tabs">
		<li class="tab-link current" data-tab="tab-1" data-id="d">My Trips</li>
		<li class="tab-link" data-tab="tab-2" data-id="d">Wallet</li>
		<li class="tab-link" data-tab="tab-3" data-id="d">My Profile</li>
		<li class="tab-link" data-tab="tab-4c" data-id="d">Change Password</li>
	
          
	</ul>

	<div id="tab-1" class="tab-content current" data-id="paytm">
		
        <!--div class="tb_route_inner_txt">
            <div class="tb_route_inner">
                <div class="tb_route_from">
                    <div class="tb_tour">Banglore<br>
                     <span class="tb_tour_type" >07.10 AM</span>
                        </div>
                </div>
                  <div class="tb_route_arrow"><img src="<?php echo base_url();?>assets/images/arrow-right.png"></div>
                 <div class="tb_route_to">
                   <div class="tb_tour">Kozhencherry<br>
                     <span class="tb_tour_type" >08.00 AM</span>
                        </div>  
                     
                </div>
                 <div class="tb_route_date">
                    <div class="tb_tour">9 Mar 2015<br>
                     <span class="tb_tour_type" >TH459873</span>
                        </div>   
                </div>
                 <div class="tb_route_name">
                     <div class="tb_tour">Majestic<br>
                     <span class="tb_tour_type" >Kerala Line Travels</span>
                        </div>  
                </div>
                <div class="tb_route_cnf">
                    <div class="tb_tour">Confirmed<br>
                     <span class="tb_tour_type" ></span>
                        </div> 
                </div>
            </div>
        </div>
        
        <br-->
        &nbsp;
		<!-- {{tripDetails}} -->
		<div class="tb_route_inner_txt" ng-show="tripDetails.length=='0'" >
		<div class="no_dtl">No Bookings</div>
		</div>
         <div class="tb_route_inner_txt" ng-show="tripDetails.length!='0'" ng-repeat="trips in tripDetails">
		 
            <div class="tb_route_inner" data-toggle="collapse" data-target="#demo{{$index}}" style="cursor:pointer;">

                <div class="tb_route_from">
                    <div class="tb_tour">{{trips.board_point}}<br>
                     <span class="tb_tour_type" >{{trips.board_time}}</span>
                        </div>
                </div>
                  <div class="tb_route_arrow"><img src="<?php echo base_url();?>assets/images/arrow-right.png"></div>
                 <div class="tb_route_to">
                   <div class="tb_tour">{{trips.drop_point}}<br>
                     <span class="tb_tour_type" >{{trips.drop_time}}</span>
                        </div>  
                     
                </div>
                 <div class="tb_route_date">
                    <div class="tb_tour">{{trips.booking_date | date:'dd-MMM-yyyy '}}<br>
                     <!-- <span class="tb_tour_type" >{{trips.booking_id}}</span> -->
                        </div>   
                </div>
                 <div class="tb_route_name">
                     <div class="tb_tour">Majestic<br>
                     <span class="tb_tour_type" >{{trips.bus_name}}</span>
                        </div>  
                </div>
				
				<div class="tb_route_cnf">
    
			 <div class="user">
      <img src="<?php echo base_url();?>assets/images/dot.png" class="dotss">
      <ul>
        <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/booking.png">Book Again</a></li>
        <li><a href="<?php echo base_url();?>myaccount/rate_bus?idb={{trips.bus_id}}&du=<?php echo $this->session->userdata('logged_in')['id'];?>&oid={{trips.id}}"><img src="<?php echo base_url();?>assets/images/rate.png">Rate And Review</a></li>
        <li><a href="#" onClick="Memail(this)"  data-id="{{trips.booking_id}}"><img src="<?php echo base_url();?>assets/images/emails.png" >Email Ticket</a></li>
		     <li><a href="#" onClick="Mprint(this)" data-id="{{trips.booking_id}}"><img src="<?php echo base_url();?>assets/images/ticketss.png" >Print Ticket</a></li>
      
      </ul>
    </div>
					
  </div>
                
            </div>
              <div class="trip_details " >
            <!-- <div class="trip_details_inner"> <br>TICKET DETAILS </br></div> -->
            <div class="trip_details_inner align_left">Ticket number : <b>{{trips.booking_id}}</b></div>
             <div class="trip_details_inner align_left">Status : <b>{{trips.status}}</b></div>
          </div>
             
        <div class=" collapse"  id="demo{{$index}}">
          <div class="trip_details " >
              <div class="trip_details_inner">
           TRIP DETAILS<br>
               <hr>
                        <div class="tb_seats_list  nobord">
                            
                     <div class="tb_seats_list1 width">
                        <div class="tb_seats_list1_inner">
                           <img src="<?php echo base_url();?>assets/images/bus-2.png">
                           <div class="tb_tour top">{{trips.bus_name}}<br>
                              <span class="tb_tour_type" >Volvo A/C Semisleeper(2+2)</span>
                           </div>
                        </div>
                     </div>
                     <div class="tb_seats_list2 width3">
                        <div class="tb_seats_list1_inner">
                       
                           <div class="tb_tour">{{trips.board_time}}-{{trips.drop_time}}<br>
                              <span class="tb_tour_type" >Duration {{trips.duration}} Hrs</span>
                           </div>
                        </div>
                     </div>
                 
                     <div class="tb_seats_list5 width2">
                        <div class="tb_seats_list1_inner right">
                            <img src="<?php echo base_url();?>assets/images/location.png">
                           <div class="tb_tour ttop">{{trips.pickup_point}}<br>
                              <span class="tb_tour_type" >Boarding point</span>
                           </di
                         
                        </div>
                     </div>
                  </div>
            </div>
            
             </div>    
        </div>
        
        
	
             
              <div class="trip_details">
              <div class="trip_details_inner">
           TRAVELERS DETAILS<br>
                  <hr>
				 
                        <div class="tb_seats_list nobord" ng-repeat ="details in trips.customer_details">
                           
                     <div class="tb_seats_list1 width">
                        <div class="tb_seats_list1_inner">
                           <img src="<?php echo base_url();?>assets/images/user.png">
                          
                           <div class="tb_tour top">{{details.name}}<br>
                              <span class="tb_tour_type" >{{details.gender}} Age {{details.age}}</span>
                           </div>
                        </div>
                     </div>
                     <div class="tb_seats_list2 width3">
                        <div class="tb_seats_list1_inner left">
                    <img src="<?php echo base_url();?>assets/images/seat.png">
                           <div class="tb_tour">{{details.seat}}<br>
                              <span class="tb_tour_type" ></span>
                           </div>
                        </div>
                     </div>
                 <!-- 
                     <div class="tb_seats_list5 width2">
                        <div class="tb_seats_list1_inner">
                         
                          <div class="tb_tour">{{trips.status}}<br>
                              <span class="tb_tour_type" ></span>
                           </div>
                         
                       
                     </div>
                  </div> -->
            </div>

            
             </div>    
        </div>
        
        
	
            <div class="trip_details">
              <div class="trip_details_inner">
          PAYMENT DETAILS<br>
              
                     <hr>
                        <div class="tb_seats_list  nobord">
                            
                     <div class="tb_seats_list1 width">
                        <div class="tb_seats_list1_inner">
                           <img src="<?php echo base_url();?>assets/images/pay.png">
                           <div class="tb_tour top">payment mode<br>
                              <span class="tb_tour_type" >{{trips.payment_option}}</span>
                           </div>
                        </div>
                     </div>
                     <div class="tb_seats_list2 width3">
                        <div class="tb_seats_list1_inner">
                  
                           <div class="tb_tour"><br>
                              <span class="tb_tour_type" ></span>
                           </div>
                        </div>
                     </div>
                 
                     <div class="tb_seats_list5 width2">
                        <div class="tb_seats_list1_inner">
                         
                           <div class="tb_tour">Fare Break Up<br>
                              <span class="tb_tour_type" >Base Fare  &nbsp;  &nbsp;
                                   &nbsp;&nbsp;  &nbsp; &nbsp;  TK.{{trips.fare}}</span>
                                   <span class="tb_tour_type" >Number of tickets :{{trips.total_count}} &nbsp;  &nbsp;
                                   &nbsp;&nbsp;  &nbsp; &nbsp;  TK.{{trips.fare}}</span>
                                  
                                   <div ng-if="trips.off_amount.length!=null">
                                   <span class="tb_tour_type" >Offer Amount   &nbsp;  &nbsp;
                                   &nbsp;TK.{{trips.off_amount}}</span>
                                 </div>
                           </div>
                         
                        </div>
                     </div>
            </div>
            
             </div>  
                            
        </div>
             
                 <br>
                   <br>
         <div class="total_amount">
		
             
				  <div class="total_amount_lft">  &nbsp; </div>
             <div class="total_amount_rht">
      
                  <div class="total_amount_rht1">
      &nbsp;  &nbsp;
                  </div> 
               
                  <div class="total_amount_rht2">
           TOTAL AMOUNT <span class="rs_left"> TK.{{trips.amount}}</span>
                  </div> 
                  </div> 
             
                  </div> 
	</div>   
	</div>
	 <br>
        &nbsp;
             </div>
             
			<!--ff-->
			
			
        </div> </div> </div></div>
        
		 <div id="tab-2" class="tab-content" data-id="paytm">
                 
                    
        <div class="tb_route_inner_txt">
            <div class="tb_route_inner">
            <div class="balence left">BALANCE <br>
                
              
              <img src="<?php echo base_url();?>assets/images/BALENCE.png">
                 </div>
                     <div class="balence_tb">
           
                               <div class="ac-lft-main top">
                   
               
                     <div class="ac-lft-list order">
                             
                        <ul>
                           <li>
                                                         

                              <div class="order_cnct_detail total last">Total Balance  </div>
                              <div class="order_contact_inf total last">: TK.00</div>
                           </li>
                           <li>
                              <div class="order_cnct_detail total last"> Your Cash </div>
                              <div class="order_contact_inf total last">: TK.0    </div>
                           </li>
                           <li>
                              <div class="order_cnct_detail  total last"> Offer Cash </div>
                              <div class="order_contact_inf  total last">  : TK.51     </div>
                           </li>
                        </ul>
                     </div>
                     </div>                     
                  </div>
            </div>
        </div>
        
        <br>
      
        </div>
                    
             </div>
			 <div  class="col-md-3"></div>
	<div id="tab-3" class="tab-content" data-id="paytm">
	
            <div class="tb_route_inner_txt" id="edit-hide">
            <div class="tb_route_inner">
                <div class="rb_balence">
            <div class="balence">MY PROFILE <br>
                </div>
                      <div class="edit_pro" onClick="Edits();"><img src="<?php echo base_url();?>assets/images/edit.png"> edit</div>
            
                    </div>
                
                
                               <div class="ac-lft-main">
                   
               
                     <div class="ac-lft-list order">
                             
                        <ul>
                           <li>
                                                         

                              <div class="order_cnct_detail total_lft">Name </div>
                                  <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf total_rht name">Your name</div>
                           </li>
                           <li>
                              <div class="order_cnct_detail total_lft"> Date of Birth</div>
                               <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf total_rht dob">mm / yyy  </div>
                           </li>
                           <li>
                              <div class="order_cnct_detail  total_lft"> Gender </div>
                               <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf  total_rht gender"> <input class="radio1" name="gender" type="radio" value="male" ><label> &nbsp; Male</label> </input>
					<input class="radio2" name="gender" type="radio" value="female"><label> &nbsp;Female</label>    </div>
                           </li>
                        </ul>
                     </div>
                     </div> 
                
                          <div class="balence">CONTACT DETAILS <br>
                 </div>
                    
           
                               <div class="ac-lft-main">
                   
               
                     <div class="ac-lft-list order">
                             
                        <ul>
                           <li>
                                                         

                              <div class="order_cnct_detail total_lft">Mail </div>
                               <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf total_rht email">nixons@gmail.com</div>
                           </li>
                          
                           <li>
                              <div class="order_cnct_detail  total_lft">Mobile Number </div>
                               <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf  total_rht mobile">     </div>
                           </li>
                        </ul>
                     </div>
                     </div> 
                
                
                
                
            </div>
        </div>
		
		
		
		
		<br>
				
				
				 <div class="tb_route_inner_txt hide" id="edit-show">
				<div class="tb_tan_in tab_one">
										           <div class="balence" style="width:300px">CONTACT DETAILS <br>
                 </div>
                    
						<div class="ac-lft-main">
                   
                     <div class="ac-lft-list order">
                     
                        <ul class="">
                           <li>
                              <div class="order_cnct_detail total_lft list_act">Email </div>
                               <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf total_rht list_act"><input class="pro_num email filwdth list_act" type="text" value=" " readonly></div>
                           </li>
                         <!--   <li>
                              <div class="order_cnct_detail total_lft list_act"> Password*</div>
                               <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf total_rht list_act "><input class="pro_num list_act" type="password" value="********" readonly></div>
                           </li> -->
                           <li>
                              <div class="order_cnct_detail  total_lft list_act">Mobile Number </div>
                               <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf  total_rht list_act"><input class="pro_num mobiles list_act" type="text" readonly > </div>
                           </li>
						   <li>&nbsp;<li>
                        </ul>
                     </div>
                     </div><br>
						   <div class="balence">MY PROFILE <br>
						</div>
                  
              <div class="ac-lft-main">
				<form id="myForm" method="POST" action="<?php echo base_url();?>myaccount/edit_profile" enctype="multipart/form-data">
                     <div class="ac-lft-list order">  
                        <ul>
                           <li>
                              <div class="order_cnct_detail total_lft">Name </div>
                                  <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf total_rht"><input class="pro_num name" type="text" name="name" data-parsley-pattern="^[a-zA-Z]+$" required></div>
                           </li>
						   
							<br>
							
                           <li>
                              <div class="order_cnct_detail total_lft"> Date of Birth</div>
                               <div class="order_cnct_detail total_dot">: </div>
                              <div class="order_contact_inf total_rht"><!-- <input class="pro_num XXinput calendar date_picker dob"  type="text" name="dob" required readonly> -->
                                <select class="date_of_birth  " name="year">
                                <option value="" class="year "selected  disabled=""></option>
                                <?php
                               $a = date("Y")-18;
                               for($i =0;$i<60;$i++){
                                $year = $a;
                                    ?>

                    <option value="<?php echo $year;?>" ><?php echo $year;?></option>
                        <?php 
                       $year = $a - 1;
                         $a = $year;
                        } ?>
                                

                              
                                </select>
                                <select class="date_of_birth " name="month" >
                                 <option value="" class="month"selected disabled=""></option>
                                <option value=01>January</option>
                                 <option value=02>February</option>
                                  <option value=03>March</option>
                                   <option value=04>April</option>
                                    <option value=05>May</option>
                                     <option value=06>June</option>
                                      <option value=07>July</option>
                                       <option value=08>August</option>
                                        <option value=09>September</option>
                                         <option value=10>October</option>
                                          <option value=11>November</option>
                                           <option value=12>December</option>
                                </select>
                                <select class="date_of_birth " name="day">
                                 <option value="" class="day" selected disabled="" ></option>
                                
                                 <?php
                               $a = 1;
                               for($i =1;$i<=31;$i++){
                                $day = $a;
                                    ?>

                    <option value="<?php echo $day;?>" ><?php echo $day;?></option>
                        <?php 
                       $day = $a + 1;
                         $a = $day;
                        } ?>
                                
                                  
                                
                                </select>
                              </div>
                           </li>
                           <li>
                              <div class="order_cnct_detail  total_lft"> Gender </div>
                                <div class="order_cnct_detail total_dot">: </div>
								
									<div class="order_contact_inf  total_rht"> <input class="radio1" name="gender" type="radio" value="male" required><label>&nbsp; Male</label> </input>
									<input class="radio2" name="gender" type="radio" value="female"><label>&nbsp;  Female</label> </input>
									</div>
							
									
								
                           </li>
						  <!--     <li>
						    <div class="order_cnct_detail total_lft"> Photo</div>
							<div class="order_cnct_detail total_dot">: </div>
							<div class="order_contact_inf  total_rht">
							<input type="file" name="image"/>
							</div>
							</li> -->
							<li class="reset_res" style="margin: 4px 5px 11px;width: 37%;"></li>
							<li><input type="submit" onClick="fileUpload();" value="Submit" id="btn_update" style="width:100px;height:38px;padding: 0px 20px;"/><span class="alertp" style="padding-right: 10px;float:left"><input type="button" value="Cancel" onClick="Edits_show();" style="width:100px;height:38px;padding: 0px 20px;"/></span></li>
							<li><span class="alertp" style="padding:0px;float:left"></span></li>
							
                        </ul>
						
                     </div>
				</form>
					
                     </div> 

				</div>
				</div>
       </div>
	   
	   
	   
	   
	   
	   <div id="tab-4c" class="tab-content" data-id="paytm">
	   
	    <div class="tb_route_inner_txt low" >
                        <div class="tb_route_inner">
                           <div class="amount_pay">
						   <form id="change-pass" data-parsley-validate="">
							  <p class="ch_pwd">change password</p>
					<div class="em_inpt">
						<span class="img_lock"></span>
							        <p><input type="password" class="ch_opt" placeholder="Old Password" name="password" required=""></p>
							   </div>
								<div class="em_inpt">   
									<span class="img_lock"></span>
      <p><input type="password" class="ch_opt" placeholder=" New Password" id="ghghgh" data-parsley-minlength="6" required="" data-required="true" name="changepass"></p>
							   </div>
	  <div class="em_inpt">
		  <span class="img_lock"></span>
	      <p><input type="password" class="ch_opt" name="confirmpass" placeholder="Confirm New Password"  data-parsley-minlength="6"  data-parsley-equalto="#ghghgh" data-parsley-equalto-message="Password confirmation must match the password."  required=""></p>
							   </div>
							   <input type="hidden" value="<?php echo $this->session->userdata('logged_in')['id'];?>" name="id">
							   <div class="em_inpt">
							   <p class="reset_pass" style="width: 25%;"></p></div>
							   <br>
							     <div class="book_now"><button class="tb_nowbook" onclick="changePass();">Save</button></div>
								 
								 
							 </form>
							</div>
						 </div>
					  </div>  </div>

	   
	   
	   
	   
	   
	   
	   
	   </div>
	   <script src="<?php echo base_url();?>assets/js/myaccount.js"></script> 
	    <div class="loader" style="text-align:center"></div>