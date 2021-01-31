<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Agent Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-asterisk" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">Agent Details</a></li>
         <li class="active">Add Agent</li>
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
                  <h3 class="box-title">Add Agent Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">username</label>
                            <input tabindex="1" type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="username"  placeholder="username">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">First Name</label>
                            <input tabindex="3" type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="first_name"  placeholder="First Name">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Company Name</label>
                            <input  tabindex="5"type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="company_name"  placeholder="Company Name">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">email</label>
                            <input tabindex="7"type="email" class="form-control required"  name="email"  placeholder="email">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
                        
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">city</label>
                            <input tabindex="9"type="text" class="form-control required"  data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="city"  placeholder="city">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 

					
					   <div class="form-group col-md-4">
                       <label>Display Picture</label>
                       <input tabindex="10"name="profile_pic" type="file" accept="image/*" class="required">
                       </div>
					   
					  
						
					           
                </div> 
				
				
				<div class="col-md-6">
				
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Password</label>
                            <input tabindex="2"type="Password" class="form-control required"  data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" name="password"  placeholder="Password">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Last Name</label>
                            <input tabindex="4" type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="last_name"  placeholder="Last Name">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 

                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Address</label>
                            <input tabindex="6" type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="address"  placeholder="Address">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 						
						 

						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Phone Number</label>
                            <input tabindex="8" type="text" class="form-control required" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9 \/]+$" required=""  name="phone_number"  placeholder="Phone Number">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>



						
						
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Country</label>
                            <input tabindex="10" type="text" class="form-control required"  data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="country"  placeholder="Country">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
	
						
					             
                </div> 
					
			 
</div>		
   		 <div class="box-footer">
                     <button tabindex="11"type="submit" class="btn btn-primary">Submit</button>
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

