  <div class="container">
            <div class="row" style="min-height:400px;margin-top:120px;">
      <div class="col-md-2"></div>
       <div class="col-md-8">
         <div class="cancellation_tb">
           <h4 class="ticket_cancel">Ticket cancellation and refund</h4>
           <p class="ticket_des">Follow our simple and hassle-free 2 step process to cancel your ticket. Once your ticket is cancelled, stay <br>constantly informed on the status of your refund. Get going with it right away! </p>
         </div>
         
         
         
           <div class="card"> Enter your details below </div>
  <div class="card">

    
     
     <form id="canceled" data-parsley-validate="">
      <div class="input-container">
        <input type="text" name="booking_id" id="booking_id" required=""/>
        <label for="Ticket Number">Ticket Number</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="email" name="username" id="email" required=""/>
        <label for="Password">email</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
       
       <input  type="button" value="Cancel" style="position: relative;" onclick="get_cancelticket()">
             <div class="small_loader" style="text-align:center;display:none"><img src="<?php echo base_url();?>assets/images/loader-small.gif"></div>
                <div class="login_res" style="text-align:center;"></div>
      </div>
    
     
    </form>
  </div>
         
        </div>
         <div class="col-md-2"></div>
        
            </div>
         </div>