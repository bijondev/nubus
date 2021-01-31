<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

          <h1>
            Add Setting Details
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-wrench" aria-hidden="true"></i>Home</a></li>
            <li><a href="#">Settings</a></li>
            <li class="active">Add Settings</li>
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
                  <h3 class="box-title">Add Setting Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
				 <div class="box-body">
				 <div class="col-md-6">
				 
                        
                                    <div class="form-group">
                                    <label class="intrate">Title</label>
                                    <input tabindex="1" class="form-control required regcom" type="text" name="title" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->title; ?>">
                                    </div>
										
								    <div class="form-group">
                                    <label class="intrate">Smtp Username</label>
                                    <input tabindex="3"class="form-control required regcom" type="text" name="smtp_username" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->smtp_username; ?>">
                                    </div>	
                                    
									<div class="form-group">
                                    <label  class="intrate">Smtp Host</label>
                                    <input tabindex="5"	class="form-control regcom required" type="text" name="smtp_host" data-parsley-trigger="keyup" required="" id="smtp_host" value="<?php echo $result->smtp_host; ?>" >
                                    </div>
									   <div class="form-group">
									   <label class="intrate">Smtp Password</label>
									   <input tabindex="7"class="form-control regcom required" type="text" name="smtp_password" data-parsley-trigger="keyup" required="" id="smtp_password" value="<?php echo $result->smtp_password; ?>" >
									   </div>
										
								   <div class="form-group">
                                   <label class="intrate">Sender Id</label>
                                   <input tabindex="9" class="form-control regcom required" type="text" name="sender_id" data-parsley-trigger="keyup" required="" id="smtp_password" value="<?php echo $result->sender_id; ?>">
                                   </div>
								   
								    <div class="form-group">
								   <label class="intrate">Sms username</label>
								   <input tabindex="11"class="form-control regcom required" type="text" name="sms_username" data-parsley-trigger="keyup" required="" id="sms_username" value="<?php echo $result->sms_username; ?>">
								   </div>

								   
								   
								   
								   
                     <div class="form-group">
                        <input tabindex="13" type="submit" class="btn btn-primary" value="Save" id="taxiadd">                      
                     </div>
                  </div>
				  
				        <div class="col-md-6">
						          
						            								          
								   <div class="form-group">
									<label class="intrate">Sms Password</label>
									<input tabindex="2" class="form-control regcom required" type="text" name="sms_password" data-parsley-trigger="keyup" required="" id="sms_password" value="<?php echo $result->sms_password; ?>">
								   </div>

								   <div class="form-group">
                                    <label  class="intrate">App Key</label>
                                    <input tabindex="4" class="form-control regcom required" type="text" name="app_key" data-parsley-trigger="keyup" required="" id="app_key" value="<?php echo $result->app_key; ?>" >
                                   </div>
                                   <div class="form-group">
										
                                    <?php $new=$result->payment_option;

                                    $new_payement=explode(',', $new);
                                 
                                   
                                    ?>        
		                        <label>Payment option</label><br>
		                        <input tabindex="6"type="checkbox" name="payment_option[]" value="PayPal" <?php if(in_array("PayPal",$new_payement)) {echo 'checked'; }?>> PayPal<br>
		                        <input  type="checkbox" name="payment_option[]" value="Cash"  <?php if(in_array("Cash",$new_payement)) {echo 'checked'; } ?>> Cash<br>
		                         </div> 
								   
								   
						           <div class="form-group has-feedback">
								   <label for="exampleInputEmail1">Logo</label>
								   <input tabindex="8" name="logo" class="" accept="image/*" type="file">
								   <img src="<?php echo base_url().$result->logo; ?>" width="100px" height="100px" alt="Picture Not Found"/>
								   </div>							   
								   
								   <div class="form-group has-feedback">
								   <label for="exampleInputEmail1">Favicon</label>
								   <input tabindex="10" name="favicon"  type="file" class="">
								   <img src="<?php echo base_url().$result->favicon; ?>" width="25px" height="25px" alt="Picture Not Found"/>
								   </div>							 		 
		                </div>
				  
				  
		         
		           
				   
				   
		
             </div><!-- /.box-body -->
  
                </form>
              </div><!-- /.box -->
            </div>
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div>

	  