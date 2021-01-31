<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View DropPoint Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-tint" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">Droping Details</a></li>
         <li class="active">View  Drop Point</li>
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
                  <h3 class="box-title">View DropPoint Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Bus Name</th> 						   
                           <th>Route</th> 						   
                           <th>New Droping Point</th> 
                           <th>Start Time</th>						                                                   
                           <th>Landmark</th>						                                                   
                           <th>Address</th>						                                                   
                           <th width="200px;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($data as $dropingbus) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $dropingbus->id; ?></td>
                           <td class="center"><?php echo $dropingbus->bus_name; ?></td>                                                 
                           <td class="center"><?php echo $dropingbus->drop_point; ?></td>                                                 
                           <td class="center"><?php echo $dropingbus->stoping_point; ?></td>                         
                           <td class="center"><?php echo $dropingbus->drop_time; ?></td> 
						   <td class="center"><?php echo $dropingbus->landmark; ?></td>   
                           <td class="center"><?php echo $dropingbus->address; ?></td>						   
                           <td class="center">	                         
                           		  
                              <a class="btn btn-sm bg-olive show-dropgetdetails" href="javascript:void(0);" data-id="<?php echo $dropingbus->id; ?>">
                              <i class="fa fa-fw fa-eye"></i> View </a>	
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Droppoint_details/edit_droppointdetails/<?php echo $dropingbus->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Droppoint_details/delete_droppoint/<?php echo $dropingbus->id; ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>							
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Bus Name</th> 						   
                           <th>Route</th> 						   
                           <th>New Droping Point</th> 
                           <th>Start Time</th>						                                                   
                           <th>Landmark</th>						                                                   
                           <th>Address</th>	
                           <th width="200px;">Action</th>
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

<div class="modal fade modal-wide" id="popup-dropgetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Droppoint Details</h4>
         </div>
         <div class="modal-dropbody">
         </div>
         <div class="business_info">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


