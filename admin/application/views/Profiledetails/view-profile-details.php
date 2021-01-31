<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Agent Profile Details
            <small></small>
          </h1>
    
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
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
                   
				   
				       <div class="col-md-7">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">View Agent Profile Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url();?>Profileview_details/view_profile_details" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                 
				 <div class="box-body">
				 <div class="col-md-6">
					  	

					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">User Name</label> </br>
					   <?php echo $data->username; ?>     
					   </div>
					   
					   
					   <div class="form-group has-feedback">
                       <label for="exampleInputEmail1">First Name</label>
					   <input type="text" class="form-control required" name="first_name" value="<?php echo $data->first_name; ?>" data-parsley-trigger="change"	
                        data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" placeholder="First Name">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">City</label>
					   <input type="text" class="form-control required" name="city" value="<?php echo $data->city; ?>" data-parsley-trigger="change"	
                        data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="City">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					    <div class="form-group has-feedback">
					    <label for="exampleInputEmail1">Country</label>
						<input type="text" class="form-control required" name="country" value="<?php echo $data->country; ?>"  data-parsley-trigger="change"	
						 data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="City">
					    <span class="glyphicon  form-control-feedback"></span>
						</div>
					   
						  <div class="box-footer">
							<button type="submit" class="btn btn-primary">Update</button>
						  </div>				  

		              </div>
					  
					     <div class="col-md-6">
						 
							   <div class="form-group has-feedback">
							   <label for="exampleInputEmail1">Email</label> </br>
							   <?php echo $data->email; ?>     
							   </div>
							   
							   <div class="form-group has-feedback">
							   <label for="exampleInputEmail1">Lastname</label>
							   <input type="text" class="form-control required" name="last_name" value="<?php echo $data->last_name; ?>" data-parsley-trigger="change"	
                               data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required=""placeholder="Lastname">
							   <span class="glyphicon  form-control-feedback"></span>
							   </div>

							   <div class="form-group has-feedback">
							   <label for="exampleInputEmail1">Phonenumber</label>
							   <input type="text" class="form-control required" name="phone_number" value="<?php echo $data->phone_number; ?>" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" placeholder="Phonenumber">
							   <span class="glyphicon  form-control-feedback"></span>
							   </div>
							   
					
							   <div class="form-group has-feedback">  
							   <label>Display Picture</label>
							   <div class="form-control ">
							   <input name="profile_pic" accept="image/*" class="required" type="file">
							   </div>
							   <div>
							   <img src="<?php echo $data->profile_picture; ?>" width="100px" height="100px" alt="Picture Not Found"/>
							   </div>
							   </div>
							   
							
							   
						 </div>
						 
					   
					   
                   </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
            </div> 
			
			
			
			
				   <div class="col-md-5">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Reset Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url(); ?>Profileview_details/change_profile_password" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                 
				 <div class="box-body">
				 <div class="col-md-6">
                 <div class="form-group col-md-12">
	
                      <label>Old Password</label>
                      <div class="input-group">
                      <input type="password" name="password" class="form-control input_size" data-parsley-trigger="change"	
                     data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Enter Old Password">
                      <span class="input-group-btn">
							<button class="btn btn-flat show-pwd-btn" type="button">
								<i class="fa fa-eye"></i>
							</button>
					  </span>
                      </div>
                      </div>

                      <div class="form-group col-md-12">
                      <label>New Password</label>
                      <div class="input-group">
                      <input type="password" name="n_password" class="form-control input_size required" data-parsley-trigger="change"	
                     data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required=""placeholder="Enter New Password">
                      <span class="input-group-btn">
							<button class="btn btn-flat show-pwd-btn" type="button">
								<i class="fa fa-eye"></i>
							</button>
					  </span>
                      </div>
                      </div>

                      <div class="form-group col-md-12">
                      <label>Confirm Password</label>
                      <div class="input-group">
                      <input type="password" name="c_password" class="form-control input_size required" data-parsley-trigger="change"	
                      data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required=""placeholder="Enter Password Again">
                      <span class="input-group-btn">
							<button class="btn btn-flat show-pwd-btn" type="button">
								<i class="fa fa-eye"></i>
							</button>
					  </span>
                      </div>
                      </div>				  
						  <div class="box-footer">
							<button type="submit" class="btn btn-primary" name="reset_pwdd">Update</button>
						  </div>				  

		              </div>
					   
                   </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
            </div> 
			
			
			
			
			
			
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div>
	  
