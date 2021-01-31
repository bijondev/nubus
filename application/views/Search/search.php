
 <style>
 .selected{
	 background-color:red !important;
 }
.layouts{
	height:200px;
   
    -ms-transform: rotate(20deg); /* IE 9 */
    -webkit-transform: rotate(20deg); /* Safari */
    transform: rotate(270deg); /* Standard syntax */
}

.col-md-20 {
					width:20% !important;
					float:left !important;
					min-height: 1px !important;
    				padding-left: 15px !important ;
   					padding-right: 15px !important;
    				position: relative !important;
				}
				.col-md-40 {
					width:40% !important;
					float:left !important;
					min-height: 1px !important;
    				padding-left: 15px !important;
   					padding-right: 15px !important;
    				position: relative !important;
				}
				.nopadding {
					padding:0px !important;
				}
</style>
 <div ng-controller="search">
 <?php
 
						$undefined='';
						 if($_GET['dateR']=='undefined' ){
							 $undefined ="hide";
							  $und ="search_rgt";
							    $und1 ="search_lft";
								$s="";
						 }else{
							 $undefined ="";
							 $und ="";
							  $und1 ="";
							  $s="hide";
						 }




							 ?>
 <div class="container" ng-init="getUrlparameter()" >
         <div class="row" style="margin-top:120px;margin-bottom:15px;"   >
            <div class="tb_direct">
               <div class="tb_direct_inner">
                  <div class="tb_direct_inner_lft <?php echo $und1;?>">
                     <div class="tb_direct_inner_lft1 search_modify" ng-click="showDiv(1)"  style="cursor:pointer;">Modify</div>
                     <div class="tb_direct_inner_lft2 {{ogrey}}">
                        <div class="tb_align">
                           <span class="tb_from">{{board_point}}
							   </span>
                           <span class="tb_arrow"><img src="<?php echo base_url();?>assets/images/arrow.png"></span>
                           <span class="tb_to">{{drop_point}}</span>
                        </div>
                        <div class="tb_align">
                           <span class="tb_from2" style="cursor: pointer;"ng-click="previous(date_slide)"><img src="<?php echo base_url();?>assets/images/left-arw.png"  ng-show="datepre=='true'">
						   <img src="<?php echo base_url();?>assets/images/leff.png"  ng-show="datepre=='false'">
						   </span>
                           <span class="tb_arrow2">{{date_slide | date:'dd-MMM-yyyy '}}</span>
                           <span class="tb_to2"  style="cursor: pointer;" ng-click="next(date_slide)"><img src="<?php echo base_url();?>assets/images/rht-arw.png" ng-show="datenext=='false'"><img src="<?php echo base_url();?>assets/images/rhht.png" ng-show="datenext=='true'"></span>
						  
                        </div>
						<a class="skip_ret" ng-show="showSkip=='true'" ng-click="Skipreturn()">Skip return booking and proceed
