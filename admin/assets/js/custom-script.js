


$( "form.validate" ).submit(function( event ) {

	var access = true;
	$(this).find('.required').each(function() {
		var v = $(this).val();
		if((v.replace(/\s+/g, '')) == '') {
			access = false;
			$(this).parents(".form-group").addClass("has-error");
		}
		else {
			$(this).parents(".form-group").removeClass("has-error");
		}
	});
	if(access) {
		return;
	}
	else {
		$("body").animate({ scrollTop: $('.has-error').offset().top - 50 }, "slow");
	}
	event.preventDefault();
	
});

// View Shop Details
$(function() {
	
$('.view-shop').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'shop/view_single_shop';
	var result = post_ajax(url, data);
	if(result != 'error') {
	$('#myModal .modal-body').html(result);
	remove_shop_service();
	}
});

$('.view-review').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'review/view_shop_review';
	var result = post_ajax(url, data);
	if(result != 'error') {
	$('#myModal .modal-body').html(result);
	rating();
	
	}
});

$('.thumbnails').on('click', '.gallery-delete', function (e) {
    e.preventDefault();
    //get image id
    var id = $(this).parents('.thumbnail').data("id");
	var data = {id:id};
	var url = config_url+'gallery_details/delete_gallery_image';
	var result = post_ajax(url, data);
	if(result != 'error') {
		$(this).parents('.thumbnail').fadeOut();
	}
    });
	
/*$('.thumbnails').on('click', '.gallery-delete', function (e) {
    e.preventDefault();
    //get image id
    var id = $(this).parents('.thumbnail').data("id");
	var data = {id:id};
	var url = config_url+'shop/delete_gallery_image';
	var result = post_ajax(url, data);
	if(result != 'error') {
		$(this).parents('.thumbnail').fadeOut();
	}
    });	*/
	

	
    
 $('.view-customer').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'customer/view_single_customer';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	
	reload_gallery();
	
});

$('.view-bookings').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'booking/view_booking_details';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	
	
});
	


 $('.view-user').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'user/view_single_user';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
	
});

 $('.view-trend').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'trend/view_single_trend';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-slider').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'settings/view_single_slider';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-whats-new').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'settings/view_whats_new';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-ad').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'ad/view_single_ad';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-offers').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'offers/view_single_offers';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});

$('.view-testimonials').on("click", function() {
	var loader = '<p class="text-center"><img src="'+config_url+'/assets/images/ajax-loader-4.gif" /></p>';
	$('#myModal .modal-body').html(loader);
	$('#myModal').modal({show:true});
	var id = $(this).data('id');
	var data = {id:id};
	var url = config_url+'testimonials/view_single_testimonials';
	var result = post_ajax(url, data);
	$('#myModal .modal-body').html(result);
	reload_gallery();
});
	
});


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

function reload_gallery() {
	
	$('.thumbnail a').colorbox({
        rel: 'thumbnail a',
        transition: "elastic",
        maxWidth: "95%",
        maxHeight: "95%",
        slideshow: true
    });
	
}

function remove_shop_service() {
	$('.remove_services').on("click", function() {
		var id = $(this).data("id");
		var data = {id:id};
		var url = config_url+'shop/remove_shop_service';
		var result = post_ajax(url, data);
		if(result != 'Error') {
			$(this).parents('.row').first().remove();
		}
	});
	
}

//////ADMIN IMG UPLOADING/////

$('#profile_pic').on("change", function() {
	readURL(this);
});


$('#profileimg-form').change(function() {
	$('form#profilepic-form-img').submit();
});

	