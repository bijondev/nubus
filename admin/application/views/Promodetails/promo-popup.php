 <!-- Promo code Management(PopUp) in admin-side created by Anju MS on 08-12-2016-->
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
            <div class="col-md-12">
              <div class="box box-primary">
				<div class="box-header with-border">
         <h3 class="box-title">View Promo Management Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
                <div class="box-body">
                <div class="row">
                  <div class="col-md-3"><strong>Code: </strong></div>
                  <div class="col-md-3"><?php echo $data->code; ?></div>
                </div>
                <div class="row">
                  <div class="col-md-3"><strong>Status: </strong></div>
                  <div class="col-md-3"><?php echo $data->status==1?"Active":"Inactive"; ?></div>
                </div>
                <div class="row">
                  <div class="col-md-3"><strong>Amount: </strong></div>
                  <div class="col-md-3"><?php echo $data->amount; ?></div>
                </div>
                <div class="row">
                  <div class="col-md-3"><strong>Expiry Date: </strong></div>
                  <div class="col-md-3"><?php echo $data->expire_date; ?></div>
                </div>
                  <!-- <dl>
                    <dt>Code</dt>
                    <dd><?php echo $data->code; ?></dd>
                    <dt>Status</dt>
                    <dd></dd>
                    <dt>Amount</dt>
                    <dd></dd>
                    <dt>Expiry Date</dt>
                    <dd><?php echo $data->expire_date; ?></dd>
                                     
                  </dl> -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
            
            
			
			<?php 
if($data->layout){
	?>
			 <div class="col-md-12">
              <div class="box box-primary">
               <div class="box-header with-border">
         <h3 class="box-title">View Promo Management Details</h3>
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
		  