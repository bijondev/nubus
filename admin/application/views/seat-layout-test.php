
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pace.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/<?php echo $this->config->item("theme_color"); ?>.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-style.css">
    <link href="<?php echo base_url(); ?>assets/parsley/parsley.css" rel="stylesheet">
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition <?php echo $this->config->item("theme_color"); ?> sidebar-mini">
  	<div class="wrapper">
	  <?php
	  $this->load->view('Templates/header-menu');
	  //$this->load->view('Templates/left-menu');
	  $this->load->view('Templates/left-menu-old');
	  ?>
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
</style>
<div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Seat Layout
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-crosshairs"></i> Home</a></li>
            <li><a href="#">Seat Layout</a></li>
            <li class="active">Add Seat Layout</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content" ng-app="seat" ng-controller="layout">
          <div class="row">
		  
		  <div class="col-xs-12">
            
            <div class="alert alert-{{changec}}">
               <button class="close" data-dismiss="alert" type="button">×</button>
               {{myHTML}}
            </div>
           
         </div>
		  
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="seatss">
                  <div class="box-body">
                    	
                  <div class="form-group col-md-6" ng-init="get_busname()">
				 
                    <label>Select Bus</label>
                    <select class="form-control select2" style="width: 100%;" ng-model="bus" required>
                      <option ng-repeat="selectingvalues in select_buss" 
					  value="{{selectingvalues.id}}">{{selectingvalues.bus_name}}</option>
                    </select>
                  </div>
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
                  <div class="form-group col-md-6">
                    <label>Select Seat Type</label>
                    <select class="form-control select2" style="width: 100%;" ng-model='bus_type' required>
                      <option value="Seater / Semi sleeper" >Seater / Semi sleeper</option>
                      <option value="Sleeper">Sleeper</option>
					  <option value="Seater && Sleeper">Seater && Sleeper</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Total seats</label>
                    <input class="form-control" type="text"  ng-model="noseat" value="25" ng-change="isEven(lastno,noseat)" required/>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Select Layout Type</label>
                    <select class="form-control select2" style="width: 100%;" ng-model="layout" ng-change="classLeft(layout)" required>
                      <option value="layout-1"> 1 X 1 </option>
                      <option value="layout-2"> 1 X 2 </option>
                      <option value="layout-3"> 2 X 1 </option>
                      <option value="layout-4" selected> 2 X 2 </option>
                    </select>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>No of last row seats</label>
                    <input class="form-control" ng-model="lastno" type="text" value="0" />
                    <p class="help-block">Leave it blank if there is no unique layout .</p>
                  </div>
				  <div class="form-group col-md-6" ng-show="bus_type =='Seater && Sleeper'">
                    <label>No of Sleeper seats</label>
                    <input class="form-control" ng-model="sleeper" type="text" value="0"/>
                   
                  </div>
				  <div class="form-group col-md-6">
                    <label></label>
                    <input  value="View Layout" type="button" ng-click="change_test(noseat,lastno,bus,layout)"/>
                    <p class="help-block"></p>
                  </div>
                  
                  
                  <!-- /.form-group -->
                    
                  </div><!-- /.box-body -->
				 
                  <div class="box-footer">
                    <button type="button" class="btn btn-primary" ng-click="logModelss(noseat,lastno,bus,layout)">Submit</button>
					
					
					
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-warning ">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <style>
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
                <div class="box-body col-md-4" id="layouts" >
                	
                    <!----------- Left Row Start ---------->
                    <div class="col-md-40 nopadding">
                    
                    	<div class="col-md-6 nopadding apps-container" ui-sortable="sortableOptions" ng-model="seat_details['left_1']">
                          <div class="col-md-12 nopadding app " ng-repeat ="row in seat_details['left_1'] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 nopadding apps-container" ui-sortable="sortableOptions" ng-model="seat_details['left_2']">
                          <div class="col-md-12 nopadding app " ng-repeat ="row in seat_details['left_2'] ">
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
                    	<div class="col-md-6 nopadding apps-container" ui-sortable="sortableOptions" ng-model="seat_details['right_1']">
                          <div class="col-md-12 nopadding app " ng-repeat ="row in seat_details['right_1'] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                        <div class="col-md-6 nopadding apps-container" ui-sortable="sortableOptions" ng-model="seat_details['right_2']">
                          <div class="col-md-12 nopadding app " ng-repeat ="row in seat_details['right_2'] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                    </div>
                    <!----------- Right Row Start ---------->
                    
                	<!----------- Last Row Start ---------->
                    <div class="col-md-12 nopadding apps-container">
                    	<div class="col-md-12 nopadding apps-container" ui-sortable="sortableOptions" ng-model="last_row">
                        	<div class="col-md-20 nopadding app " ng-repeat ="row in last_row "  >
							  <div ng-class="row.type"></div>
                          	</div>
                            
                    	</div>
                    </div>
                    <!----------- Last Row End ---------->
                </div>
                
                
                
                <div class="clearfix"></div>
                  
                </div>
                </div>
				 <div class="col-md-6" >
			  
		     <div class="box-body col-md-4" id="layouts" style="display:none;">
			 
                    <!----------- Left Row Start ---------->
                    <div class="col-md-40 nopadding">
                    
                    	<div class="col-md-6 nopadding apps-container" ui-sortable="sortableOptions" ng-model="seat_details['left_1']">
                          <div class="col-md-12 nopadding app " ng-repeat ="row in layoutsd[0] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 nopadding apps-container" ui-sortable="sortableOptions" ng-model="seat_details['left_2']">
                          <div class="col-md-12 nopadding app " ng-repeat ="row in layoutsd[1] ">
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
                          <div class="col-md-12 nopadding app " ng-repeat ="row in layoutsd[2] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                        <div class="col-md-6 nopadding apps-container" ui-sortable="sortableOptions" ng-model="seat_details['right_2']">
                          <div class="col-md-12 nopadding app " ng-repeat ="row in  layoutsd[3] ">
                              <div ng-class="row.type"></div>
                          </div>
                        </div>
                    </div>
                    <!----------- Right Row Start ---------->
                    
                	<!----------- Last Row Start ---------->
                    <div class="col-md-12 nopadding">
                    	<div class="col-md-12 nopadding apps-container" ui-sortable="sortableOptions" ng-model="last_row">
                        	<div class="col-md-20 nopadding app " ng-repeat ="row in  layoutsd[4] "  >
							  <div ng-class="row.type"></div>
                          	</div>
                            
                    	</div>
                    </div>
                    <!----------- Last Row End ---------->
                </div>
			

            </div>
			
			
			
          </div>   <!-- /.row -->
		  <div class='row'>
		      
		  </div>
        </section><!-- /.content -->
      </div>   </div>
	  <script>
	
	base_url = "<?php echo base_url(); ?>";
	
	</script>
    <!-- jQuery 2.1.4 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pace.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
    
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    
    <!-- FastClick 
    <script src="../../plugins/fastclick/fastclick.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/custom-script.js"></script>
    
    <!--script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script-->
    <script src="<?php echo base_url(); ?>assets/js/seat-management.js"></script>
    
    <!--script src="<?php echo base_url(); ?>assets/js/Sortable.js" type="text/javascript"></script-->
    <script src="<?php echo base_url(); ?>assets/js/sortables.js"></script>
	
	 <script src="<?php echo base_url();?>assets/js/parsley.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app-test.js"></script>
    <!-- CK Editor -->
    <!--script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
		
		$('.datatable').DataTable({
			"ordering" : $(this).data("ordering"),
			"order": [[ 0, "desc" ]]
        });
		
	  });
	  
	  (function () {
	'use strict';
	
	 
	
	var byId = function (id) { return document.getElementById(id); },

		loadScripts = function (desc, callback) {
			var deps = [], key, idx = 0;

			for (key in desc) {
				deps.push(key);
			}

			(function _next() {
				var pid,
					name = deps[idx],
					script = document.createElement('script');

				script.type = 'text/javascript';
				script.src = desc[deps[idx]];

				pid = setInterval(function () {
					if (window[name]) {
						clearTimeout(pid);

						deps[idx++] = window[name];

						if (deps[idx]) {
							_next();
						} else {
							callback.apply(null, deps);
						}
					}
				}, 30);

				document.getElementsByTagName('head')[0].appendChild(script);
			})()
		},

		console = window.console;


	if (!console.log) {
		console.log = function () {
			alert([].join.apply(arguments, ' '));
		};
	}
	
	// Advanced groups
	[{
		name: 'advanced',
	},
	{
		name: 'advanced',
	},
	{
		name: 'advanced',
	},
	{
		name: 'advanced',
	},
	{
		name: 'advanced',
	}].forEach(function (groupOpts, i) {
		Sortable.create(byId('advanced-' + (i + 1)), {
			
			group: groupOpts,
			animation: 150
		});
	});

})();
	</script-->
 </body>
</html>