   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Agent Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-asterisk" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">Agent Details</a></li>
         <li class="active">View Agent Details</li>
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
                  <h3 class="box-title">View Agent Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Username</th>                                                                             
                           <th>First Name</th>                                                                             
                           <th>Company Name</th>                                                                             
                           <th>Email</th> 
                           <th>Phone Number</th>						                            
                           <th>City</th>						                            
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        
                          <?php
                           foreach($data as $user) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $user->id; ?></td>
                           <td class="center"><?php echo $user->username; ?></td>                         
                           <td class="center"><?php echo $user->first_name; ?></td>					   
                           <td class="center"><?php echo $user->company_name; ?></td>					   
                           <td class="center"><?php echo $user->email; ?></td>
                           <td class="center"><?php echo $user->phone_number; ?></td>	
                           <td class="center"><?php echo $user->city; ?></td>	
						   <td class="center">	                         
                           		  
                              <a class="btn btn-sm bg-olive show-agentgetdetails" href="javascript:void(0);" data-id="<?php echo $user->id; ?>">
                              <i class="fa fa-fw fa-eye"></i> View </a>	
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Agent_details/edit_agent_details/<?php echo $user->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Agent_details/agent_delete/<?php echo $user->id; ?>" onClick="return doconfirm()">
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
                           <th>Username</th> 
                           <th>First Name</th> 
                           <th>Company Name</th> 						   
                           <th>Email</th> 
                           <th>Phone Number</th>
                           <th>City</th>						   
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
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<div class="modal fade modal-wide" id="popup-agentgetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Agent Details</h4>
         </div>
         <div class="modal-agentbody">
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

