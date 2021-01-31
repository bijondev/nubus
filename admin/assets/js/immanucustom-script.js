$(function(){
$('.show-busgetdetails').on("click", function(){
	var getbusdetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-busModal .modal-busbody').html(loader);
    $('#popup-busModal').modal({show:true});
	$.ajax({		
				type: "POST",
				url: base_url+'Bus_details/busdetails_view',            
				data: {'getbusdetails':getbusdetails},
				cache: false,
				success: function(result)
				
				{
					
					$('#popup-busModal .modal-busbody').html(result);
					
				}
	});
})

$('.show-promo').on("click", function(){
	var getpromo = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-promoModal .modal-promobody').html(loader);
    $('#popup-promoModal').modal({show:true});
	$.ajax({		
				type: "POST",
				url: base_url+'promo_details/promodetails_view',            
				data: {'getpromo':getpromo},
				cache: false,
				success: function(result)
				
				{
					
					$('#popup-promoModal .modal-promobody').html(result);
					
				}
	});
})

//Rating details view popup
$('.show-ratinggetdetails').on("click", function(){
	var getratingdetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-ratingModal .modal-ratingbody').html(loader);
    $('#popup-ratingModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Rating_details/ratingdetails_view',
                
				data: {'getratingdetails':getratingdetails},
				cache: false,
				success: function(result)
				{
					$('#popup-ratingModal .modal-ratingbody').html(result);
				}
	});
})

//Route details view popup
$('.show-routegetdetails').on("click", function(){
	var routedetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-routegetModal .modal-routebody').html(loader);
    $('#popup-routegetModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Route_details/view_routepop',
                
				data: {'routedetails':routedetails},
				cache: false,
				success: function(result)
				{
					$('#popup-routegetModal .modal-routebody').html(result);
				}
	});
})
//BoardPoint details view popup
$('.show-boardgetdetails').on("click", function(){
	var boarddetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-boardpointModal .modal-boardbody').html(loader);
    $('#popup-boardpointModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Borderpoint_details/view_boardpopup',
                
				data: {'boarddetails':boarddetails},
				cache: false,
				success: function(result)
				{
					$('#popup-boardpointModal .modal-boardbody').html(result);
				}
	});
})

//Booking details view popup
$('.show-bookinggetdetails').on("click", function(){
	var bookingdetailsget = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-bookingpointModal .modal-bookingbody').html(loader);
    $('#popup-bookingpointModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Booking_details/view_bookingpopup',
                
				data: {'bookingdetailsget':bookingdetailsget},
				cache: false,
				success: function(result)
				{
					$('#popup-bookingpointModal .modal-bookingbody').html(result);
				}
	});
})

//DropPoint details view popup
$('.show-dropgetdetails').on("click", function(){
	var dropdetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-dropgetModal .modal-dropbody').html(loader);
    $('#popup-dropgetModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Droppoint_details/view_dropdpopup',
                
				data: {'dropdetails':dropdetails},
				cache: false,
				success: function(result)
				{
					$('#popup-dropgetModal .modal-dropbody').html(result);
				}
	});
})

//Agent details view popup
$('.show-agentgetdetails').on("click", function(){
	var agentdetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-agentgetModal .modal-agentbody').html(loader);
    $('#popup-agentgetModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Agent_details/view_agentpopup',
                
				data: {'agentdetails':agentdetails},
				cache: false,
				success: function(result)
				{
					$('#popup-agentgetModal .modal-agentbody').html(result);
				}
	});
})

//Cancellation details view popup
$('.show-cancellationgetdetails').on("click", function(){
	var canceldetails = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets/images/ajax-loader-4.gif" /></p>';
    $('#popup-cancelgetModal .modal-cancelbody').html(loader);
    $('#popup-cancelgetModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Cancellation_details/view_cancelpopup',
                
				data: {'canceldetails':canceldetails},
				cache: false,
				success: function(result)
				{
					$('#popup-cancelgetModal .modal-cancelbody').html(result);
				}
	});
})


//Map Details

$('#pick-map').click(function (e) {
        e.preventDefault();
        $('#myModalmap').modal('show');
    });	
$('#myModalmap').on('shown.bs.modal', function () {
	load_map();
	//google.maps.event.trigger(map, 'resize')
});


$('.select-location').click(function (e) {
	$('#latitude').val($('#pick-lat').val());
	$('#longitude').val($('#pick-lng').val());
	$('#myModalmap').modal('hide');
});



//Board Point Add and Edit Select box values get

 $("#bus_details").change(function()
  {  
	var id=$(this).val();
    var dataString =id;
	$.ajax({
			 type: "POST",
			 url:base_url+'Borderpoint_details/add_boardpointdetailsget',
			 data: {value:dataString},
			 cache: false,
		 	 success: function(data){

             $(".subcat").html(data);
			  $(".subcat").select2();
			 
	   }
	 });
   });
   
   
   
 $("#dropbus_details ").change(function()
  {  
	var id=$(this).val();
    var dataString =id;
	$.ajax({
			 type: "POST",
			 url:base_url+'Droppoint_details/add_droppointdetailsget',
			 data: {value:dataString},
			 cache: false,
		 	 success: function(data){

             $(".subcats").html(data);
			  $(".subcats").select2();
			 
	   }
	 });
   });
  
   
 /*  $("#bus_ids").change(function()
    {   
	    var id=$(this).val();
        var dataString =id;
	    $.ajax({
			 type: "POST",
			 url:base_url+'/Borderpoint_details/Edit_boardpointdetailsget',
			 data: {value:dataString},
			 cache: false,
		 	 success: function(data){

             $(".subcats").html(data);
			 
	   }
	 });
   });*/
   
   
   

});

// Select Box 				   
$(document).ready(function() {			
				 
$(".js-example-basic-multiple").select2();   
				   
});


function load_map() {
	
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
						zoom: 7,
						center: new google.maps.LatLng(35.137879, -82.836914),
						mapTypeId: google.maps.MapTypeId.HYBRID
					});
					
	var myMarker = new google.maps.Marker({
		position: new google.maps.LatLng(9.369, 76.803),
		draggable: true
	});
	
    var latitude = document.getElementById('pick-lat');
	var longitude = document.getElementById('pick-lng');
	
	google.maps.event.addListener(myMarker, 'dragend', function (evt) {
		document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
		latitude.value = evt.latLng.lat().toFixed(3);
		longitude.value = evt.latLng.lng().toFixed(3);
	});
	
	google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
		document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
	});
	
	map.setCenter(myMarker.position);
	myMarker.setMap(map);
}

////RATING VALUES GET
function rating() {
	
$('.raty').each(function() {
    var rate = $(this).data("rate");
   $(this).raty({
        readOnly: true,
       score: rate //default stars
   });
    });
}


  


