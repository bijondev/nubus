
 <!-- Add promo code Management in admin-side created by Anju MS on 08-12-2016-->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Promo Management Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Promo Management</a></li>
         <li class="active">Add Promo</li>
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
                  <h3 class="box-title">Add Promo Code Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Code</label>
                            <input tabindex="1"type="text" class="form-control required" data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="code"  placeholder="Promo Code">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>   
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Status</label>
                            <!-- <input type="text" class="form-control required" data-parsley-trigger="change"  
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="status"  placeholder="Type"> -->
                            <select  tabindex="3"class="form-control required" name="status">
                              <option value="">Select Status</option>
                              <option value="0">Inactive</option>
                              <option value="1">Active</option>
                            </select>
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>         
						
					   <!-- <div class="form-group">
                        <label>Promo Type</label>
							<select class="form-control select2 required"  style="width: 100%;" name="bus_type_id">
								   <?php
								   if($result) {
									  foreach($result as $bustypedetails){
										  //var_dump($busdetails);
								   ?>
								   <option value="<?php echo $bustypedetails->id;?>"><?php echo $bustypedetails->bus_type_id ." - ". $bustypedetails->bus_type;?></option>								  
								   <?php
								   }
								   }
								   ?>
                            </select>
                       </div> -->
					
	

						
					    <div class="box-footer">
                     <button tabindex="5" type="submit" class="btn btn-primary">Submit</button>
                  </div>             
                        </div>                   
                   <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Amount</label>
                           <input  tabindex="2"type="text" class="form-control required" name="amount" data-parsley-trigger="change"  
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Amount">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
				   
				      	<div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Expiry Date</label>
                           <input tabindex="4" type="text" class="form-control required" id="datepicker" name="expire_date" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="YYYY-MM-DD">
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

