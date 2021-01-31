      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T</b>B</span>
          <!-- logo for regular state and mobile devices -->
          <span class="hidden-xs"><?php $title = $this->session->userdata('title');echo $title['title'];
		 //print_r($title);
		 ?></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">				          
                  <img src="<?php echo  $this->session->userdata('profile_pic'); ?>" class="user-image" >
                  <span class="hidden-xs">
                    <?php $a=$this->session->userdata('logged_in_admin');
					
                    echo $a['username'];?>
                  </span>
                </a>
				
				
			<?php
			//var_dump($this->session->userdata('profile_pics'));
			//exit();
			?>
                  <ul class="dropdown-menu">
                  <!-- User image --> 
                  <li class="user-header">
                      <img src="<?php echo  $this->session->userdata('profile_pic'); ?>" class="img-circle">
                  </li>				  
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                   <li class="user-footer">
                    <div class="pull-left">
				            <?php
					$profile_link = ($this->session->userdata('admin') == 1) ? base_url()."Admin_detailsview/Admin_profile_view" : base_url()."Profile_details/view_profile";
					?>
                      <a href="<?php echo $profile_link; ?>" class="btn btn-default btn-flat">Profile</a>
					 </div>

                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