</a>
                     </div>
                  </div>
                  <div class="tb_direct_inner_rht <?php echo $und ;?> ">
                     <div class="tb_direct_inner_rht1 <?php echo $undefined;?> {{Rgrey}}">
                        <div class="tb_align">
                           <span class="tb_from1">{{board_point}}</span>
                           <span class="tb_arrow1"><img src="<?php echo base_url();?>assets/images/row_right.png"></span>
                           <span class="tb_to1">{{drop_point}}</span>
                        </div>
                        <div class="tb_align">
                           <span class="tb_from3" ><img src="<?php echo base_url();?>assets/images/leff.png"></span>
                           <span class="tb_arrow3">{{date_slideR | date:'dd-MMM-yyyy '}}</span>
                           <span class="tb_to3" ><img src="<?php echo base_url();?>assets/images/rhht.png"></span>
                        </div>
                     </div>
                     <div style="cursor:pointer;" class="tb_direct_inner_rht2 <?php echo $s;?>"><div  class="hoveclr" id="pickDate">Return</div><input  style="height: 0px; width:0px; border: 0px;cursor:none;"ng-model="returndate"id="returnsds" class="returnsd"  placeholder="Return" ng-change="return_date(returndate)" ></div>
					
                  </div>
               </div>
            </div>
       
				
			
				
				
				
         </div>
      </div>
				<div class="out_tbs" ng-show="hiddenDiv[1]">
				<div class="container" style="padding:0px;">
				
				
				
				
				<div class="tb_search" >
		          <form id="myForms" method="post" novalidate data-parsley-validate="" >
					<div class="row">
						<div class="col-md-2">From<br>
							<input id="board_point" class="tb_from searching" type="text" placeholder="Enter a city" data-id="board_point" autocomplete="off" data-parsley-error-message="Please select a source city" required value="<?php echo $_GET['from'];?>" ng-init="user.board_point='<?php echo $_GET['from'];?>'">
							
						</div>
						<div class="col-md-1">
							<div class="direction switchButton" id="switchButton" >
							<img src="<?php echo base_url();?>assets/images/dbarrw.png">
								</div>
						</div>
						<div class="col-md-2">
							To<br>
							<input id="Destination" class="tb_from searching Destination" type="text" placeholder="Enter a city" tabindex="2" data-id="drop_point"  autocomplete="off" data-parsley-error-message="Please select a destination city" required value="<?php echo $_GET['to'];?>" ng-init="user.drop_point='<?php echo $_GET['to'];?>'">
							
							
						</div>
						<div class="col-md-3">
						Date of journy<br>
							<input class="tb_from  datetimepicker4 pickup_date pickup_datef" type="text" id='datetimepicker4' value="<?php echo $_GET['dateJ'];?>" readonly ng-init="user.dateJ='<?php echo $_GET['dateJ'];?>'">
								
							
						</div>
						
							   <div class="col-md-2 <?php echo $undefined;?>">
						      Date of Return (Optional)<br>
							<input class="tb_from pickup_date pickup_dater"  type="text" id='datereturn' value="<?php echo $_GET['dateR'];?>" readonly ng-init="user.dateR='<?php echo $_GET['dateR'];?>'">
								
							
						    </div>
							
							 
							 
							 
						
						<div class="col-md-2"> 
							<div class="tb_search_box" >
							
							<input type="button" id="select" value="Search Buses" class="RB Xbutton" onClick="select_bus();"
>
							</div>
						</div>
					</div>
					</form>
				</div>	
					</div>
					</div>
      <!--filter-bar-->
      <div class="tb_total">
          <div class="tb_fil_out" ng-hide="getbusdetails.length=='0'">
		  
		  
         <div class="container">
<div class="filter_tb_by"> Filter by</div>
			<div class="fil_tb">
			 
		<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle full" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="<?php echo base_url();?>assets/images/buss.png"> &nbsp;
	  Travels
  </button>
  <div class="dropdown-menu checklist drop_seats">
    <ul>
              <li ng-repeat="filters in filter.bus_names" ng-show='filters.bus.length > 0'>
                    <input type="checkbox" value="{{filters.bus}}" ng-click="includeBus(filters.bus)"/>  {{filters.bus}}</li>
               
            </ul>
  </div>
</div>	 
				</div> 
			 <div class="fil_tb">
	
			 		<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle full" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="<?php echo base_url();?>assets/images/seat.png"> &nbsp;Bus Type
  </button>
   <div class="dropdown-menu checklist drop_seats">
    <ul>
                <li ng-repeat="acfilter in filter.bus_types" ng-show='acfilter.bus_type.length > 0'>
                    <input type="checkbox" value="{{acfilter.bus_type}}" ng-click="includeBus1(acfilter.bus_type)"/>  {{acfilter.bus_type}}</li>
               
            </ul>
  </div>
</div>
			 </div>
			 
	 
			 

			 			 <div class="fil_tb">
	
			 		<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle full" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="<?php echo base_url();?>assets/images/buss.png"> &nbsp;Amenities
  </button>

   <div class="dropdown-menu checklist drop_seats">
    <ul> 
 
                <li   ng-repeat="amenities in filter.Amenities" ng-show='amenities.length > 0'>

                    <input type="checkbox" value="{{amenities}}" ng-click="includeBus3(amenities)"/> {{amenities}}</li>
               
            </ul>
  </div>
</div>
			 </div>
			 			 <div class="fil_tb">
	
			 		<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle full" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="<?php echo base_url();?>assets/images/location.png"> &nbsp;Boarding
  </button>
  <div class="dropdown-menu checklist drop_seats">
    <ul>
                <li ng-repeat="bpoint in filter.pointss" ng-show='bpoint.bpoints.length > 0'>
                    <input type="checkbox" value="{{bpoint.bpoints}}" ng-click="includeBus2(bpoint.bpoints)"/> {{bpoint.bpoints}}</li>
               
            </ul>
  </div>
