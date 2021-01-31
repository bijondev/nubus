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
            <div class="box box-warning">
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
					
					    <div class="box-body">
						<label>Banner Image1</label>
						<input type="file" name="blog_content"  id="blog_content" class="form-control regcom" value="<?php echo $row->blog_content; ?>">
						</div>
						
						<div class="box-body">
						<label>Banner Image2(car)</label>
						<input type="file" name="baner_car"  id="baner_car" class="form-control regcom" value="<?php echo $row->baner_car; ?>">
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


