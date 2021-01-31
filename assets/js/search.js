var App = angular.module('myFrontend',  ['angularUtils.directives.dirPagination']);

App.filter('selectedTags', function() {
    return function(getbusdetails, tags) {
        return getbusdetails.filter(function(task) {
            if(tags !=''){
            for (var i in task.singleP) {
                if (tags.indexOf(task.singleP[i]) != -1) {
                    return true;
                }
            }
            return false;
			}else{
				return getbusdetails;
			}

        });
		return true;
		
    };
});
App.filter('selectedTags1', function() {


    return function(taskss, amt) {
    	
    /*	console.log(amt);*/
    	
        return taskss.filter(function(tasks) {
            if(amt !=''){
            	/*alert(tasks.amenities);*/
            for (var i in tasks.amenities) {
                if (amt.indexOf(tasks.amenities[i]) != -1) {
                	
                    return true;
                }
            }
            return false;
            }else{
				return taskss;
			}
        });
    };
});
App.filter('selecteddrop', function() {
    return function(tasksdrop, drop) {
        return tasksdrop.filter(function(tasks) {
            if(drop !=''){
            for (var i in tasks.singleD) {
                if (drop.indexOf(tasks.singleD[i]) != -1) {
                    return true;
                }
            }
            return false;
            }else{
				return tasksdrop;
			}
        });
    };
});
App.directive("raty", function() {
    return {
        restrict: 'AE',
        link: function(scope, elem, attrs) {
			scope.$evalAsync(function(){
				
				$(elem).raty({  half: true,start: attrs.score, number: attrs.number,starOff   : base_url+'assets/images/Star3s.png',
		        starOn    : base_url+'assets/images/Star2s.png',readOnly:  true});
			  });
            
        }
    }
});
 App.controller('search', function ($scope,$rootScope,$http,$timeout,WebService,$filter) {
 	
	$(".loader").show();

	$scope.cash_new = false;
	$scope.pay = false;
	
	$scope.active="false";
	 $scope.click_service= function(item,index)
  {
	  console.log(item);
	$scope.deatails = index;
	var index = $scope.deatails.indexOf(item);
	 if($scope.deatails[index].active == true){
		 
		 $scope.deatails[index].active =false;
	 }else{
		 $scope.deatails[index].active =true;
	 } 
	 console.log($scope.deatails[index].active);
  };
  
   
  $scope.selectSeat = function(item,index){
	  // alert(index);
	   $scope.deatails = item;
	   var indexs = $scope.deatails.indexOf(index);
	    if($scope.deatails[index].active == true){
		 
		 $scope.deatails[index].active =false;
	 }else{
		 $scope.deatails[index].active =true;
	 } 
	 console.log($scope.deatails[index].active);
   };
  
	 $scope.reload = function(user){
		 if ($('#myForms').parsley().validate() ) {
		 window.location.href = base_url+"search/index?from=" + user.board_point + "&to=" + user.drop_point + "&dateJ=" + user.dateJ + "&dateR=" + user.dateR;
	     }
	  };
	  $scope.getbusdetails='';
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

		$scope.board_point;
		$scope.drop_point;
		$scope.getUrlparameter = function(){
			
			
			var board_point = GetURLParameter('from');
            var drop_point = GetURLParameter('to');
			var date = GetURLParameter('dateJ');
			var dateR = GetURLParameter('dateR');
	
	        $http({
          method  : 'POST',
          url     : base_url+'search/select_bus',
          data    : {'board_point':board_point,'drop_point':drop_point,'dates':date}, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function(data) {
			 //alert(data);
			   $scope.getbusdetails = data;
			   
			    $scope.board_point = board_point;
                $scope.drop_point = drop_point;
				$scope.dateJ = date;
				$scope.dateR = dateR;
				date=new Date(date);
				today =new Date();
				if(today<date){
					
					$scope.datepre="true";
				}else{
					$scope.datepre="false";
				}
				
				$scope.date_slide = date.toISOString();
				if(dateR!='undefined'){
					dateRs=new Date(dateR);
					$scope.date_slideR = dateRs.toISOString();
					if(date<dateRs){
							$scope.datenext="false";
						}else{
						 $scope.datenext="true";	
						}
				}else{
						$scope.datenext="false";
					}
				
				
				
		$(".loader").hide();
			
			  });
			post_data  ={'board_point':board_point,'drop_point':drop_point};
		    link="search/filter_option";
		
	
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){  
			    $scope.filter = response;
			});	
		
			
			
			
			 
				
		};
		$scope.Viewseats= function(item,id)
	   {
		 
			post_data  ={'board_point':$scope.board_point,'drop_point':$scope.drop_point,'route_id':id};
			link="search/select_one_bus";
			
		
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){
				$scope.viewseats = response;
				
				
				var index = $scope.getbusdetails.indexOf(item);
			  if( $scope.getbusdetails[index].active == true){
				  $scope.getbusdetails[index].active = false;
			  }else{
				 $scope.getbusdetails[index].active = true;
			  }
			});	
			
		 
		  
		  
		  
	   };
	   
	   $scope.return_date= function(date)
	   {
		   
		   if(date !=''){
			 $("#datereturn").val(date);
			select_bus(); 
           		
		   }
		    
	   };
	   $scope.ratingdetails={};
	   
	   $scope.Ratingdetails= function(bus_id)
	   {
		   $(".loader").show();
		   post_data  ={'bus_id':bus_id};
			link="search/rating_details";
			
		
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){
				$scope.ratingdetails = response;
				console.log(response);
				$(".loader").hide();
			});	
	   };
	    
  
	   $scope.odrop='null';
	   $scope.name='';
	   $scope.ogrey='';
	  $scope.Rgrey='Grey';
	  $scope.Skipreturn=function(){
		   $(".loader").show();
		   var dateR ='undefined';
				  window.location.href = base_url+"payment/index?from=" +$scope.board_point + "&to=" + $scope.drop_point + "&dateJ=" + $scope.dateJ + "&dateR=" +dateR+"&0ckc="+$scope.oroute_id +"&0nm="+$scope.lengthss+"&0bpnt="+$scope.odrop+"&0seats="+$scope.oseats+"&0bus_id="+$scope.obus_id+"&Rckc=0&Rnm="+$scope.lengthss+"&Rbpnt=0&Rseats=0&Rbus_id=0" ;
				   
			  
		  
	  };
	   $scope.Continue= function(name,id,bus_id)
	   {
       
		  bus_v =$("#bus"+bus_id+ " .seat_nos").val();
		  /*alert(bus_v);*/
		   if(!bus_v ){
			   alert("Please select at least 1 seat");
			   return false;
		   }
		   if(name == undefined){
			   alert("Please select your boarding Point");
			   return false;
		   }
		     /* $http({
	          method  : 'POST',
	          url     : base_url+'search/select_settings',
	          
         }).success(function(data) {
			 alert(JSON.stringify(data));
			 console.log(data);
			 $scope.payment=data;
			 alert($scope.payment);

			 
				
				
		$(".loader").hide();
			
			  });*/
		    
		   //alert($scope.odrop);
		   /* var texts= $("#bus"+bus_id+" .selecteds").map(function() {
              return $(this).data("seat");
            }).get();
			var oneurl ='base_url+"payment/index?from=" +$scope.board_point + "&to=" + $scope.drop_point + "&dateJ=" + $scope.dateJ + "&dateR=" + $scope.dateR+"&ckc="+id +"&nm="+texts.length+"&bpnt="+name+"&seats="+texts ';
	       if($scope.dateR=='undefined'){
		   window.location.href = base_url+"payment/index?from=" +$scope.board_point + "&to=" + $scope.drop_point + "&dateJ=" + $scope.dateJ + "&dateR=" + $scope.dateR+"&ckc="+id +"&nm="+texts.length+"&bpnt="+name+"&seats="+texts ;
		   }else{
			   $scope.returnDetails();
		   }*/
		   $scope.ogrey='';
		   $scope.Rgrey='Grey';

		   if($scope.odrop == 'null'){
			  //$scope.oseats=new Array();

			   $scope.odrop=name;
			  
			   $scope.ogrey='Grey';
			   $scope.showSkip='true';
			   $scope.Rgrey='';
			   $scope.obus_id=bus_id; 
			   $scope.oseats=$("#seat_nos"+bus_id).val();

			   var oseats=$scope.oseats;
			    lengtho =  oseats.split(',');
				var lengthss =  lengtho.length;
				$scope.lengthss=lengthss;
			   
				//alert($scope.lengths);
			   $scope.oroute_id=id;

			   if($scope.dateR!='undefined'){
			  
				   $scope.returnDetails();
			   }else{
			   		
			   	
				   $(".loader").show();
				  window.location.href = base_url+"payment/index?from=" +$scope.board_point + "&to=" + $scope.drop_point + "&dateJ=" + $scope.dateJ + "&dateR=" + $scope.dateR+"&0ckc="+$scope.oroute_id +"&0nm="+$scope.lengthss+"&0bpnt="+$scope.odrop+"&0seats="+$scope.oseats+"&0bus_id="+$scope.obus_id+"&Rckc=0&Rnm="+lengthss+"&Rbpnt=0&Rseats=0&Rbus_id=0" ;
				   
			   }
			   
		   }
		   else{
			   //var seat_nos=new Array();
			   var seat_nos =$("#seat_nos"+bus_id).val();
			   var seat_array = seat_nos.split(',');
			   var length = seat_array.length;
			  
			   //alert(JSON.parse(seat_nos));
			   if($scope.lengthss != length){
				   
				   alert("A maximum of "+$scope.lengthss+" Seats can be selected as in the onward journey ");
				   return false;
			   }
			   
			   $(".loader").show();
			   window.location.href = base_url+"payment/index?from=" +$scope.board_point + "&to=" + $scope.drop_point + "&dateJ=" + $scope.dateJ + "&dateR=" + $scope.dateR+"&0ckc="+$scope.oroute_id +"&0nm="+$scope.oseats.length+"&0bpnt="+$scope.odrop+"&0seats="+$scope.oseats+"&Rckc="+id +"&Rnm="+length+"&Rbpnt="+name+"&Rseats="+seat_nos+"&Rbus_id="+bus_id ;
			   
		   }
		   
	   };
	   
	   $scope.returnDetails= function(){
		   var board_point = GetURLParameter('from');
            var drop_point = GetURLParameter('to');
			var date = GetURLParameter('dateJ');
			var dateR = GetURLParameter('dateR');
		   $http({
          method  : 'POST',
          url     : base_url+'search/select_bus',
          data    : {'board_point':drop_point,'drop_point':board_point,'dates':dateR}, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function(data) {
			 //alert(data);

			   $scope.getbusdetails = data;
			   
			    $scope.board_point = board_point;
                $scope.drop_point = drop_point;
				$scope.dateJ = date;
				$scope.dateR = dateR;
				date=new Date(date);
				
				$scope.date_slide = date.toISOString();
				if(dateR!='undefined'){
					dateRs=new Date(dateR);
					$scope.date_slideR = dateRs.toISOString();
				}
				
				
				
		$(".loader").hide();
			
			  });
			post_data  ={'board_point':drop_point,'drop_point':board_point};
		    link="search/filter_option";
		
	
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){  
			    $scope.filter = response;
			});
			
			
	   };
	   $scope.Twowaypaymentdetails='';
	   $scope.getUrlparameterPayment = function(){
			
			$(".loader").show();
			var board_point = GetURLParameter('from');
            var drop_point = GetURLParameter('to');
			var dates = GetURLParameter('dateJ');
			var dateR = GetURLParameter('dateR');
			var number = GetURLParameter('Rnm');
			var oroute_id = GetURLParameter('0ckc');
			var oboard_id = GetURLParameter('0bpnt');
			var oseat_no = GetURLParameter('0seats');
			var Rroute_id = GetURLParameter('Rckc');
			var Rboard_id = GetURLParameter('Rbpnt');
			var Rseat_no = GetURLParameter('Rseats');
				
			$scope.paymentReturnOneway(oroute_id,oboard_id);
			
			if(Rroute_id !=0){
				$scope.paymentReturnOneway2(Rroute_id,Rboard_id);
			}
			  
			 
			$scope.board_points = board_point;
			$scope.drop_points = drop_point;
			$scope.oboard_id = oboard_id;
			$scope.oroute_id = oroute_id;
			$scope.oseat_no = oseat_no;
			$scope.Rboard_id = Rboard_id;
			$scope.Rroute_id = Rroute_id;
			$scope.Rseat_no = Rseat_no;

			  $scope.counter = Array;
			$scope.numberss = parseInt(number);
			dates=new Date(dates);
			$scope.dateR=dateR;
			$scope.dates = dates.toISOString();
			
			if(dateR!='undefined'){
				dateR =new Date(dateR);
				$scope.Returndates=dateR.toISOString();
			}
			 $http({
	          method  : 'POST',
	          url     : base_url+'search/select_settings',
	          
         }).success(function(data) {
			
			
			 $scope.payment=data[0].payment_option;
			
			 $scope.payoptions =  $scope.payment.split(',');

			 angular.forEach($scope.payoptions, function (index,value) {
			 	
			    if (index== 'Cash') {
			        $scope.cash_new = true;
			    }

			    if(index == 'PayPal'){
			    	$scope.pay = true;
			    }
			    
			});

			
				
				
		$(".loader").hide();
			
			  });
		};
		$scope.sums='null';
		$scope.TotalAmount = function(sum){
			
			if($scope.sums=='null'){
				$scope.sums=sum;
				$scope.totals =parseInt($scope.sums);
				//console.log($scope.totals );
			}else{
				$scope.totals =parseInt($scope.sums)+parseInt(sum);
				//console.log($scope.totals );
			}
          $(".loader").hide();
			
		};
		$scope.paymentReturnOneway = function(oroute_id,boarding_point_id){
			//alert(oroute_id);
			post_data  ={'route_id':oroute_id,'boarding_point_id':boarding_point_id};
			link="search/select_one_bus";
			
		var res ="";
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){
				//alert(response);
			/*	$scope.paymentdetails  = response;
				$scope.paypaldetails  = response.paypals;
				//console.log($scope.paypaldetails  );
				$scope.board_points = board_point;
				$scope.drop_points = drop_point;
				$scope.board_id = board_id;
				$scope.route_id = route_id;
				$scope.seat_no = seat_no;
				  $scope.counter = Array;
				$scope.numberss = parseInt(number);
				dates=new Date(dates);
				
				$scope.dates = dates.toISOString();
				if(dateR!='undefined'){
					dateR =new Date(dateR);
					$scope.Returndates=dateR.toISOString();
				}*/
				
				//$(".loader").hide();
				//alert($scope.Returndates);
				//console.log($scope.Returndates);console.log($scope.dates);
				$scope.Onewaypaymentdetails=response;
				$scope.paypaldetails=response.paypals;
				$scope.TotalAmount($scope.Onewaypaymentdetails[0].fare*$scope.numberss);
                
			});
			
		};$scope.paymentReturnOneway2 = function(Rroute_id,boarding_point_id){
			//alert(Rroute_id);
			post_data  ={'route_id':Rroute_id,'boarding_point_id':boarding_point_id};
			link="search/select_one_bus";
			
		var res ="";
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){
				//alert(response);
			/*	$scope.paymentdetails  = response;
				$scope.paypaldetails  = response.paypals;
				//console.log($scope.paypaldetails  );
				$scope.board_points = board_point;
				$scope.drop_points = drop_point;
				$scope.board_id = board_id;
				$scope.route_id = route_id;
				$scope.seat_no = seat_no;
				  $scope.counter = Array;
				$scope.numberss = parseInt(number);
				dates=new Date(dates);
				
				$scope.dates = dates.toISOString();
				if(dateR!='undefined'){
					dateR =new Date(dateR);
					$scope.Returndates=dateR.toISOString();
				}*/
				
				//$(".loader").hide();
				//alert($scope.Returndates);
				//console.log($scope.Returndates);console.log($scope.dates);
				$scope.Twowaypaymentdetails=response;
				$scope.TotalAmount($scope.Twowaypaymentdetails[0].fare*$scope.numberss)
			});
			
		};
		 $scope.SubmitFunction = function (e) {
        var formElement = angular.element(e.target);
        formElement.attr("action", $scope.paypaldetails.paypal);
        formElement.submit();
    }; 
	    $scope.item ={};
		
	   
		$scope.forms={};
		$scope.userDetails = function(forms) {
			 if ($('#userForm').parsley().validate() ) {
			console.log($scope.forms);
			return false;
			 }
		}
		$scope.getNumber = function(num) {
			//alert(num)
			console.log(new Array(num));
         return new Array(num);   
        }
	    $scope.hiddenDiv=[];
		
		$scope.showDiv = function (index) {
			$scope.hiddenDiv[index] = !$scope.hiddenDiv[index];
			
		};
		$scope.timediff = function(start, end){
		  return moment.utc(moment(end).diff(moment(start))).format("mm")
		}
		
		$scope.previous= function(date)
	   {
		   var board_point = GetURLParameter('from');
           var drop_point = GetURLParameter('to');
		   var dateR = GetURLParameter('dateR');
		   var myDate = new Date(date);
           
           var previousDay = new Date(myDate);
           var today =new Date();
		   if(today<=myDate){
			   $scope.date_slide = previousDay.setDate(myDate.getDate()-1);
			   var dateJ =$filter('date')($scope.date_slide, "MM/dd/yyyy");
			    window.location.href = base_url+"search/index?from=" + board_point + "&to=" + drop_point + "&dateJ=" + dateJ + "&dateR=" +dateR;
				
	     
		   }
		   
		  
	   };

	   $scope.next= function(date)
	   {
		   var board_point = GetURLParameter('from');
           var drop_point = GetURLParameter('to');
		   var myDate = new Date(date);
		  
           var dateR=GetURLParameter('dateR');

           var previousDay = new Date(myDate);
           if(dateR!='undefined'){
			   var today =new Date(dateR);
			   
			   if(today>myDate){
				   $scope.date_slide = previousDay.setDate(myDate.getDate()+1); 
				    var dateJ =$filter('date')($scope.date_slide, "MM/dd/yyyy");
			    window.location.href = base_url+"search/index?from=" + board_point + "&to=" + drop_point + "&dateJ=" + dateJ + "&dateR=" +dateR;
			   }
		   }else{
			   $scope.date_slide = previousDay.setDate(myDate.getDate()+1);
			    var dateJ =$filter('date')($scope.date_slide, "MM/dd/yyyy");
			    window.location.href = base_url+"search/index?from=" + board_point + "&to=" + drop_point + "&dateJ=" + dateJ + "&dateR=" +dateR;
		   }
		   
		   
		   
	   };
	    $scope.colourIncludes = []; 
		$scope.colourIncludes1 = [];
		 $scope.tags = [];
        $scope.amt =[];
		$scope.drop =[];
		$scope.rates = '';
		$scope.value = '';
		
		
    $scope.includedrop = function(drop) {
		
		
        var i = $.inArray(drop, $scope.drop);
        if (i > -1) {
            $scope.drop.splice(i, 1);
			
        } else {
            $scope.drop.push(drop);
			
        }
    };
	$scope.includeBus3 = function(amenities) {
		
		console.log(amenities);console.log($scope.amt);
		
        var i = $.inArray(amenities, $scope.amt);
        if (i > -1) {

            $scope.amt.splice(i, 1);
			
        } else {
        	
            $scope.amt.push(amenities);
           
			
        }
    };
	$scope.includeBus = function(bus) {
		
        var i = $.inArray(bus, $scope.colourIncludes);
        if (i > -1) {
            $scope.colourIncludes.splice(i, 1);
			console.log($scope.colourIncludes);
        } else {
            $scope.colourIncludes.push(bus);
			console.log($scope.colourIncludes);
			
        }
    };
	 
    $scope.includeBus1 = function(bus_type) {
		
        var i = $.inArray(bus_type, $scope.colourIncludes1);
		
        if (i > -1) {
			
			
            $scope.colourIncludes1.splice(i, 1);
			
        } else {
            $scope.colourIncludes1.push(bus_type);
			
        }
    }; 
	 $scope.includeBus2 = function(bpoints) {
		
        var i = $.inArray(bpoints,  $scope.tags);
		
        if (i > -1) {
             $scope.tags.splice(i, 1);
			
        } else {
            
			
			
				
				 $scope.tags.push(bpoints);
				
			
			
			
        }
    }; 
	$scope.rated = function(AvgPrice,event) {
		if(event.target.checked==true){
			$scope.rates = AvgPrice;
			/*angular.forEach($scope.getbusdetails, function(value, key){
				if(value.AvgPrice >= AvgPrice){
					$scope.rates.push(value);
				}
			})*/
		} else {
			$scope.rates = '';
			//$scope.rates = $scope.getbusdetails;
		}

		console.log($scope.rates);
		
		
          // how to check if checkbox is selected or not
          //alert(event.target.checked);
        
		/*alert("haii");
		angular.forEach($scope.getbusdetails, function(value, key){
        
			/*alert(value.AvgPrice);
			alert(AvgPrice);
			console.log($scope.getbusdetails);

*/
			/*if(value.AvgPrice !=null){

         if(value.AvgPrice > AvgPrice){
			 var i = $.inArray(value.AvgPrice,  $scope.rates);
			 alert(i);
		
		 if (i > -1) {
             $scope.rates.splice(i, 1);
            
			console.log($scope.rates);
        } else {
            				
				$scope.rates.push(value.AvgPrice);
				console.log($scope.rates);
				
        }	
		 }
			}


           
         });*/
		
		
		
		 }; 
		
		 $scope.ratingFilter1 = function(getbusdetails) {
		 	console.log(getbusdetails);

		
        if ($scope.rates != '') {
			if(getbusdetails.AvgPrice < $scope.rates){
				return;
			} else {
				return getbusdetails;
			}
		} else {
			return getbusdetails;
		}
            
        
    };
	$scope.colourFilter = function(getbusdetails) {
        if ($scope.colourIncludes.length > 0) {
            if ($.inArray(getbusdetails.bus_name, $scope.colourIncludes) < 0)
				//console.log($scope.colourIncludes);
                return;
        }
        //console.log($scope.colourIncludes);
        return getbusdetails;
    };
   $scope.colourFilter1 = function(getbusdetails) {
        if ($scope.colourIncludes1.length > 0) {
			
			//console.log(getbusdetails.bus_type.indexOf($scope.colourIncludes1));
            if ($.inArray(getbusdetails.bus_type, $scope.colourIncludes1) < 0)
				
                return;
        }
         //console.log(getbusdetails);
        return getbusdetails;
    };
	 $scope.getTripdetails = function() {

	 	/*$scope.amount_show=false;*/	
		 $(".loader").show();
		 post_data  ='';
			link="Myaccount/get_tripdetails";
			
		
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){
                $scope.tripDetails = response;
                
              	
                if($scope.tripDetails !='')
                {

               angular.forEach($scope.tripDetails, function (task, index) {
             
               if(task.promo_code!='')
				{
					
				$scope.tripDetails[index].amount=parseInt(task.amount-task.off_amount);
						
					
				}
				
               });

				/*if($scope.tripDetails[0].promo_code!='')
				{
				
                   alert(JSON.stringify($scope.tripDetails[0]));
				$scope.amountpayable=parseInt($scope.tripDetails[0].amount-$scope.tripDetails[0].off_amount);
				$scope.amount_show=true;		
					
				}*/}
				 $(".loader").hide();
			});	
		 
	 };
	
	 $scope.isDate = function(time) {
		 $scope.myDate = $filter('date')(new Date(), 'hh:mm:a');
		 
		
		 $scope.today =time;
		 if( $scope.myDate > $scope.today ){
			 console.log($scope.myDate);
			 return true;
		 }else{
			 console.log($scope.myDate);
			 return false;
		 }
	 };
	  $scope.Cancel = function(id) {
		  
		   post_data  ={'id':id};
			link="Myaccount/cancel";
			
		
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){
				alert(response);
			});	
	  };
	 
	 $scope.rating = function() {
		// alert("F");
		 post_data  ='';
			link="Myaccount/rating";
			
		
			var promise = WebService.send_data( link,post_data);
			promise.then(function(response){
				alert(response);
			});	
		 
	 }
	
	
	
	
});
