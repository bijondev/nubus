<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Route Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-arrows-v"></i>Home</a></li>
         <li><a href="#">Route Details</a></li>
         <li class="active">Edit Route</li>
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
                  <h3 class="box-title">Edit Route Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
       <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
					      
						  
					    <div class="form-group">
                        <label>Select Bus</label>
							<select tabindex="1" class="form-control select2 required"  style="width: 100%;" name="bus_id">
								   <?php 
								    if($result) {
									  foreach($result as $busdetails){  
									   $s = ($busdetails->id == $data->bus_id) ? "selected" : "";
								   ?>	
			<option <?php echo $s; ?> value="<?php echo $busdetails->id; ?>"><?php echo $busdetails->bus_name; ?></option>
								   <?php
									  }
								   }
								   ?>
                            </select>
                       </div>
					   
 
						 <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">From Place</label>
                           <input tabindex="3"  type="text" class="form-control required" name="board_point" value="<?php echo $data->board_point; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="From Place">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Start Time</label>
							  <div class="input-group">
								<input tabindex="5"  type="text" name="board_time" value="<?php echo $data->board_time; ?>" class="form-control timepicker">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
						
						 
				   
						
						
						
					    <div class="box-footer">
                     <button tabindex="7" type="submit" class="btn btn-primary">Submit</button>
                  </div>             
                        </div>  
                      <div class="col-md-6">
					  
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Price</label>
                           <input  tabindex="2" type="text" class="form-control required" name="fare" value="<?php echo $data->fare; ?>" placeholder="Price" >
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
					    <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">To Place</label>
                           <input tabindex="4"  type="text" class="form-control required" name="drop_point" value="<?php echo $data->drop_point; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="To Place">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Arrival Time</label>
							  <div class="input-group">
								<input tabindex="6"  type="text" name="drop_time" value="<?php echo $data->drop_time; ?>" class="form-control timepicker">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
						
                        </div>
				  </div>
               </form>
            
            <!-- /.box -->
         </div>
      </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

