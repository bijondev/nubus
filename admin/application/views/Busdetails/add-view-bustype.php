   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add BusType Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Bus Details</a></li>
         <li class="active">Add Bus Type</li>
      </ol>
   </section>
   <!-- Main content -->	
   <section class="content">
      <div class="row">
	  <div class="col-md-12">
			<?php
				    if($this->session->flashdata('message')) {
				    $message = $this->session->flashdata('message');
					?>
					<div class="alert alert-<?php echo $message['class']; ?>">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<?php echo $message['message']; 
					?>
					</div>
					<?php
					}
                $sess_id=$this->session->userdata('admin_logged_in');
		        $u_id=$sess_id['id'];
            ?>
			</div>
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Add BusType Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-12">
                         <div class="form-group">
                           <label for="exampleInputEmail1">BusType Name</label>
                           <input type="text" class="form-control required" name="bus_type" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" id="exampleInputEmail1" placeholder="Enter Bus Type Name">
                         </div>
                     </div>
                     <!-- /.box -->
                  </div>
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View BusType Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Bus Type Name</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($data as $bustypename) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $bustypename->id; ?></td>
                           <td class="center"><?php echo $bustypename->bus_type; ?></td>
                           <td class="center"><?php  if($bustypename->status==1){echo "active";} else{echo "inactive";} ?></td>
                           <td class="center">	
						       
							  <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Bus_details/edit_busType/<?php echo $bustypename->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
												 
								 <?php if( $bustypename->status){?>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Bus_details/bus_status/<?php echo $bustypename->id; ?>"> 
                              <i class="fa fa-fw fa-trash"></i>Disable</a>           
                              <?php
                                 }
                                 
                                 else
                                 {
                                 ?>
                             <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Bus_details/bus_active/<?php echo $bustypename->id; ?>"> 
                              <i class="fa fa-fw fa-trash"></i>Activate</a>
                              <?php
                                 }
                                 ?>
								 
								 
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Bus Type Name</th>
                           <th>Status</th>
                           <th>Action</th>
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
   </section>
</div>
<!-- /.row -->
<!-- /.content -->

