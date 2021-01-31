
<style>
#layoutsss {
    -ms-transform: rotate(20deg); /* IE 9 */
    -webkit-transform: rotate(20deg); /* Safari */
    transform: rotate(270deg); /* Standard syntax */
}
@media (min-width: 768px) {
.col-sm-15 {
        width: 20%;
        float: left;
    }
}
@media (min-width: 992px) {
    .col-md-15 {
        width: 20%;
        float: left;
    }
}
@media (min-width: 1200px) {
    .col-lg-15 {
        width: 20%;
        float: left;
    }
}
.col-md-20 {
					width:20%;
					float:left;
					min-height: 1px;
    				padding-left: 15px;
   					padding-right: 15px;
    				position: relative;
				}
				.col-md-40 {
					width:40%;
					float:left;
					min-height: 1px;
    				padding-left: 15px;
   					padding-right: 15px;
    				position: relative;
				}
				.nopadding {
					padding:0px !important;
				}
</style>
 
		<div class="row"  ng-app="seat" ng-controller="layout">
            <div class="col-md-6">
              <div class="box box-primary">
				<div class="box-header with-border">
         <h3 class="box-title">View Bus Management Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
                <div class="box-body">
                  <dl>
                    <dt>Bus Name</dt>
                    <dd><?php echo $data->bus_name; ?></dd>
                    <dt>Bus Reg Number</dt>
                    <dd><?php echo $data->bus_reg_no; ?></dd>
                    <dt>Maximum Seats</dt>
                    <dd><?php echo $data->max_seats; ?></dd>
                    <dt>Start Point</dt>
                    <dd><?php echo $data->board_point; ?></dd>
                    <dt>Start Time</dt>
                    <dd><?php echo $data->board_time; ?></dd>
                    <dt>End Point</dt>
                    <dd><?php echo $data->drop_point; ?></dd>                   
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
            
            <div class="col-md-6">
              <div class="box box-primary">
               <div class="box-header with-border">
         <h3 class="box-title">View Bus Management Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>                     
                <div class="box-body">
                  <dl>
                    <dt>Bus Type</dt>
                    <dd><?php echo $data->bus_type; ?></dd>
                    <dt>Status</dt>
                    <dd><?php echo $data->status; ?></dd> 
					<dt>created_by</dt>
                    <dd><?php echo $data->created_by; ?></dd> 
					<dt>Amenities</dt>
                    <dd><?php echo $data->amenities; ?></dd> 
					<dt>End Time</dt>
                    <dd><?php echo $data->drop_time; ?></dd>				
					
                  </dl>
                </div><!-- /.box-body -->	  
	  
	  
          
              </div><!-- /.box -->
            </div><!-- ./col -->
			
			<?php 
if($data->layout){
	?>
			 <div class="col-md-12">
              <div class="box box-primary">
               <div class="box-header with-border">
         <h3 class="box-title">View Bus Management Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div> 
	  
<div class="col-md-6" >	  
                <div class="box-body col-md-4" ng-init="getseatlayouts(<?php echo $data->bus_id; ?>)">
                  
				  
				  
				  
				  
				  
				  
				  
				  <!----------- Left Row Start ---------->
                    <div class="col-md-40 nopadding">
                    
                    	<div class="col-md-6 nopadding apps-container" >
                          <div class="col-md-12 nopadding app " ng-repeat ="row in showlay[0] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 nopadding apps-container" >
                          <div class="col-md-12 nopadding app " ng-repeat ="row in showlay[1] ">
                              <div ng-class="row.type"></div>
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
                    	<div class="col-md-6 nopadding apps-container" >
                          <div class="col-md-12 nopadding app " ng-repeat ="row in showlay[2] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                        <div class="col-md-6 nopadding apps-container" >
                          <div class="col-md-12 nopadding app " ng-repeat ="row in  showlay[3] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                    </div>
                    <!----------- Right Row Start ---------->
                    
                	<!----------- Last Row Start ---------->
                    <div class="col-md-12 nopadding">
                    	<div class="col-md-12 nopadding apps-container" >
                        	<div class="col-md-20 nopadding app " ng-repeat ="row in  showlay[4] "  >
							  <div ng-class="row.type"></div>
                          	</div>
                            
                    	</div>
                    </div>
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
                </div>
				
				</div><!-- /.box-body -->	  
	  
	  
          
              </div><!-- /.box -->
            </div><!-- ./col -->
			
			
			
			<?php
}
?>
			
			
          </div>  
		 
		
		
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> 
  <script src="<?php echo base_url();?>assets/js/app-test.js"></script>
		  