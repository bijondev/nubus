<!DOCTYPE html>
<html  ng-app='myFrontend'>
  <?php
  $this->load->view('Templates/header-script');
  ?>
 
  <body >
  
	  <?php
	  $this->load->view('Templates/header-menu');
	  
	  $this->load->view($page);

	  $this->load->view('Templates/footer');
      
      $this->load->view('Templates/footer-script');
  ?>
  </body>
</html>
