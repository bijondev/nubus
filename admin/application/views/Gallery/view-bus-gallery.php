<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         View Bus Gallery
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-hand-o-up"></i>Home</a></li>
         <li><a href="#">Gallery</a></li>
         <li class="active">View Gallery</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
			
			
							<div class="box-header with-border ">
						    <h2><i class="glyphicon fa fa-bus"></i> <?php echo $data[0]->bus_name;; ?> Gallery</h2>	

							</div>

							<div class="box-inner">
						  
							<div class="box-content">
							<ul class="thumbnails gallery">
                            <?php
							foreach($data as $bus) {
								$image = $bus->image;
								?>
                            <li class="thumbnail" data-id="<?php echo $bus->id; ?>">
                                <a style="background:url(<?php echo base_url().$image; ?>) no-repeat; background-size:120px;"
                                   title="<?php echo $bus->bus_name; ?>" href="<?php echo base_url().$image; ?>"></a>
                            </li>
                            <?php
							}
							?>
							</ul>
							</div>
							</div>
    <!--/span-->
              </div>	  
            </div>			  
				 
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

        <div class="modal modal-wide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Gallery Details</h3>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="<?php echo base_url(); ?>assets/images/ajax-loader-4.gif" /></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
		</div>





