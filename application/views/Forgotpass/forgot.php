  <div class="container">
            <div class="row" style="min-height:400px;margin-top:120px;">
    <div class="col-md-6">
				
									<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Reset Password</h2>

  <form class="login-container" id="reset-pass" data-parsley-validate="">
    <p><input type="email" placeholder="Email"  data-parsley-trigger="keyup" required="" name="email"></p>
    <p><input type="password" placeholder="Password" id="ghghgh" name="password" type="password"  data-parsley-minlength="6"required="" data-parsley-trigger="keyup"></p>
	  
	    <p><input type="password" placeholder="Confirm Password" data-parsley-minlength="6"  data-parsley-equalto="#ghghgh" data-parsley-equalto-message="Password confirmation must match the password." required="" class="ac-rest-text" placeholder="Confirm New Password" data-parsley-trigger="keyup"></p>
    <p><input type="button" value="Reset"  onclick="Resetpass();"></p>
	<input type="hidden" name="key" value="<?php echo ($_GET['id']);?>">
	<p class="reset_res" style="text-align:center;"> </p>
  </form>
</div> 
		
</div>
				 <div class="col-md-6">
					 
			  <div class="tb_bus">
                     <img src="<?php echo base_url();?>assets/images/bus.png">
                  </div>
					 
					 
					 
				</div>
				
            </div>
         </div>