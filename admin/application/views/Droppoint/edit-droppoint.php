<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit DropPoint Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-tint" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">DropPoint</a></li>
         <li class="active">Edit DropPoint</li>
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
                  <h3 class="box-title">Edit DropPoint Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-6">					   
						
						 <div class="form-group">
                          <label>Bus Name</label>
							<select tabindex="1" class="form-control select2 required"  style="width: 100%;" id="dropbus_details" name="bus_id">
								   <?php
								   if($resultingbus) {
									  foreach($resultingbus as $boarddetails){
										  $drop = ($boarddetails->id == $data->bus_id) ? "selected" : "";
								   ?>
								   <option <?php echo $drop; ?> value="<?php echo $boarddetails->id;?>"><?php echo $boarddetails->bus_name;?></option>
								   <?php
								   }
								   }
								   ?>
                            </select>
                        </div>
     
					    <div class="form-group has-feedback">
                           <label for="exampleInputEmail1"> Dropping Point</label>
                           <input tabindex="2"  type="text" class="form-control required" name="stoping_point" value="<?php echo $data->stoping_point; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Dropping Point">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Landmark</label>
                           <input tabindex="5"  type="text" class="form-control required" value="<?php echo $data->landmark; ?>" name="landmark" placeholder="Landmark">
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
							<select tabindex="2" name="drop_point" class="form-control select2 subcats" style="width: 100%;">
							 <?php
							 if($resultsbus) {
									  foreach($resultsbus as $busroutesdetails){
									  $editdrop = ($busroutesdetails->id == $data->board_point) ? "selected" : "";
								   ?>
								   <option <?php echo $editdrop; ?> value="<?php echo $busroutesdetails->id;?>"><?php echo $busroutesdetails->drop_point;?></option>
								   <?php
								   }
							 }
								   ?>
							</select>
                        </div>
						
						
						
						 <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Drop Time</label>
							  <div class="input-group">
								<input tabindex="4"  type="text" value="<?php echo $data->drop_time; ?>" name="drop_time" class="form-control timepicker">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
						  
						  <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Address</label>
                           <input tabindex="6" type="text" class="form-control required" value="<?php echo $data->address; ?>" name="address" placeholder="Address">
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

