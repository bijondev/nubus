 <!-- View promo code Management in admin-side created by Anju MS on 08-12-2016-->	
	
	<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Promo Management Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#"> Promo Management </a></li>
         <li class="active">View Promo Details</li>
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
                  <h3 class="box-title">View Promo Management Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Promo Code</th>                                                                             
                           <th>Amount</th> 
   						   
                           <th>Expiry Date</th>                        
                           <th>Status</th>                        
                          
                           <th width="200px;">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $promo) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $promo->id; ?></td>
                           <td class="center"><?php echo $promo->code; ?></td>                         
                           <td class="center"><?php echo $promo->amount; ?></td> 
                           <td class="center"><?php echo $promo->expire_date; ?></td>   
                            <td class="center"><?php echo $promo->status==1?"Active":"Inactive"; ?></td>                    
                           <td class="center">	                         
                           		  
                         <a class="btn btn-sm bg-olive show-promo"  href="javascript:void(0);"  data-id="<?php echo $promo->id; ?>">
                              <i class="fa fa-fw fa-eye"></i> View </a>							
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Promo_details/edit_bus/<?php echo $promo->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Promo_details/delete_bus/<?php echo $promo->id; ?>" onClick="return doconfirm()">
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
                           <th>Promo Code</th>                                                                             
                           <th>Amount</th> 
                           <th>Expiry Date</th>                        
                           <th>Status</th>                        
                          
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

<div class="modal fade modal-wide" id="popup-promoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Promo Management Details</h4>
         </div>
         <div class="modal-promobody">
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
 