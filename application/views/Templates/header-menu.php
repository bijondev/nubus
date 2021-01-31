  
	   <!--HEADER-BAR-->
         <div class="tb_header">
            <div class="container">
               <div class="col-md-6" style="padding:0;">
                  <div class="tb_logo"> <a href="<?php echo base_url();?>home"><img src="<?php echo base_url()."admin/".$logo->logo;?>"> </a> </div>
               </div>
               <div class="col-md-4" style="padding:0;">
                  <div class="tb_navbar">
                     <ul>
                        <li><a href="<?php echo base_url();?>">Home &nbsp;<span style="color:#f0a2a3;"> |</span></a></li>
                                            
                        <li> 
                           <?php
                                             if($this->session->userdata('logged_in')){
                                          ?>

                           <a href="<?php echo base_url();?>printsms">Print/SMS Ticket &nbsp;  <span style="color:#f0a2a3;"> |</span></a>
                             <?php 
                              } 
                             else{
                              ?>
<!--                            <a href="">Print/SMS Ticket &nbsp;  <span style="color:#f0a2a3;"> |</span></a>
 -->
<a href="#myModals" data-toggle="modal" data-target="#myModals">Print/SMS Ticket</a>  <span style="color:#f0a2a3;">
                        <?php   
                     }
                          ?>
                        </li>
                        <li>
                            <?php
                           if($this->session->userdata('logged_in')){
                           ?>


                           <a href="<?php echo base_url();?>cancellation">Easy Cancel/Refund</a>


                           <?php 
                              } 
                             else{
                              ?>
                                <a href="#myModals" data-toggle="modal" data-target="#myModals">Easy Cancel/Refund</a>  <span style="color:#f0a2a3;">
                        <?php   
                              }
                          ?>

                            </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-2" style="padding:0;">
			   
				<?php
			if(!$this->session->userdata('logged_in')){
				?>
                  <div class="signin_up">
                     <ul>
                        <li><a href="#myModals" data-toggle="modal" data-target="#myModals">Sign In</a>  <span style="color:#f0a2a3;">/</span></li>
                        <li><a href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
                     </ul>
                  </div>
				  <?php
			}else{
				$user =$this->session->userdata('logged_in');
      
			?>
				  
				  
				     <!------logged in---------------->
                            
                                 <div class="dropdown_lis">
<button onclick="myFunction()" class="dropbtn">Hai... <?php echo $user['name'];?>  &nbsp; <i class="fa fa-user"></i></button>        
     
                 <div id="tabs" class="dropdown-content">
    <a href="<?php echo base_url();?>myaccount/index"> <i class="fa fa-bookmark"></i>&nbsp;
 My Trips</a>
  
   
    <a href="<?php echo base_url();?>logout"> <i class="fa fa-sign-out"></i>&nbsp;
 Sign out</a>
  </div>
</div>  
<?php
			}
			?>
                             <!------logged end---------------->
               </div>
            </div>
            <div class="shadow"><img src="<?php echo base_url();?>assets/images/shadow.png"></div>
         </div>
         <!--HEADER-BAR-END-->
         <!-- Modal -->
         <div class="modal fade" id="myModals" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
			   <form id="login" data-parsley-validate="">
               <div class="login-block">
                  <h1>Login</h1>
                  <input type="text" name="username" placeholder="Email" class ="username" id="username" required=""/>
                  <input type="password" class="password" name="password" placeholder="Password" id="password" required=""/>
                  <input type="checkbox" id="checkbox3" class="css-checkbox" name="rememberme"/>
                  <label for="checkbox3"   class="css-label lite-red-check">Remember Me</label>
                  
				  <input  type="button" value="Login" style="position: relative;" onclick="Login()">
				   <br>
                  <div class="small_loader" style="text-align:center;display:none"><img src="<?php echo base_url();?>assets/images/loader-small.gif"></div>
				  <div class="login_res" style="text-align:center;"></div>
                  <br>
                  <div class="forgot"><a data-dismiss="modal" href="#myModalf"data-toggle="modal" data-target="#myModalf">Forgot Password?</a></div>
                  <div class="sign_in"><a  data-dismiss="modal" href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a></div>
               </div>
			   </form>
            </div>
         </div>
         <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
			   <form id="signup" data-parsley-validate="">
               <div class="login-block">
                  <h1>Sign Up</h1>
                  <input class="name" id="register_firstname" name="name"  placeholder="Name" data-parsley-required="true"  data-parsley-trigger="change"  
                                data-parsley-minlength="2" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\  \/]+$" >
                  <input type="email" value=""class ="username" placeholder="Email" name="username"  required/>
				  <input class="mobile"  id="signup-username" type="text" name="mob" data-parsley-type="digits" data-parsley-required="true" data-parsley-trigger="change" required required minlength="3"
data-parsley-minlength="3" data-parsley-maxlength="15" placeholder="Mobile">
                  <input type="password" value=""class="password" placeholder="Password" id="dfdfd" name="password" type="password" data-parsley-maxlength="15" data-parsley-minlength="6"required=""/>
                  <input type="password" data-parsley-maxlength="15" data-parsley-minlength="6" data-parsley-equalto="#dfdfd" data-parsley-equalto-message="Password confirmation must match the password." class ="password"  required="" placeholder="Repeat Password" id="password" /><br>
                  <span class="terms_tb">By signing up, you agree to our <a class="cond_tb" href="#">Terms and Conditions.</a></span> <br>
                  <br>
                  
				  <input  type="button" value="Sign up" style="position: relative;" onclick="Signup()">
                  <br>
				   <div class="small_loader" style="text-align:center;display:none"><img src="<?php echo base_url();?>assets/images/loader-small.gif"></div>
				  <div class="signup_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Already have an account?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Sign In</a></div>
               </div>
			   </form>
            </div>
         </div>
	   
	   
	   
	       <div class="modal fade" id="myModalf" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
			    <form id="forgot" data-parsley-validate="">
               <div class="login-block">
                  <h1>Forgot Password</h1>
                  <input type="email" name="email" placeholder="Email" class="username"  data-parsley-required="true"/>
                
               <!--    <span class="terms_tb">By signing up, you agree to our <a class="cond_tb" href="#">Terms and Conditions.</a></span> <br>
                  <br> -->
                 
				  <input  type="button" value="RESET" style="position: relative;" onclick="Forgot()">
                  
                  <br>
				   <div class="small_loader" style="text-align:center;display:none"><img src="<?php echo base_url();?>assets/images/loader-small.gif"></div>
				  <div class="forgot_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a href="#">Already have an account?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Sign In</a></div>
               </div>
			   </form>
            </div>
         </div>
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   

