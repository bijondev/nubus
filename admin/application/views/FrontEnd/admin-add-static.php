<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Blogs Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-tint" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">Blog Details</a></li>
         <li class="active">Edit Blogs</li>
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
            <div  class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Blogs Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
			    <form role="form" action="" method="post" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-12">                      
						
					   
					    <label>Block Name</label>
						<input type="text" name="block_name"  id="name" class="form-control regcom" value="<?php echo $row->block_name; ?>">
						<input type="hidden" name="id" id="id" class="form-control " value="<?php echo $row->id; ?>">
					
					    <div class="box">
                  <div class="box-header">
                  <h3 class="box-title">Editor </h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                   <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                   <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body pad">
                 
                   <textarea id="blog_content" class="textarea" name="blog_content" rows="10" cols="80"><?php echo $row->blog_content; ?>
                   </textarea>
                
                  </div>
                  </div><!-- /.box --> 
										<div class="box-body">
                                       
                                        <input type="Submit" class="btn btn-primary" value="Submit"  name="" id="useradd">
                                        <button type="reset" class="btn btn-primary">Reset </button>
                                        </div>
						
					

					            
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


