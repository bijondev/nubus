		<div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
				<div class="box-header with-border">
         <h3 class="box-title">View Booking Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
	  
                <div class="box-body">
	<div class="box-body">
    <table id="" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Customer Name</th> 						   
                           <th>Age</th> 						   
                           <th>Gender</th> 
                           <th>Seat Number</th>                                                           				   
                        </tr>
                    </thead>
                  <tbody>
				     <?php	
						$bookingget = explode('<=>', $data[0]->customer);
						foreach ($bookingget as $getbook){
					    $row = explode('<#>', $getbook);
			        	?>
                        <tr>
                           <td class="center"><?php echo $row[0]; ?></td>
                           <td class="center"><?php echo $row[1]; ?></td>                                                 
                           <td class="center"><?php echo $row[2]; ?></td>                                                 
                           <td class="center"><?php echo $row[3]; ?></td>
                           <td class="center">	                         
                           </td>
                        </tr>  
             
                
				<?php
				}
				?>
                </div><!-- /.box-body -->
				
	</table>
</div>	
				
              </div><!-- /.box -->
            </div><!-- ./col -->
          </div>  
			
		
		 
		  