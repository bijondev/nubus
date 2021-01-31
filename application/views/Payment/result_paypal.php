<?php
//var_dump($_POST); 
if($_POST){
?>
<div >
<form >
<input type="hidden" id='item' value='<?php echo $_POST['item_number'];?>'>
<input type="hidden" id="payment_status" value='<?php echo $_POST['payment_status'];?>'>
<input type="hidden" id="OBookid" value='<?php echo $_GET['ido'];?>'><input type="hidden" id="RBookid" value='<?php echo $_GET['idR'];?>'>
<input type="button" id="paypalss" onClick="PaymentSucess()" >
</form>
</div>
<?php
}
?>
	<!-- SUCCESS -->
	<div class="success-body">
		<div class="container">
		<div class="success-outter">
			<div class="success-wrapper">
				
				<div class="success-inner">
				<div class="success-row">
					<div class="row">
					
						<div class="col-md-8">
						<div class="success-col">
						<div class="row">
						<div class="col-md-2">
						
						</div>
						<div class="col-md-10">
							<div class="success-tick">
						<img src="<?php echo base_url();?>assets/images/suces_tick.png">
						</div>
						<div class="success-details">
						<h2>Payment Successful</h2>
						<p>Your Booking ID is :</p>
						<b style="font-weight:600;width:50%;font-family: 'Raleway', sans-serif;text-align:right;padding-left:15px;"><?php if($_POST){ echo $_POST['item_number'];}?></b>
						</p>
						</div>
						</div>
						</div>
						</div>
						</div>
						<div class="col-md-4">
						<div class="success-col">
						<img src="<?php echo base_url();?>assets/images/redbus.png">
						</div>
						</div>
						</div>
					</div>
			
					<div class="success-row bg">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-1"></div>
								<div class="col-md-3 padding0">
									<div class="success-detail1">
										
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="success-detail2">
										
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-1"></div>
								<div class="col-md-3 padding0">
									<div class="success-detail1">
										
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="success-detail2">
										
									</div>
								</div>
							</div>
							<div class="col-md-4"></div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-1"></div>
								<div class="col-md-3 padding0">
									<div class="success-detail1">
										Amount
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="success-detail2">
										$<?php if($_POST){echo $_POST['payment_gross'];}?>
									</div>
								</div>
							</div>
							<div class="col-md-4"></div>
						</div>
					
				
					
					<div class="success-row">
						<div class="col-md-1"></div>
						<div class="col-md-11">
					<h5>Go to back to <a href="<?php echo base_url();?>">Home</a> or<a href="<?php echo base_url();?>myaccount"> My Account</a></h5></div>
					</div>
					<div class="success-row">
					<h6>*Terms and Conditions Applicable</h6>
					</div>
					
					</div>
				
				
				</div>
			</div>
		</div>
	</div>
	   </div>