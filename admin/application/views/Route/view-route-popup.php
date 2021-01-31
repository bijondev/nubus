		<div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
				<div class="box-header with-border">
         <h3 class="box-title">View Route Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
                <div class="box-body">
                  <dl>
                    <dt>Bus Name</dt>
                    <dd><?php echo $data->bus_name; ?></dd>               
                    <dt>Start Point</dt>
                    <dd><?php echo $data->board_point; ?></dd>
                    <dt>Start Time</dt>
                    <dd><?php echo $data->board_time; ?></dd>
                    <dt>End Point</dt>
                    <dd><?php echo $data->drop_point; ?></dd>                   
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
            
            <div class="col-md-6">
              <div class="box box-primary">
               <div class="box-header with-border">
         <h3 class="box-title">View Route Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>                     
                <div class="box-body">
                  <dl>
                    <dt>Fare</dt>
                    <dd><?php echo $data->fare; ?></dd>                   
					<dt>created_by</dt>
                    <dd><?php echo $data->created_by; ?></dd> 
                    <dt>Arrival Time</dt>
                    <dd><?php echo $data->drop_time; ?></dd>					
                  </dl>
                </div><!-- /.box-body -->	  
	  
	  
          
              </div><!-- /.box -->
            </div><!-- ./col -->
          </div>  
			
		
		 
		  