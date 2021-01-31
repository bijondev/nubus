$(document).ready(function(){
	 user_profile();
    });
function fileUpload(){
	
		if ($('#myForm').parsley().validate() ) {
			
			 $('#myForm').ajaxForm(function(options) { 
			 
			 var details = JSON.parse(options);
			
			 $('.reset_res').show();
			if(details.status =='failed'){
				$('.reset_res').html("<p class='error '>"+ details.message +"</p>");
				setTimeout(function(){$('.reset_res').hide(); }, 1500);
				
			}else{
				$('.reset_res').html("<p class='success '>"+ details.message +"</p>");
				setTimeout(function(){$('.reset_res').hide(); }, 1500);
				//location.reload(); 
				user_profile();
			}
						}); 
		 }
	}
	function Edits(){
		$('#edit-hide').hide();
		$('#edit-show').removeClass('hide');
		user_profile();
		
	}
	function Edits_show(){
		$('#edit-hide').show();
		$('#edit-show').addClass('hide');
		user_profile();
		
	}
	
	function user_profile(){
		var data ='';
		var url=base_url+"myaccount/user_details";
		var result = post_ajax(url,data);
		var details = JSON.parse(result);
		$('.name ').val(details[0].name);
		if(details[0].name){
		$('.name ').html(details[0].name);
		}
			$('.mobiles ').val(details[0].mob);
		$('.mobile ').html(details[0].mob);
		if(details[0].dob){
			
		$('.dob ').html(details[0].dob);
		}
		var str=details[0].dob;
		var res=str.split("/",3);
			
		$('.year ').html(res[2]);
		if(res[0]==1)
		{
		$('.month ').html('January');	
		}
		else if(res[0]==2)
		{
		$('.month ').html('February');	
		}
		else if(res[0]==3)
		{
		$('.month ').html('March');	
		}
		else if(res[0]==4)
		{
		$('.month ').html('April');	
		}
		else if(res[0]==5)
		{
		$('.month ').html('May');	
		}
		else if(res[0]==6)
		{
		$('.month ').html('June');	
		}
		else if(res[0]==7)
		{
		$('.month ').html('July');	
		}
		else if(res[0]==8)
		{
		$('.month ').html('August');	
		}
		else if(res[0]==9)
		{
		$('.month ').html('September');	
		}
		else if(res[0]==10)
		{
		$('.month ').html('October');	
		}
		else if(res[0]==11)
		{
		$('.month ').html('November');	
		}
		else if(res[0]==12)
		{
		$('.month ').html('December');	
		}
		$('.day ').html(res[1]);
		$('.dob ').val(details[0].dob);
		$("input[name=gender][value='"+details[0].gender+"']").prop("checked",true);
		$('.email ').val(details[0].username);
		$('.email ').html(details[0].username);
		
		if(details[0].image){
			var src1=base_url+details[0].image;
		$('.image ').attr("src", src1);
		}
		/*location.reload(); */
		
		
	}
	function changePass(){
	if ($('#change-pass').parsley().validate() ) {
		
		
		
		
		
		var data =$('#change-pass').serializeArray();
      //alert(form);
		var url=base_url+"myaccount/change_password";
		var result = post_ajax(url,data);
		var details = JSON.parse(result);

	   $('.reset_pass').show();
		if(details.status =='failed'){
			$('.reset_pass').html("<p class='error '>"+ details.message +"</p>");
			setTimeout(function(){$('.reset_pass').hide(); }, 1500);
			
		}else{
			$('.reset_pass').html("<p class='success '>"+ details.message +"</p>");
			setTimeout(function(){$('.reset_pass').hide(); }, 1500);
			//location.reload(); 
		}
		
	
	}
	}