</div>
			 </div>
			 			 <div class="fil_tb">
	
			 		<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle full" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <img src="<?php echo base_url();?>assets/images/location.png"> &nbsp; Dropping
  </button>
  <div class="dropdown-menu checklist drop_seats">
    <ul>
                <li  ng-repeat="Stop in filter.Stoppoint" ng-show='Stop.Stop.length > 0'>
                    <input type="checkbox" value="{{Stop.Stop}}" ng-click="includedrop(Stop.Stop)" /> {{Stop.Stop}}</li>
               
            </ul>
  </div>
</div>
			 </div>
			 			 <div class="fil_tb">
	
			 		<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle full" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <img src="<?php echo base_url();?>assets/images/star.png">&nbsp;Rating
  </button>
   <div class="dropdown-menu checklist drop_seats">
    <ul>
                 <li>   <input type="checkbox"  ng-model="value" name="rated"  ng-click="rated('2.7',$event)" checked="false" /> Higher Rated</li>
                
                <li>
                    <input type="checkbox"  ng-model="value1" name="rated1" ng-click="rated('',$event)" value="0" /> All Buses</li>
                
            </ul>
  </div>
</div>
			 </div>
		
			 

		
			 
	
		
		</div>	 
			 
			 
		
      </div>
      <div class="tb_total bord" ng-hide="getbusdetails.length=='0'" >
         <div class="container">
            <div class="tb_seats_list bord">
               <div class="tb_seats_list1 cent">Travels</div>
               <div class="tb_seats_list2 cent">Depart Arrive Duration</div>
               <div class="tb_seats_list3 cent">Seats</div>
               <div class="tb_seats_list4 cent">Rating</div>
               <div class="tb_seats_list5 cent">Fare</div>
            </div>
         </div>
        <!--  <div class="no_bus_found">No Bus found</div> -->
      </div>
      <!--filter-bar-end-->
      <!--filter-list- -->
      <div class="container" style="padding:0;">
         <div class="tb_seats_lists">
            <ul >

               <li data-ng-repeat="details in wine=(getbusdetails  | filter:colourFilter | filter:colourFilter1 | filter:ratingFilter1 | selectedTags:tags | selectedTags1:amt | selecteddrop:drop )">
                  <div class="tb_seats_list">
                     <div class="tb_seats_list1">
                        <div class="tb_seats_list1_inner">
                           <img src="<?php echo base_url();?>assets/images/bus-2.png">
                           <div class="tb_tour">{{details.bus_name}}<br>
                              <span class="tb_tour_type" >{{details.bus_type}}</span>
							  <br>
                              <div class="tb_gall">
                                <div class="tooltip_left" data-toggle="tooltip" title="Details">
                                 <a href="#myModal{{$index}}"  data-toggle="modal" data-target="#myModald{{$index}}"><img src="<?php echo base_url();?>assets/images/bar.png"></a>
                                 </div>
                                 <div class="tooltip_right" data-toggle="tooltip" title="Gallery">
                                 <a href="#myModal{{$index}}" data-toggle="modal" data-target="#myModalslider{{$index}}"><img src="<?php echo base_url();?>assets/images/gallery.png"></a>
                              </div>
                              </div>
							   <div class="modal fade" id="myModalslider{{$index}}" role="dialog">
                                 <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <button type="button" class="close_lft rht" data-dismiss="modal">&times;</button>
                                    <div class="login-block width top">
                                       <div id="myCarousel{{$index}}" class="carousel slide" data-ride="carousel">
                                          <!-- Indicators -->
                                          <ol class="carousel-indicators">
                                             <li data-target="#myCarousel{{$index}}" data-slide-to="0" class="active"></li>
                                             <li data-target="#myCarousel{{$index}}" data-slide-to="1"></li>
                                             <li data-target="#myCarousel{{$index}}" data-slide-to="2"></li>
                                             <li data-target="#myCarousel{{$index}}" data-slide-to="3"></li>
                                          </ol>
                                          <!-- Wrapper for slides -->
                       <!--                  
                        <div class="carousel-inner" role="listbox">
                                             <div class="item "  ng-repeat="busimage in details.gallery" ng-class="{active:$first}">

                                                <img src="<?php echo base_url()?>admin/{{busimage.image}}" alt="No Gallery Images" width="460" height="345">

                                             </div>
                                            
                                          </div> -->


                                    <div class="carousel-inner" role="listbox">

                                       <div class="norating" ng-if="details.gallery.length==0"> No gallery Image</div>
 
                                       
                                        <div class="item " ng-if="details.gallery !=0" ng-repeat="busimage in details.gallery" ng-class="{active:$first}">
                                                
                                        <img src="<?php echo base_url()?>admin/{{busimage.image}}" alt="No gallery image" width="460" height="345">
                                        
                                        </div>
                                             
                                          </div>
                                          <!-- Left and right controls -->
                                          <a class="left carousel-control" href="#myCarousel{{$index}}" role="button" data-slide="prev">
                                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                          </a>
                                          <a class="right carousel-control" href="#myCarousel{{$index}}" role="button" data-slide="next">
                                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="modal fade" id="myModald{{$index}}" role="dialog">
                                 <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <button type="button" class="close_lft rht" data-dismiss="modal">&times;</button>
                                    <div class="login-block width">
                                       <div class="place_place">
                                          <span class="tb_blue">{{board_point}}</span> to <span class="tb_blue"> {{drop_point}}</span> <span class="travels_tb">{{details.bus_name}}, {{date_slide | date:'dd-MMM-yyyy '}}</span>
                                       </div>
									   <div ng-show="details.canceltime!=0">
                                       <div class="cancellation">
                                          <p class="policy">Cancellation policy</p>
                                       </div>
                                       <table class="cancel_table">
                                          <tbody>
                                             <tr>
                                                <th>Cancellation time</th>
                                                <th>Cancellation charges</th>
                                             </tr>
                                             <tr>
                                                <td >Before {{details.canceltime}}</td>
                                                <td ng-show="details.type =='percentage'">Tk. {{details.percentage}}</td>
												<td ng-show="details.type =='flat'" >Tk. {{details.flat}}</td>
                                             </tr>
                                             <tr>
                                                <td>After {{details.canceltime}}</td>
                                                <td>Tk.{{details.fare}}</td>
                                             </tr>
                                             
                                          </tbody>
                                       </table>
									   
                                       <p class="policy">
                                          * Partial cancellation allowed
                                       </p>
									   </div>
                                       <table class="cancel_table clr">
                                          <tbody>
                                             <tr>
                                                <th>Boarding Point</th>
                                                <th>Land mark</th>
                                                <th>Address</th>
                                                <th>Boarding time</th>
                                             </tr>
                                             <tr ng-repeat="Dpoints in details.Dpoints">
                                                <td >{{Dpoints.dplace}}</td>
                                                <td >{{Dpoints.landmark}}</td>
                                                <td >{{Dpoints.address}}</td>
                                                <td >{{Dpoints.time}}</td>
                                             </tr>
											 
											 
                                             
                                          </tbody>
                                       </table>
									   <p class="policy"><p>
									   <table class="cancel_table clr" ng-show="details.Stoppoints.length > 0">
                                          <tbody>
                                             <tr>
                                                <th>Dropping Point </th>
                                                <th>Land mark</th>
                                                <th>Address</th>
                                                <th>Dropping time</th>
                                             </tr>
                                             <tr ng-repeat="Stoppoints in details.Stoppoints">
                                                <td >{{Stoppoints.dpoints}}</td>
                                                <td >{{Stoppoints.landmark}}</td>
                                                <td >{{Stoppoints.address}}</td>
                                                <td >{{Stoppoints.time}}</td>
                                             </tr>
											 
											 
                                             
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="nav_landmark">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tb_seats_list2">
                        <div class="tb_seats_list1_inner">
                         
                           <img src="<?php echo base_url();?>assets/images/clock.png">
                           <div class="tb_tour">
                              <span class="field-tip">
                                 <span class="tim_lft">{{details.board_time}} </span>
                                 <span class="tip-content">
                                    <div class="list_tb">
                                       <p class="tb_arrival">Departures <span class="drop">Boarding Points</span></p>
                                       <div class="list_tb1">
                                          <ul>
                                             <li ng-repeat="Dpoints in details.Dpoints">{{Dpoints.dplace}} <p class="tm_rht">{{Dpoints.time}} </p></li>
                                           
                                            
                                          </ul>
                                       </div>
                                       
                                    </div>
                                 </span>
                              </span>
                              -
                              <span class="field-tip">
                                 <span class="tim_rht">{{details.drop_time}}</span>
                                 <span class="tip-content rht">
                                    <div class="list_tb">
                                       <p class="tb_arrival">Arrivals <span class="drop">Dropping Points</span></p>
                                       <div class="list_tb1">
                                          <ul>
                                             <li  ng-repeat="Stopoints in details.Stoppoints">{{Stopoints.dpoints}} <p class="tm_rht">{{Stopoints.time}} </p></li>
                                          </ul>
                                       </div>
                                      
                                    </div>
                                 </span>
                              </span>
                              <br>
                              <span class="tb_tour_type" >Duration {{details.duration}} Hrs</span>
                           </div>
                        </div>
                     </div>
                     <div class="tb_seats_list3">
                        <div class="tb_seats_list1_inner">
                           <img src="<?php echo base_url();?>assets/images/seats.png">
                           <div class="tb_tour">{{details.totel_seat}} Seats<br>
                              <span class="tb_tour_type" ></span>
                           </div>
                        </div>
                     </div>
                     <div class="tb_seats_list4">
                        <div class="tb_seats_list1_inner1" >
