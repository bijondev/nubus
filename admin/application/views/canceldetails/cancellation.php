<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Cancellation Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-ban" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">Cancellation</a></li>
         <li class="active">Cancellation</li>
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
                  <h3 class="box-title">Cancellation Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">                      
						
					    <div class="form-group">
                          <label>Bus Name</label>
							<select tabindex="1"class="form-control select2 required"  style="width: 100%;" id="bus_details" name="bus_id">
								   <?php
									  foreach($cancelresult as $canceldetails){
								   ?>
								   <option value="<?php echo $canceldetails->id;?>"><?php echo $canceldetails->bus_name;?></option>
								   <?php
								   }
								   ?>
                            </select>
                        </div>				
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Percentage</label>
                           <input tabindex="3" type="text" class="form-control" name="percentage" placeholder="Percentage">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Cancellation Price Type</label></br>
							<input tabindex="5" type="radio" name="type" value="percentage"> Percentage
							
							<input  tabindex="5"type="radio" name="type" value="flat"> Flat <br>
						</div>

					    <div class="box-footer">
                     <button tabindex="7"type="submit" class="btn btn-primary">Submit</button>
                  </div>             
                        </div>                   
                   <div class="col-md-6">
				   
				        <div class="bootstrap-timepicker">
							<div class="form-group">
							  <label>Cancel Time</label>
							  <div class="input-group">
								<input tabindex="2"type="text" id="timepicker_cancellation" name="cancel_time" class="form-control">
								<div class="input-group-addon">
								  <i class="fa fa-clock-o"></i>
								</div>
							  </div><!-- /.input group -->
							</div><!-- /.form group -->
						</div>
						
						  
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Flat</label>
                           <input tabindex="4"type="text" class="form-control" name="flat" placeholder="Flat">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>

						
			
                  <!-- /.box-body -->
                  
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


