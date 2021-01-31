   <div class="container">
  
  <div class="row" style="min-height:250px;margin-top:136px;">
      
			 
			<div class="col-md-2">
				<div class="sms_ticket">
				<h4>Print/SMS Ticket</h4>
					</div>
				</div>
				<div class="col-md-8">
				<form id="bookForm">
					<div class="ticket_type">
					Ticket Number &nbsp;<input class="ticket no" type="text" id="TID" required><br>
						<div class="radio_type">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
								<div class="radio_ticket">
						
							
							<input type="radio" name="id"  value="email" id="email" required> &nbsp;Get Ticket by Email<br>
							<input type="radio" name="id" value="print"  id="print"> &nbsp;Print ticket<br>
									
									   <button class="RB Xbutton left" onClick="Printticket()">Submit</button>
									</div>
									
									 
									<div class="col-md-4 "></div>
</div>

							</div>
						</div>
				</div>
				<div class="result"></div>
				<div class="col-md-2"></div>
				</form>
            </div>
         </div>
		 <div class="loader" style="text-align: center; display: none;"></div>