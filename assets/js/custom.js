 $(document).ready(function(){
	 
        $("#paypalss").click();
                    var url=base_url;
                    $("#board_point").autocomplete({
						
					  source:function(request, response) {
   
						$.ajax({  
                        url: base_url+"index.php/Home/get_board_point",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: {term:request.term,type: 'board_point'},  
                        success:      
                        function(data){ 
						
                            if(data.response =="true"){ 
                                board_value=data.message[0].value;							
                                response(data.message);  
                            } 
                        },
                    });
						
						
  },
                        
						select: function(event, ui) {  
                    $("#board_point").append(  
                        "<li class='clickable' role='presentation' data-value='"+ ui.board_point +"' onClick='selectB(this)'><a>"+ ui.board_point + "</a></li>"  
                    );   		
                },
        });
		$('#Destination').autocomplete({
						
					  source:function(request, response) {
   
						$.ajax({  
                        url: base_url+"index.php/Home/get_board_point",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: {term:request.term,type: 'drop_point'},  
                        success:      
                        function(data){ 
						
                            if(data.response =="true"){ 
                                drop_point=data.message[0].value;							
                                response(data.message);  
                            } 
                        },
                    });
						
						
  },
                        
						select: function(event, ui) {  
                   $('#Destination').append(  
                        "<li class='clickable' role='presentation' data-value='"+ ui.drop_point +"' onClick='selectA(this)'><a>"+ ui.drop_point + "</a></li>"  
                    );   		
                },
        });
     
	

 
  $("#switchButton").on('click', function() {
    var pickup = $('#board_point').val();
    $('#board_point').val($('#Destination').val());
    $('#Destination').val(pickup);
  });
  $("#resetBtn").on('click', function() {
  	
    
    $('#Calenderfrom').val('');
    $('#Calenderreturn').val('');
  });
  $('#searchBtn').on('click',function(e){
	  var calender = $('.pickup_datef').val();
	  
	  if ($('#myForm').parsley().validate() ) {
		  if( !calender){
			$('.pickup_datef').datepicker('show');
			e.preventDefault();
			return false;
		}
		    var dateR ='';
	        var froms = $("#board_point").val();
			var to =$("#Destination").val();
			var dateJ =$(".pickup_datef").val();
			if($(".pickup_dater").val()){
				var dateR =$(".pickup_dater").val();
			}else{
				var dateR ="undefined";
			}
			
	

	        window.location.href = base_url+"search/index?from=" + froms + "&to=" + to + "&dateJ=" + dateJ + "&dateR=" + dateR  ;
	    }
   });



   $("#SearchOnline").click();
   
	$('#return').on('click',function(e){
		$('#returnsd').datepicker("show");
         e.preventDefault();
 });
 
 $('#quality li').on('click',function(e){
	 $('#quality li').removeClass('WGradB WGrad');
    $(this).addClass('WGradB WGrad');
		var rate =$(this).data("id");
		//alert(rate);
		$("#qualityb").val(rate);
 });
 $('#behaviour li').on('click',function(e){
	  $('#behaviour li').removeClass('WGradB WGrad');
    $(this).addClass('WGradB WGrad');
		var rate =$(this).data("id");
		//alert(rate);
		$("#behaviourb").val(rate);
 });
 $('#punctuality li').on('click',function(e){
	  $('#punctuality li').removeClass('WGradB WGrad');
    $(this).addClass('WGradB WGrad');
		var rate =$(this).data("id");
		//alert(rate);
		$("#punctualityb").val(rate);
 });
 
 
 
 
 });
  function  selectB(elm){
	  var value=$(elm).data("value");
	  $('#board_point').val(value);
	  //var field=$(elm).data("title");
  } function  selectA(elm){
	  var value=$(elm).data("value");
	  $('#Destination').val(value);
	  //var field=$(elm).data("title");
  }
  function  ratings(){

	   
	  var data=$('#ratings').serializeArray();
	  var quality = $("#qualityb").val();
	  var punctuality = $("#punctualityb").val();
	  var behaviour = $("#behaviourb").val();
	  if(!quality){
		  $('#quality').addClass("RFBorder");
		  $('.quality').show();
		 
		  return false;
	  }
	  if(!punctuality){
		  $('#punctuality').addClass("RFBorder");
		  $('.punctuality').show();
		  return false;
	  }
	  if(!behaviour){
		  $('#behaviour').addClass("RFBorder");
		   $('.behaviour').show();
		  return false;
	  }
	  var url=base_url+"myaccount/rating_update";
	   var result = post_ajax(url,data);
	   var details = JSON.parse(result);
	  
	   if(details.status =='failed'){
				$('.rating-res').html("<p class='error '>"+ details.message +"</p>");
				setTimeout(function(){$('.rating-res').hide(); }, 1500);
				
			}else{
				$('.rating-res').html("<p class='success '>"+ details.message +"</p>");
				setTimeout(function(){$('.rating-res').hide();}, 1500);
				setTimeout(function(){ window.location.href = base_url+"myaccount/index";}, 1500);
               
			}
			
				
	   
  }
   function select_bus(){
	    if ($('#myForms').parsley().validate() ) {
			// var dateRs ='undefined';
	    var fromss = $("#board_point").val();
		var tos =$("#Destination").val();
		
		var dateJs =$(".pickup_datef").val();
		 if($(".pickup_dater").val()){
				var dateRs =$(".pickup_dater").val();
			}else{
				var dateRs ='undefined';
			}
		// alert(fromss);
	    window.location.href = base_url+"search/index?from=" + fromss + "&to=" + tos + "&dateJ=" + dateJs + "&dateR=" + dateRs  ;
		
		}
   }
   //Login//
   function PaymentSucess(){
	   var OBookid = $("#OBookid").val(); 
	   var RBookid = $("#RBookid").val(); 
	  
	   var payment_status = $("#payment_status").val();
	   var data = {'OBookid':OBookid,'RBookid':RBookid,'payment_status':payment_status};
	   var url=base_url+"payment/payment_sucess";
	   var result = post_ajax(url,data);
   }	   
   function Login(){
	    if ($('#login').parsley().validate() ) {
			$('.small_loader').show();
			var data=$('#login').serializeArray();
			var url=base_url+"Login/index";
			var result = post_ajax(url,data);
			var details = JSON.parse(result);
			$('.small_loader').hide();
			$('.login_res').show();
			if(details[0].status =='failed'){
				$('.login_res').html("<p class='error '>"+ details[0].message +"</p>");
				setTimeout(function(){$('.login_res').hide(); }, 1500);
				
			}else{
				$('.login_res').html("<p class='success '>"+ details[0].message +"</p>");
				setTimeout(function(){$('.login_res').hide(),$('#login')[0].reset(); }, 1500);
				location.reload(); 
			}
			
		}
	   
   }
    function Signup(){
		 if ($('#signup').parsley().validate() ) {
			 $('.small_loader').show();
			var data=$('#signup').serializeArray();
			var url=base_url+"Login/signup";
			var result = post_ajax(url,data);
			var details = JSON.parse(result);
			$('.small_loader').hide();
			$('.signup_res').show();
			if(details.status =='failed'){
				$('.signup_res').html("<p class='error '>"+ details.message +"</p>");
				setTimeout(function(){$('.signup_res').hide(); }, 1500);
				
			}else{
				$('.signup_res').html("<p class='success '>"+ details.message +"</p>");
				setTimeout(function(){$('.signup_res').hide(),$('#signup')[0].reset(); }, 1500);
				location.reload(); 
			}
			
		}
	} 
	
	function Forgot(){
		 if ($('#forgot').parsley().validate() ) {
			 $('.small_loader').show();
			var data=$('#forgot').serializeArray();
			var url=base_url+"Login/forgot_password";
			var result = post_ajax(url,data);
			var details = JSON.parse(result);
			$('.small_loader').hide();
			$('.forgot_res').show();
			if(details.status =='failed'){
				$('.forgot_res').html("<p class='error '>"+ details.message +"</p>");
				setTimeout(function(){$('.forgot_res').hide(); }, 1500);
				
			}else{
				$('.forgot_res').html("<p class='success '>"+ details.message +"</p>");
				setTimeout(function(){$('.forgot_res').hide(),$('#forgot')[0].reset(); }, 1500);
				//location.reload(); 
			}
			
		}
	}
	function Resetpass(){
		if ($('#reset-pass').parsley().validate() ) {
		$('.small_loader').show();
		
		var data =$('#reset-pass').serializeArray();
		var url=base_url+"login/reset_password";
			var result = post_ajax(url,data);
			var details = JSON.parse(result);
		
				
           $('.small_loader').hide();
		   $('.reset_res').show();
			if(details.status =='failed'){
				$('.reset_res').html("<p class='error '>"+ details.message +"</p>");
				setTimeout(function(){$('.reset_res').hide(); }, 1500);
				
			}else{
				$('.reset_res').html("<p class='success '>"+ details.message +"</p>");
				setTimeout(function(){$('.reset_res').hide(),$('#reset-pass')[0].reset(); }, 1500);
				 setTimeout(function(){window.location.href = base_url+"Home/index"; }, 1500);
				//location.reload(); 
			}
		
	
		
	}
	}
  //Login//
  function Mprint(id){
	  var id =$(id).data("id");
	 var newwindow = window.open(base_url+'payment/new_window/'+id, '', 'height=800,width=800,scrollbars=yes');
					if (window.focus) {
						newwindow.focus();
					}
  }
  function Memail(id){
	  $(".loader").show();
	  var id =$(id).data("id");
	  var data ={'id':id,'type':'email'};
			    var url=base_url+"payment/email_notification";
				var result = post_ajax(url,data);
				var details = JSON.parse(result);
				$(".loader").hide();
				if(details.status =='success'){
					alert("Details has been send your mail");
				}else{
					alert("email");
				}
  }
  
   function Printticket(){
	   
	    if ($('#bookForm').parsley().validate() ) {
			$(".loader").show();
		  var radioValue = $("input[name='id']:checked").val();
		  var id = $("#TID").val();
		      
			    var data ={'id':id,'type':radioValue};
			    var url=base_url+"payment/email_notification";
				var result = post_ajax(url,data);
				
				  
				$(".loader").hide();
				var details = JSON.parse(result);
				
				if(details.status =='success'){
					if(radioValue!='email'){
					var newwindow = window.open(base_url+'payment/new_window/'+id, '', 'height=800,width=800,scrollbars=yes');
					if (window.focus) {
						newwindow.focus();
					}	
					}else{
						$(".result").html('<p class="success ">Details has been send your mail.</p>');
				     setTimeout(function(){$('.result').hide(); }, 1500);
			        }
					
				}else{
					$(".result").html('<p class="error ">You have either typed a wrong ticket no# or the ticket is invalid.Please get in touch with our customer support team at LIVE HELP.</p>');
					setTimeout(function(){$('.result').hide(); }, 1500);
				}
				
		    
			
	    }
   }
  function userDetails(){
	 
	   if ($('#userForm').parsley().validate() ) {
		   $(".loader").show();
			var data =$('#userForm').serializeArray();
		    var url=base_url+"payment/userDetails";
			var result = post_ajax(url,data);
			
			var details = JSON.parse(result);

			if(details.status =='success'){
            
				
				
				$(".item_name_s").val(details.Bookingido);
				$(".item_names").val(details.uneaqueid);
				$("#ORDER_ID").val(details.uneaqueid);
				
				
				if(details.BookingidR !='null'){
					var url ="?ido="+details.Bookingido+"&idR="+details.BookingidR;
				}else{
					var url="?ido="+details.Bookingido+"&idR=";
				}

				payment_new = $("input:radio[name=paypal]:checked").val();
				if(payment_new == 'paypal')
				{  /* $(".tab-content").show;*/
					successurl =base_url+"payment/result"+url;
				$(".sucess_url").val(successurl);
				payment = $("#pament_option").val();
				
				if(payment =='paypal'){
					 $("#paypals").submit(); 
				}else if(payment =='paytm'){
					$("#paytmm").submit(); 
				}

				}
				if(payment_new == 'cash')
				{
					
			
			   window.location.href = base_url+"payment/result_cash/"+details.uneaqueid;
               
				}
				
				 	 
			}else{
				$(".loader").hide();
				$('#myModalp').modal('show');
				
			}
		 } 
  }function Selectedseat(elm){

	  var existB =$( elm ).hasClass('sseater'); 
	  var existB2 =$( elm ).hasClass('sseater');
	
	  if(existB !=true || existB2 !=true){

	  seat = $(elm).data("seat");
	/*  alert(seat);*/
	  bus = $(elm).data("bus");
	  amount = $(elm).data("rate");
	  classs =$(elm).data("class");
	  
	  //alert($( elm ).hasClass( classs ));
	  if($( elm ).hasClass( classs )){

		 $(elm).removeClass(classs); 
		 if(classs=='seater'){
			 $(elm).addClass('selectedseat'); 
			  $(elm).addClass('selecteds'); 
		 }else{
			 $(elm).addClass('selectedsleeper'); 
			 $(elm).addClass('selecteds'); 
		 }
		
	  }else{
		  $(elm).removeClass('selectedseat');
		  $(elm).removeClass('selecteds');
		  
		  $(elm).removeClass('selectedsleeper'); 
		 $(elm).addClass(classs);
	  }
	   var texts= $("#bus"+bus+" .selecteds").map(function() {
             return $(this).data("seat");
        }).get();

      if(texts.length >6){
         alert("A maximum of 6 Seats can be selected");
           $(elm).removeClass('selectedseat');
		  $(elm).removeClass('selecteds');
		   $(elm).removeClass('selectedsleeper'); 
		   $(elm).addClass(classs);

        }

      var texts= $("#bus"+bus+" .selecteds").map(function() {
             return $(this).data("seat");
         }).get();
	  $("#bus"+bus+ " .seat_no").text(texts); 
	  $("#bus"+bus+ " .seat_nos").val(texts);
	  $("#bus"+bus+ " .rate_bus").text(amount);
	  $("#bus"+bus+ " .total_rate").text(amount*texts.length);
	  console.log(("#bus"+bus+ " .seat_no"));
	  }
  }
   function paypal(){
   

   //	userDetails();
	   
	   $("#Customerdetails").click();
   }
   function post_ajax(url, data) {
	var result = '';
	$.ajax({
        type: "POST",
        url: url,
		data: data,
		success: function(response) {
			result = response;
		},
		error: function(response) {
			result = 'error';
		},
		async: false
		});
		
		return result;
}
///*************************CANCELLATION**************************////
   
  function get_cancelticket(){
	
	    if ($('#canceled').parsley().validate() ) {
			  $(".loader").show();
			//$('.small_loader').show();
			var data=$('#canceled').serialize();
			//alert(data);
			var tckt_id=$('#booking_id').val();
			//alert(tckt_id);
			var url=base_url+"Cancellation/cancelation_ticket";
			var result = post_ajax(url,data);
			var details = JSON.parse(result);
			console.log(details);
			//$('.small_loader').hide();
			$('.login_res').show();
			if(details.status =='success'){
				 $('.login_res').html("<p class='success '>"+ details.message +"</p>");
				setTimeout(function(){$('.login_res').hide(); }, 1500);
				location.reload();
				
			}else{		
			   
				 $('.login_res').html("<p class='error '>"+ details.message +"</p>");
			 	 setTimeout(function(){$('.login_res').hide(); }, 1500); 
				//$(".loader").hide();
				//window.location.href = base_url+"Cancellation/Ticket_details/"+tckt_id;
			}
			
		}
} 
   
///*************************CANCELLATION**************************////   
   

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});