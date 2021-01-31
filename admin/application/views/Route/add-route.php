<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Route Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-arrows-v"></i>Home</a></li>
         <li><a href="#">Route Details</a></li>
         <li class="active">Add Route</li>
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
                  <h3 class="box-title">Add Route Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
					 
                       <div class="form-group">
                        <label>Select Bus</label>
							<select  tabindex="1" class="form-control select2 required"  style="width: 100%;" name="bus_id">
								   <?php
								   if($result) {
									  foreach($result as $busdetails){
								   ?>
								   <option value="<?php echo $busdetails->id;?>"><?php echo $busdetails->bus_id ." - ". $busdetails->bus_name; ?></option>
								   <?php
								   }
								   }
								   ?>
                            </select>
                       </div>
					   
	 
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">From Place</label>
                           <input tabindex="3" type="text" class="form-control required" name="board_point" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="From Place">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
				
						
						  <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Start Time</label>
							  <div class="input-group">
								<input tabindex="5" type="text" name="board_time" class="form-control timepicker">
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
                           <input tabindex="2" type="text" class="form-control required" name="fare" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Price">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
				   
				       
				   
				      	<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">To Place</label>
                           <input tabindex="4" type="text" class="form-control required" name="drop_point" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="To Place">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						  <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Arrival Time</label>
							  <div class="input-group">
								<input tabindex="6"  type="text" name="drop_time" class="form-control timepicker">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
						
                        
                  <!-- /.box-body -->
                  
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

