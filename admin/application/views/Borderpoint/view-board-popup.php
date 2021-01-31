		<div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
				<div class="box-header with-border">
         <h3 class="box-title">View Boarding Point Details</h3>
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
                    <dt>Route </dt>
                    <dd><?php echo $data->board_point; ?></dd>
                    <dt>New Boarding Point </dt>
                    <dd><?php echo $data->pickup_point; ?></dd>                                      
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
            
            <div class="col-md-6">
              <div class="box box-primary">
               <div class="box-header with-border">
         <h3 class="box-title">View BoardPoint Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>                     
                <div class="box-body">
                  <dl>
                    <dt>Landmark</dt>
                    <dd><?php echo $data->landmark; ?></dd>                   
					<dt>Address</dt>
                    <dd><?php echo $data->address; ?></dd> 
					<dt>Start Time</dt>
                    <dd><?php echo $data->pickup_time; ?></dd>
                  </dl>
                </div><!-- /.box-body -->	  
	  
	  
          
              </div><!-- /.box -->
            </div><!-- ./col -->
          </div>  
			
		
		 
		  