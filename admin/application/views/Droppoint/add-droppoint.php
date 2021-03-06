<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add DropPoint Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-tint" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">Drop point</a></li>
         <li class="active">Add DropPoint</li>
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
                  <h3 class="box-title">Add DropPoint Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">                      
						
					    <div class="form-group">
                          <label>Bus Name</label>
							<select tabindex="1" class="form-control select2 required"  style="width: 100%;" id="dropbus_details" name="bus_id">
								   <?php
									  foreach($resultingbus as $boarddetails){
								   ?>
								   <option value="<?php echo $boarddetails->id;?>"><?php echo $boarddetails->bus_name;?></option>
								   <?php
								   }
								   ?>
                            </select>
                        </div>
						
					
					
					    <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">New Dropping Point</label>
                           <input tabindex="3"  type="text" class="form-control required" name="stoping_point" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder=" Dropping Point">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Landmark</label>
                           <input tabindex="5" type="text" class="form-control required" name="landmark" placeholder="Landmark">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>

					    <div class="box-footer">
                     <button tabindex="7"  type="submit" class="btn btn-primary">Submit</button>
                  </div>             
                        </div>                   
                   <div class="col-md-6">
				   
				       <div class="form-group">
                          <label>Route</label>
							<select tabindex="2"  name="drop_point" class="form-control select2 subcats" style="width: 100%;">
							 <?php
									  foreach($resultsbus as $boarddetailss){
								   ?>
								   <option value="<?php echo $boarddetailss->id;?>"><?php echo $boarddetailss->drop_point;?></option>
								   <?php
								   }
								   ?>
							</select>
                        </div>
						
						 
						
						
						
						  <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Drop Time</label>
							  <div class="input-group">
								<input tabindex="4" type="text" name="drop_time" class="form-control timepicker">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						  </div>
						  
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Address</label>
                           <input tabindex="6"  type="text" class="form-control required" name="address" placeholder="Address">
                           <span class="glyphicon  form-control-feedback"></span>
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


