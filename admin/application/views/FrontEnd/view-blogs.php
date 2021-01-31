<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Blogs
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-hand-o-up"></i>Home</a></li>
         <li><a href="#">Blogs Details</a></li>
         <li class="active">View Blogs</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
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
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Blogs</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Blogs Name</th> 				                                                   
                           <th width="300px;">Action</th>
                        </tr>
                     </thead>
                     <tbody>					 
                        <?php
                           foreach($data as $blogsdetails) {	
                               /* if($blogsdetails['id']=="5"){
									$s ="edit_blogs";
								}else{
									$s ="admin-add-static";
								}*/
								
								$blogsdetails     = get_object_vars($blogsdetails);
								$id       = $s['5'];{
								$title    = $s['edit_blogs'];
								}else{
									$s ="admin-add-static";
								}
								
												   
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $blogsdetails->id; ?></td>
                           <td class="center"><?php echo $blogsdetails->block_name; ?></td>                                                                     					   
                           <td class="center">
                            
							   <a href="<?php echo base_url();?>Blogs_details/edit_blogs/<?php echo $s;?><?php echo $blogsdetails->id; ?>">
                               <i class="fa fa-fw fa-edit"></i></a>
							  
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Blogs Name</th> 						                     
                           <th width="300px;">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

