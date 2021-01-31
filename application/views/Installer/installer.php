<html>
<head>
  <title>TRUE BUS Installer</title>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/installer.css" rel="stylesheet" type="text/css"><link href="<?php echo base_url();?>assets/css/parsley.css" rel="stylesheet" type="text/css">

<title></title>
</head>
<body>
 
<h1 style="margin-top:150px" align="center"> </h1>
<!-- multistep form -->
<form id="msform">
<!-- progressbar -->
<ul id="progressbar">
<li class="active">Database Setup</li>
<li>Email Setup</li>
<li>Personal Details</li>
</ul>
<!-- fieldsets -->
<fieldset>
<h2 class="fs-title">Create your Database</h2>
<h3 class="fs-subtitle">This is step 1</h3>

<input type="text" name="dbname" class="db" placeholder="database" required/>
<input type="text" name="dbhost" placeholder="hostname" required/>
<input type="text" name="dbuser" placeholder="db username" required/>
<input type="password" name="dbpass" placeholder="db password" />
<input type="button" id="database"  class="action-button" value="Next" Onclick="databases()"/>

<input type="button" name="next" class="next action-button database" value="Next" style="display:none"/>
<div class="resdb"></div>
</fieldset>

<fieldset>

<h2 class="fs-title">Smtp setup</h2>

<h3 class="fs-subtitle">Smtp setup</h3>
<div class="req"></div>
<input type="button" name="previous" class="previous action-button" value="Previous" data-id="req"/>
<input type="button" id="smtp" class="action-button" value="Next" />

<input type="button" name="next" class="next action-button smtp" value="Next" style="display:none"/>

</fieldset>
<fieldset>
<h2 class="fs-title">Confirm Details</h2>
<h3 class="fs-subtitle">Confirm Details</h3>

 
<div class="pers">
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" data-id="pers"/>
<input type="button" name="submit" class="submit submits action-button" value="Submit" />
</fieldset>
</form>

<!-- jQuery --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- jQuery easing plugin --> 
<script src="<?php echo base_url();?>assets/js/parsley.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.easing.min.js" type="text/javascript"></script> 

<script>
$(function() {
	
	 $('.loader').hide();

$("#smtp").click(function(){
	
	if ($('#msform').parsley().validate() ) {
		 $('.loader').show();
	var value =$("#msform").serialize() ;
$.ajax({
url:'<?php echo base_url();?>installer/smtp_setup',
type:'post',
data:value,
success:function(res){
	    $('.loader').hide();
		
		var details = JSON.parse(res);
		//alert(details.status);
		if(details.status=='success'){
			db= $(".db").val();
			smtpuser= $(".user").val();
			smtppas= $(".pass").val();
			smtphos= $(".host").val();
			$(".smtp").click();
			$(".pers").html('<div class="installer"><div class="installer1">Database :</div><div class="installer3">'+db+'</div></div><div class="installer"><div class="installer1">Smtp Username :</div><div class="installer3">'+smtpuser+'</div></div><div class="installer"><div class="installer1">Smtp Password :</div><div class="installer3">'+smtppas+'</div></div><div class="installer"><div class="installer1">Smtp Host :</div><div class="installer3">'+smtphos+'</div></div>');
	         // window.location.href ='home/first_show';
		}
		


    }
     });
	}
});
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
var data = $(this).data('id');
$('.'+data).html('');
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submits").click(function(){
	window.location.href ='home/first_show';
})

});
function databases(){
	 
	if ($('#msform').parsley().validate() ) {
		$('.loader').show();
	var value =$("#msform").serialize() ;
	
	$.ajax({
url:'<?php echo base_url();?>installer/dbconnect',
type:'post',
data:value,
success:function(res){
	    $('.loader').hide();
		
		var details = JSON.parse(res);
		//alert(details.status);
		if(details.status=='success'){
			//alert("Fg");
			$(".database").click();
	         $(".req").html('<input type="text" name="smtp_username" class="user" placeholder="Smtp Username" required/><input type="text" name="smtp_host" class="host" placeholder="Smtp Host"  required/><input type="text" name="smtp_password"   placeholder="Smtp Password" class="pass" required />');
		}else{
			$('.resdb').html('Please Enter Correct Details');
		}
		


    }
     });
	}
}
</script>
 <div class="loader" style="text-align: center;"></div>
</body>
</html>