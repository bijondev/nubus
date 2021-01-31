<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit BoardePoint Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Boarding Point</a></li>
         <li class="active">Edit Boarding Point</li>
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
                  <h3 class="box-title">Edit Boarding Point Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-6">
					     
						<div class="form-group">
                           <label>Bus Name</label>
							<select tabindex="1"  class="form-control select2"  style="width: 100%;" id="bus_details" name="bus_id">
								   <?php
								   if($resulting) {
									  foreach($resulting as $boarddetails){
										  $s = ($boarddetails->id == $data->bus_id) ? "selected" : "";

										  
								   ?>
	         <option <?php echo $s; ?> value="<?php echo $boarddetails->id;?>"> <?php echo $boarddetails->bus_name;?></option>
								   <?php
								   }
								   }
								   ?>
                            </select>
                        </div>
	
 			
						
					    <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">New Boarding Point</label>
                           <input tabindex="3" type="text" class="form-control required" name="pickup_point" value="<?php echo $data->pickup_point; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Boarding Point">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Landmark</label>
                           <input tabindex="5" type="text" class="form-control required" value="<?php echo $data->landmark; ?>" name="landmark" placeholder="Landmark">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                  
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button tabindex="7" type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				   <div class="col-md-6">
				   
	                     <div class="form-group">
                          <label>Route</label>
							<select tabindex="2"  class="form-control select2 subcat" placeholder="Board point"  style="width: 100%;" name="board_point">
								   <?php
								    if($results) {
									  foreach($results as $busroutesdetails){
										  //var_dump($busdetails);
										$s = ($busroutesdetails->id == $data->board_point) ? "selected" : "";
								   ?>
								   <option <?php echo $s; ?> value="<?php echo $busroutesdetails->id;?>"><?php echo $busroutesdetails->board_point;?></option>
								   <?php
								   }
									}
								   ?>
                            </select>
                        </div>
						
						
						 <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Start Time</label>
							  <div class="input-group">
								<input tabindex="4" type="text" value="<?php echo $data->pickup_time; ?>" name="pickup_time" class="form-control timepicker">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
						  
						  
						  <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Address</label>
                           <input tabindex="6"  type="text" class="form-control required" value="<?php echo $data->address; ?>" name="address" placeholder="Address">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
				   </div>
				   
				  </div>
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

