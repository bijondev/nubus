 <!-- Edit promo code Management in admin-side created by Anju MS on 08-12-2016-->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Promo Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Promo Details</a></li>
         <li class="active">Edit Promo</li>
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
                  <h3 class="box-title">Edit Promo Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-6">
					 
					      <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Promo Code</label>
                            <input tabindex="1" type="text" class="form-control required" value="<?php echo $data->code; ?>" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="code"  placeholder="Promo Code">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						
						
					     <!-- <div class="form-group">
                        <label>Bus Type</label>
							<select class="form-control select2"  style="width: 100%;" name="bus_type_id" >
								   <?php
								   if($result) {
									  foreach($result as $bustypedetails){
										  $s = ($bustypedetails->id == $data->bus_type_id) ? "selected" : "";
										
								   ?>
            <option <?php echo $s; ?> value="<?php echo $bustypedetails->id;?>"><?php echo $bustypedetails->bus_type; ?></option>
								   <?php
								   }
								   }
								   ?>
                            </select>
                        </div>	 -->				
						<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Status</label>
                           <select tabindex="3" class="form-control required" name="status">
                              <option value="0" <?php if($data->status=='0') echo 'SELECTED="SELECTED"'; ?>>Inactive</option>
                              <option value="1" <?php if($data->status=='1') echo 'SELECTED="SELECTED"'; ?>>Active</option>
                            </select>
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						 
						  
					
						  
					             			   
					    
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button tabindex="5"type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				   <div class="col-md-6">
				   
				        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Amount</label>
                           <input tabindex="2" type="text" class="form-control required" name="amount" value="<?php echo $data->amount; ?>"data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-maxlength="15"  required="" placeholder="Amount">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						 <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Expiry Date</label>
                           <input tabindex="4 type="text" class="form-control required" id="datepicker" name="expire_date" value="<?php echo $data->expire_date; ?>"
						   data-parsley-trigger="change" required="" placeholder="Date">
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

