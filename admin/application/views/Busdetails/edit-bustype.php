<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit BusType Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#"> BusType Details</a></li>
         <li class="active">Edit BusType </li>
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
                  <h3 class="box-title">Edit BusType</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
       <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
					      
			
 
						 <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Bus Type Name</label>
                           <input type="text" class="form-control required" name="bus_type" value="<?php echo $data->bus_type; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="Bus Type Name">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						
						
						 
				   
						
						
						
					    <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
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

