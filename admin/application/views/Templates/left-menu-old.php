<?php  
     $menu = $this->session->userdata('admin');
?>  
  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
		  
	<div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo  $this->session->userdata('profile_pic'); ?>" class="user-image left-sid" >
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('logged_in_admin')['username']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
		  
          <!-- sidebar menu: : style can be found in sidebar.less -->
             <ul class="sidebar-menu">
			 
			 
			       <li class="treeview">
					  <a href="#">
						<i class="fa fa-bus"></i> <span>Bus Management</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Bus_details/view_busdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="<?php echo base_url();?>Bus_details/add_busdetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
						<li><a href="<?php echo base_url();?>Bus_details/view_bustypedetails"><i class="fa fa-circle-o text-aqua"></i>Add Bus Type</a></li>
					  </ul>
                   </li>


                   
				 
				   
			       <li class="treeview">
					  <a href="#">
						<i class="fa fa-arrows-v"></i> <span>Route Details</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Route_details/view_routedetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="<?php echo base_url();?>Route_details/add_routedetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
					  </ul>
                   </li>
				    
						
				
				   
				    <li class="treeview">
					  <a href="#">
						<i class="fa fa-hand-o-up"></i> <span>Board Point Details</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Borderpoint_details/view_borderdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="<?php echo base_url();?>Borderpoint_details/add_boardpointdetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
					  </ul>
                   </li>
				   
				         <!-- <li>
                            <a href="#">                     
							<i class="fa fa-tint" aria-hidden="true"></i>
                            <span>Drop Point Details</span><i class="fa fa-angle-left pull-right"></i> </a>
							<ul class="treeview-menu">
							<li><a href="<?php echo base_url();?>Droppoint_details/view_dropdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
							<li><a href="<?php echo base_url();?>Droppoint_details/add_droppointdetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
						  </ul>
                        </li> -->

                        <!-- <li class="treeview">
					  <a href="#">
						<i class="fa fa-bus"></i> <span>Promo Management</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Promo_details/view_promodetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="<?php echo base_url();?>Promo_details/add_promodetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
						
					  </ul>
                   </li> -->
			
				   
				   
				  
				        <!-- <li>
                            <a href="<?php echo base_url(); ?>gallery_details/add_gallery"><i class="glyphicon glyphicon-picture"></i><span>Gallery</span></a>
                        </li> -->
					
					 <?php
                       if( $menu==1  )
                        {
                       ?>	
						
						 <!-- <li class="treeview">
					  <a href="#">
						<i class="fa fa-asterisk" aria-hidden="true"></i><span>Agent</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Agent_details/view_Agent_details"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="<?php echo base_url();?>Agent_details/add_agent_details"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
					  </ul>
                   </li> -->
<?php
						} 
						?>
                     
					  <?php
                       if( $menu==1  )
                        {
                       ?>
					   <li>
                            <a href="<?php echo base_url(); ?>Settings_details/view_settings"><i class="fa fa-wrench" aria-hidden="true"></i><span>Settings</span></a>
                        </li>
						<?php
						} 
						?>
						<?php
                       if( $menu==1  )
                        {
                       ?>
					   <!-- <li>
                            <a href="<?php echo base_url(); ?>Customer_details/view_customerdetails"><i class="fa fa-users" aria-hidden="true"></i><span>Customer</span></a>
                        </li> -->
						<?php
						} 
						?>
						
						<!-- <li>
                           <a href="#">                     
							<i class="fa fa-ban" aria-hidden="true"></i><span>Cancellation</span><i class="fa fa-angle-left pull-right"></i> </a>
							<ul class="treeview-menu">
							<li><a href="<?php echo base_url();?>Cancellation_details/view_cancellation"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
							<li><a href="<?php echo base_url();?>Cancellation_details/add_cancellation"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
						  </ul>
                        </li> -->
						
						
						<!-- <li>
						   <a href="<?php echo base_url(); ?>Booking_details/view_bookingdetails"><i class="fa fa-book" aria-hidden="true"></i><span>Booking Details</span></a>                     
                        </li> -->
						

					   <!-- <li>
							<a href="<?php echo base_url(); ?>seat_layout/index"><i class="fa fa-crosshairs" aria-hidden="true"></i>
							<span>Seat Layout</span></a>
                      </li> -->
                     <!-- <li>
						   <a href="<?php echo base_url(); ?>Rating_details/view_ratingdetails"><i class="fa fa-star" aria-hidden="true"></i><span>Rating</span></a>                     
                      </li>	 -->				  
             </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
