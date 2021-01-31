<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Bus Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Bus Details</a></li>
         <li class="active">Add Bus</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <?php
               if($this->session->flashdata('message')) {
               $message = $this->session->flashdata('message');
               ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
         </div>
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Bus Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback" >
                           <label for="exampleInputEmail1">Bus Name</label>
                            <input type="text" class="form-control required"  tabindex="1" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="bus_name"  placeholder="Bus Name">
                           <span class="glyphicon  form-control-feedback" ></span>
                        </div>         
						
					   <div class="form-group">
                        <label>Bus Type</label>
							<select  tabindex="3" class="form-control select2 required"  style="width: 100%;" name="bus_type_id"  >
								   <?php
								   if($result) {
									  foreach($result as $bustypedetails){
										  
								   ?>
								   <option  value="<?php echo $bustypedetails->id;?>"><?php echo $bustypedetails->bus_type_id ." - ". $bustypedetails->bus_type;?></option>								  
								   <?php
								   }
								   }
								   ?>
                            </select>
                       </div>
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Start Point</label>
                           <input   tabindex="5" type="text" class="form-control required" name="board_point" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Start Point">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						 <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Start Time</label>
							  <div class="input-group">
								<input tabindex="7" type="text" name="board_time" class="form-control timepicker" >
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
						  
						  
						  
						<div class="form-group">
                          <label>Amenities</label>
						<select tabindex="9" class="form-control select2 js-example-basic-multiple" style="width: 100%;" name="amenities_id[]" multiple="multiple" id="amenities" >
								   <?php
								   //if($amenitiesresult) {
									  foreach($amenitiesresult as $amenitiedetails){
										  //var_dump($busdetails);
								   ?>
						<option value="<?php echo $amenitiedetails->id;?>"><?php echo  $amenitiedetails->amenities;?></option>								  
								   <?php
								   }
								   //}
								   ?>
                        </select>
                       </div>

						
					    <div class="box-footer">
                     <button  tabindex="10" type="submit" class="btn btn-primary" >Submit</button>
                  </div>             
                        </div>                   
                   <div class="col-md-6">
				   
				      	<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Bus RegiNumber</label>
                           <input tabindex="2" type="text" class="form-control required" name="bus_reg_no" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="Bus RegiNumber">
                           <span class="glyphicon  form-control-feedback" ></span>
                        </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Maximum Seats</label>
                           <input tabindex="4" type="text" class="form-control required" name="max_seats" data-parsley-trigger="change" required="" placeholder="Maximum Seats">
                           <span class="glyphicon  form-control-feedback" ></span>
                        </div>  
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">End Point</label>
                           <input  tabindex="6" type="text" class="form-control required" name="drop_point" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="End Point">
                           <span class="glyphicon  form-control-feedback" ></span>
                        </div>
						
						  <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>End Time</label>
							  <div class="input-group">
								<input  tabindex="8" type="text" name="drop_time" class="form-control timepicker">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
                  <!-- /.box-body -->
                  
				  </div>
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
     </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

