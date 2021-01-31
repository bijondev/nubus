		<div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
				<div class="box-header with-border">
         <h3 class="box-title">ViewRating Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
                <div class="box-body">
                   <table id="" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>User Name</th> 						   
                           <th>Bus Quality</th> 						   
                           <th>Punctuality</th> 
                           <th>Staff Behaviour</th>                                                           				   
                           <th>Average</th>                                                           				   
                           <th>Comments</th>                                                           				   
                        </tr>
                    </thead>
                  <tbody>

				  <?php
				  $ratingdetails = explode('<=>', $result[0]->customer);
				  foreach($ratingdetails as $getrating){
				  $row = explode('<#>', $getrating)
				  ?>
				  <tr>
				    <td class="center"><?php echo $row[0]; ?></td>
				    <td class="center"><?php echo $row[1]; ?></td>
				    <td class="center"><?php echo $row[2]; ?></td>
				    <td class="center"><?php echo $row[3]; ?></td>
				    <td class="center"><?php echo $row[4]; ?></td>
				    <td class="center"><?php echo $row[5]; ?></td>
					<td class="center">	                         
                    </td>
				  </tr>
				  
				  <?php
				  }
				  ?>
				  </tbody>
				  
		         	</table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
           
          </div>  
			
		
		 
		  