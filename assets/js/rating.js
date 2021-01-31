App.controller('rating', function ($scope,$http,$timeout,WebService,$filter) {
		function GetURLParameter(sParam) {
				var sPageURL = decodeURIComponent(window.location.search.substring(1)),
					sURLVariables = sPageURL.split('&'),
					sParameterName,
					i;

				for (i = 0; i < sURLVariables.length; i++) {
					sParameterName = sURLVariables[i].split('=');

					if (sParameterName[0] === sParam) {
						return sParameterName[1] === undefined ? true : sParameterName[1];
					}
				}
	   };
	   $scope.bookDetails = function(){
		   $(".loader").show();
		 var order_id = GetURLParameter('oid');
		 var bus_id = GetURLParameter('idb'); 
		 var user_id = GetURLParameter('du');
		
           post_data  ={'order_id':order_id};
		    link="myaccount/deatils_book";
		
	
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){  
			    $scope.detailsbook = response;
				$scope.bus_id = bus_id;
				$scope.user_id = user_id;
				$(".loader").hide();
			});
	  };
	});