<!DOCTYPE html>
<html lang="en">
  <?php
  $this->load->view('Templates/header-script');
  ?>
   <body>
     
         <?php
	  $this->load->view('Templates/header-menu');
	  ?>
         <!--SEARCH-BAR-END-->
         <!--operator-BAR-->
      <div class="container">
       <div class="row mtop">
			
				
				
               <div class="col-md-12">
             
				<div class="not_foundp">
				   <img src="<?php echo base_url();?>assets/images/404page.png">
				   
				   </div>
              
            </div>
         </div>
         <!--offers-BAR-->
      
         <!--offers-BAR end-->
         <!--list-BAR-->
         <div class="container">
            <div class="rb_list">
               <div class="row">
              <div class="ops_nt">Redirect to <a href="<?php echo base_url();?>"><i style="color:#D30008;">home</i></a> page</div>
               </div>
            </div>
            <hr class="border2">
            </hr>
         </div>
         <!--list-BAR end-->
         <!--footer-BAR-->
         <div class="container">
         <div class="row">
         <div class="tb_inner">
         <div class="col-md-9">
         <div class="tb_footer">
         <ul>
         <li><a href="#">About &nbsp;|</a></li>
         <li><a href="#">FAQ   &nbsp;|</a></li>
         <li><a href="#">Careers  &nbsp;|</a></li>
         <li><a href="#">Coupons  &nbsp; |</a></li>
         <li><a href="#">Contact Us   &nbsp;|</a></li>
         <li><a href="#">Terms of Use   &nbsp;|</a></li>
         <li><a href="#">Privacy Policy   &nbsp;|</a></li>
         <li><a href="#">NUBus on Mobilenew .</a></li>
         </ul>
         </div>
         <!-- <div class="footer_con">  &#169;  2016 TrueBus All Rights Reserved</div> -->
         </div>
         <div class="col-md-3">
         <div class="tb_social">
         <ul>
         <li>  <a href="#"><img src="<?php echo base_url();?>assets/images/facebook.png"></a> </li> 
         <li>  <a href="#"> <img src="<?php echo base_url();?>assets/images/twitter.png"></a></li>
         <li>  <a href="#">  <img src="<?php echo base_url();?>assets/images/google.png"></a></li>
         </ul>
         </div>
         </div>
         </div>
         </div>
         </div>

   
      <!--footer-BAR -end-->
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
    
 
      <!--   custom JavaScript -->
	  <?php
      $this->load->view('Templates/footer-script');
	  ?>
   </body>
</html>

