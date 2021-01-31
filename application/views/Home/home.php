
         <!--SEARCH-BAR-->
         <div class="container" ng-controller="search">
            <div class="row" style="min-height:400px;margin-top:120px;">
               <div class="col-md-6">
			   <form id="myForm" method="post" data-parsley-validate="" autocomplete="off">
                  <section id="Search" class="LB XXCN  P20">
                     <h1 class="bookTic XCN TextSemiBold" >Online Bus Tickets Booking with Zero Booking Fees</h1>
                     <div class="searchRow clearfix">
                        <div class="LB">
                           <label class="inputLabel">From</label>
                           <input id="board_point"  class="XXinput searching" placeholder="Enter a city" type="text"  data-id="board_point" autocomplete="off" data-parsley-error-message="Please select a source city" tabindex="1" required/>
                           <div class="errorMessageFixed"> </div>
                        </div>
                        <span class="switchButton" id="switchButton"></span>
                        <div class="searchRight NoPaddingRight">
                           <label class="inputLabel">To</label>
                           <input id="Destination" class="XXinput searching" placeholder="Enter a city" type="text" tabindex="2" data-id="drop_point"  autocomplete="off" data-parsley-error-message="Please select a destination city" required />
                           <div class="errorMessageFixed"> </div>
                        </div>
                     </div>
                     <div class="searchRow clearfix">
                        <div class="LB">
                           <label class="inputLabel">Date of Journey</label>
                           <span class="blackTextSmall"></span>
                           <input id="Calenderfrom" class="XXinput calendar date-pick  pickup_date pickup_datef Calenderfrom" placeholder="dd-mm-yyyy" readonly type="text" title="Date in the format dd-mmm-yyyy"  tabindex="3" />
                        </div>
                        <div class="searchRight retJouney">
                           <label class="inputLabel">Date of Return<span class="opt">&nbsp;(Optional)</span></label>
                           <input id="Calenderreturn" class="XXinput calendar date-pick pickup_dater" placeholder="dd-mm-yyyy" type="text" title="Date in the format dd-mmm-yyyy" readonly  tabindex="4" />
                        
                        
                        </div>

                     </div>
                     <div class="dateError">Onward date should be before return date</div>
                      <button class="button reset_new" id="resetBtn" ng-click="resetbtn()">Reset Date</button>
                     <button class="RB Xbutton" id="searchBtn" ng-click="homesearch()">Search Buses</button>
                  </section>
				  </form>
               </div>
               <div class="col-md-6">
                  <div class="tb_bus">
                     <img src="<?php echo base_url();?>assets/images/bus.png">
                  </div>
               </div>
            </div>
         </div>
         <!--SEARCH-BAR-END-->
         <!--operator-BAR-->
         <div class="tb_operator">
            <div class="container">
               <div class="tb_inner">
                  <div class="row">
                     <div class="wrapper">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                           <div class="tb_operator">
                              <img src="<?php echo base_url();?>assets/images/routte.png"> &nbsp;<span class="tb_operator1">67000 <small class="smalls">ROUTES</small></span>
                           </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12">
                           <div class="tb_operator left"> 
                              <img src="<?php echo base_url();?>assets/images/route.png">  &nbsp;<span class="tb_operator2">1800<small class="smalls"> BUS OPERATORS</small></span>
                           </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12">
                           <div class="tb_operator right"> 
                              <img src="<?php echo base_url();?>assets/images/ticket.png">  &nbsp;<span class="tb_operator3">6,00,000 + <small class="smalls">TICKETS SOLD</small></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--operator-BAR end-->
         <!--offers-BAR-->
         <div class="tb_offers">
            <div class="shadow"><img src="<?php echo base_url();?>assets/images/shadow.png"></div>
            <div class="outer">
               <div class="container">
                  <div class="tb_inner">
                     <div class="row">
                        <div class="wrapper">
                           <div class="col-md-4">
                              <div class="tb_offers1">
                                 <img src="<?php echo base_url();?>assets/images/rupees.png">
                                 <div class="tb_list_offer">
                                    <div class="ofer_list">UPTO TK.100 OFF</div>
                                    <div class="ofer_list_bold">TRAVEL SMART</div>
                                    <div class="ofer_list_normal">Code:RBM120</div>
                                    <div class="ofer_list_normal">Book Using Pay Money</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="tb_offers1_top">
                                 <img src="<?php echo base_url();?>assets/images/bed.png">
                                 <div class="tb_list_offer" style=" border-right: 1px solid #dddddd;">
                                    <div class="ofer_list">UPTO 70% OFF</div>
                                    <div class="ofer_list_bold">ON HOTELS ACROSS INDIA</div>
                                    <div class="ofer_list_normal"> Offer Code:RBRTM120</div>
                                    <div class="ofer_list_normal">&nbsp;</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="tb_offers3">
                                 <img src="<?php echo base_url();?>assets/images/phone.png">
                                 <div class="tb_list_offer">
                                    <div class="ofer_list"> &nbsp;&nbsp;FLAT TK.100 OFF</div>
                                    <div class="ofer_list_bold left"> &nbsp;&nbsp;NUBus APP OFFER</div>
                                    <div class="ofer_list_normal">&nbsp;&nbsp; book via the NUBus APP</div>
                                    <div class="ofer_list_normal">&nbsp;&nbsp;  Code:ERHH54</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr class="border">
                  </hr>
               </div>
            </div>
         </div>