<a  href="#myModalrate{{$index}}" ng-click ="Ratingdetails(details.bus_id)" data-target="#myModalrate{{$index}}" data-toggle="modal"><raty id="star{{$index}}" score="{{details.AvgPrice}}" number="5" ></raty>	</a>





 <div class="modal fade" id="myModalrate{{$index}}" role="dialog">
                                 <div class="modal-dialog" >
                                    <!-- Modal content-->
                                    <button type="button" class="close_lft rht mov" data-dismiss="modal">&times;</button>
                                    <div class="login-block width padding">
										
										
										<div class="row movtop" ng-hide="ratingdetails.length ==0">
										
											<div class="col-md-6">
											<h4 class="Review">Ratings & Reviews</h4>
												<div class="bus_nm">
													<div class="rate_rvw lft wht">{{details.bus_name}}
												</div>
												
												
													<div class="rate_rvw lft">{{board_point}} To {{drop_point}}
												
												</div>
												
													<div class="rate_rvw lft">{{details.board_time}}  to {{details.drop_time}}
												
												
												</div>
												
												</div>
											
											</div>
										
											<div class="col-md-6">
											<p class="Review_rate">Overall Rating<span class="rateno">{{details.AvgPrice}}</span></p>
											<!-- 	<div class="bus_nm">
												<div class="rate_rvw"><span class="ratingcriteria rht wht">Bus Quality</span>
												<span class="ratingVal greenText rht">{{details.bus_quality}}</span>
												
												
												</div>
												
											<div class="rate_rvw"><span class="ratingcriteria rht wht">Punctuality</span>
												<span class="ratingVal greenText rht">{{details.punctuality}}</span>
												
												
												</div>
												<div class="rate_rvw"><span class="ratingcriteria rht wht">Staff Behavior</span>
												<span class="ratingVal greenText rht">{{details.Staff_behaviour}}</span>
												
												
												</div>
												
												</div> -->
											</div>
	
                                    </div>
									<p ng-show="ratingdetails.length ==0" class="norating"> No Rating</p>
										<br>
																			
																			 <div class="ser" ng-hide="ratingdetails.length ==0">
																			 {{ratingdetails.length}} Customers have rated this service.
                                      </div>	
			
										<div class="bus_dtl" dir-paginate="ratingdetailss in ratingdetails |itemsPerPage:3">
											<div class="bus_dtl1">
											<h4 class="plce_bus" ng-hide="ratingdetailss.name==''">{{ratingdetailss.name}}</h4>
											<h4 class="plce_bus" ng-show="ratingdetailss.name==''">{{ratingdetailss.username}}</h4>
											<p class="plc_text">Travelled with {{details.bus_name}} on {{ratingdetailss.booking_date }}</p>
											</div>
											<div class="bus_dtl2">
											
												<div class="bus_nm">
												<div class="rate_rvw"><span class="ratingcriteria rht ">Bus Quality</span>
												<span class="ratingVal greenText rht bg">{{ratingdetailss.bus_quality}}</span>
												
												
												</div>
												
											<div class="rate_rvw"><span class="ratingcriteria rht ">Punctuality</span>
												<span class="ratingVal greenText bg">{{ratingdetailss.punctuality}}</span>
												
												
												</div>
												<div class="rate_rvw"><span class="ratingcriteria rht ">Staff Behavior</span>
												<span class="ratingVal greenText rht bg">{{ratingdetailss.Staff_behaviour}}</span>
												
												
												</div>
												
												</div>
											
											
											</div>
										
										</div>
										
										
					<dir-pagination-controls
					max-size="5"
					direction-links="true"
					boundary-links="true" >
				</dir-pagination-controls>
											
										
										
										
										</div>
									 

									
                                    <div class="nav_landmark">
                                    </div>
                                 </div>
                              </div>



							
							
                        </div>
                     </div>
                     <div class="tb_seats_list5">
                        <div class="tb_seats_list1_inner">
                           <p style="font-weight:600;font-size:15px;">Tk {{details.fare}}</p>
						   <?php 
						   if(!$this->session->userdata('logged_in')){
                
             
							   $s ='data-target="#myModals" data-toggle="modal" href="#myModals"';

						   }else{
							   $s ="";
						   }
						   ?>
                          <a <?php echo $s;?>> <button class="view_seats" data-id="seat_view{{details.id}}" ng-click="Viewseats(details,details.route_id)">View Seats</button><a>
                        </div>
                     </div>
                  </div>
				  
				  
				   <div class="container" ng-show='details.active == true'>
		  
		      <div class="seat_arragement seat_view" id="bus{{details.bus_id}}">
            <div class="seat_arragement_outer">
               <div class="seat_arragement_inner">
                  
                  <div class="tablebus">
          <div class="driver"><img src="<?php echo base_url();?>assets/images/driver.png"></div>
                     <!--table width="90%" cellspacing="0" cellpadding="0" border="0" align="left" class="seat-selecttable">
                        <tbody>
                           <tr>
                              <td valign="middle" style="border:none;"><a href="#"><img src="<?php echo base_url();?>assets/images/available_seat.png"></a></td>
                              <td valign="middle" style="border:none;">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/seat_select.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                           </tr>
                           <tr>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <img border="0" alt="" src="images/seat_select.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/booked.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                           </tr>
                           <tr>
                              <td style="border:none;">&nbsp; </td>
                              <td style="border:none;">&nbsp; </td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp; </td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp; </td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp; </td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp; </td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp;</td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp; </td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp; </td>
                              <td valign="middle" style="border:none;"><a href="#"><img src="<?php echo base_url();?>assets/images/available_seat.png"></a></td>
                           </tr>
                           <tr>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/booked.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"></a>
                              </td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                           </tr>
                           <tr>
                              <td valign="middle" style="border:none;">
                                 <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                                 <a href="#">
                                    <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                              <a href="#">
                              <img src="<?php echo base_url();?>assets/images/booked.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                              <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                              <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                              <a href="#">
                              <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                              <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                              <a href="#">
                              <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                              <a href="#">
                              <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td valign="middle" style="border:none;">
                              <a href="#">
                              <img src="<?php echo base_url();?>assets/images/available_seat.png"> 
                              </td>
                              <td style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                           </tr>
                           <tr>
                           </tr>
                        </tbody>
                     </table!-->
           
          
           
           <div class="box-body col-md-6 layouts" id="layouts" >
      
                    <!----------- Left Row Start ---------->
                    <div class="col-md-40 nopadding">
                   
                      <div class="col-md-6 nopadding " >
                          <div class="col-md-12 nopadding  " ng-repeat ="row0 in details.seat_layout[0] ">
                              <div ng-class="row0.status =='true' ? 's'+row0.type : row0.type" data-class="{{row0.type}}" data-rate="{{details.fare}}" data-seat="{{row0.seat_no}}"data-bus="{{ details.bus_id}}" onClick="Selectedseat(this)"></div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 nopadding " >
                          <div class="col-md-12 nopadding  " ng-repeat ="row1 in details.seat_layout[1]">
                              <div ng-class="row1.status =='true' ? 's'+row1.type : row1.type" data-class="{{row1.type}}" data-rate="{{details.fare}}" data-seat="{{row1.seat_no}}"data-bus="{{ details.bus_id}}" onClick="Selectedseat(this)"></div>
                          </div>
                        </div>
                        
                    </div>
                    <!----------- Left Row Start ---------->
                    
                    <!----------- Middle Row  ---------->
                    <div class="col-md-20 nopadding">
                    </div>
                    <!----------- Middle Row  ---------->
                    
                    <!----------- Right Row Start ---------->
                    <div class="col-md-40 nopadding">
                      <div class="col-md-6 nopadding " >
                          <div class="col-md-12 nopadding  " ng-repeat ="row2 in  details.seat_layout[2]">
                              <div ng-class="row2.status =='true' ? 's'+row2.type : row2.type" data-class="{{row2.type}}" data-rate="{{details.fare}}" data-seat="{{row2.seat_no}}"data-bus="{{ details.bus_id}}" onClick="Selectedseat(this)"></div>
                          </div>
                        </div>
                        <div class="col-md-6 nopadding" >
                          <div class="col-md-12 nopadding " ng-repeat ="row3 in  details.seat_layout[3] ">
                              <div ng-class="row3.status =='true' ? 's'+row3.type : row3.type" data-class="{{row3.type}}" data-rate="{{details.fare}}" data-seat="{{row3.seat_no}}"data-bus="{{ details.bus_id}}" onClick="Selectedseat(this)"></div>
                          </div>
                        </div>
                    </div>
                    <!----------- Right Row Start ---------->
                   
                  <!----------- Last Row Start ---------->
                    <div class="col-md-12 nopadding">
                      <div class="col-md-12 nopadding" >
                          <div class="col-md-20 nopadding " ng-repeat ="row4 in details.seat_layout[4] "  >
              
                <div  ng-class="row4.status =='true' ? 's'+row4.type :row4.type" data-class="{{row4.type}}" data-rate="{{details.fare}}" data-seat="{{row4.seat_no}}"data-bus="{{ details.bus_id}}" onClick="Selectedseat(this)"></div>
                            </div>
                            
                      </div>
                    </div>
                    <!-----------Last Row End ---------->
                </div>
                  </div>
               </div>
               <div class="seat_arragement_inner1">
               <div class="ac-lft-main">
               <div class="ac-lft-list order">
               <ul>
               <li>
               <div class="order_cnct_detail"><img src="<?php echo base_url();?>assets/images/available_seat.png">  Available Seat   </div>
               <div class="order_contact_inf s">Seat(s):  <span class="tb_fare seat_no">0</span></div><input type="hidden" class="seat_nos" id="seat_nos{{details.bus_id}}">
               </li>
               <li>
               <div class="order_cnct_detail"><img src="<?php echo base_url();?>assets/images/seat_select.png"> Selected Seat </div>
               <div class="order_contact_inf">Base Fare:  <span class="tb_fare rate_bus">  Rs.{{details.fare}} </span>   </div>
               </li>
               <li>
               <div class="order_cnct_detail"><img src="<?php echo base_url();?>assets/images/booked.png">  Booked  </div>
               <div class="order_contact_inf">  Total Fare   <span class="tb_fare total_rate">  Rs.0</span>  </div>
               </li>
               </ul>
               </div>
               </div>
               <div class="red">&nbsp;</div>
               <div class="red2">
               <div class="choose"> Choose boarding point</div>
               <select name="fxselect" id="fxselect" ng-model="droppoints$index">
               <option disabled value=""="">--Boarding points--</option>
               <option ng-repeat="Dpoints in details.Dpoints" value="{{Dpoints.board_id}}">{{Dpoints.dplace}}</option>
              
               </select>
              <?php if($this->session->userdata('logged_in')){
                ?>
               <div class="red3"><button class="tb_continue bus_continue" ng-click="Continue(droppoints$index,details.route_id,details.bus_id)">Continue</button></div>
               <?php }
               else{ $s ='data-target="#myModals" data-toggle="modal" href="#myModals"';
?>

               <div class="red3"><button <?php echo $s;?>class="tb_continue bus_continue">Continue</button></div>
               <?php }?>
              
               </div>
               </div>
            </div>
         </div>
<br>





  
         
                     </table>
                  </div>
               </div>
				  
				  
				  
				  
				  
               </li>
               
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
            </ul>
			
			
			<div ng-show="getbusdetails.length=='0'">
			 <div class="oops">
					   oops!
				   </div>
				   <div class="tb_message">
					   
					   <h7>No bus were found for this route today.</h7>
<p> Search results change daily based on availability.If you have an urgent requirement, please get in touch with our call center using the contact details mentioned on the home page. They will assist you to the best of their ability. </p>
				   </div>
				   </div>
				    
         </div>
      </div>
      <!--seat arrangement-->   
     
        

         </div>


      </div>
	 
	  </div>
	   <div class="loader" style="text-align:center"></div>
	 