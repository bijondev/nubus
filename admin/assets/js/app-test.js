var App = angular.module('seat', ['ui.sortable']);

App.controller('layout', function ($scope,$http,$timeout) {
  	$scope.counter=Array;
	
	 $scope.sortableOptions = {
		 
    placeholder: "app",
    connectWith: ".apps-container"
  };

///////////////////////////////////////////////////////
////////////    Ragu Code Start         ////////////////
///////////////////////////////////////////////////////

	$scope.change_test = function(count,lastno,bus,layout){

		
	 if ($('#seatss').parsley().validate() ) {	

		var inner = count;
		$scope.count = count;
		$scope.inner =count;
		$scope.sleepers ='0';
		 if($scope.bus_type=='Seater && Sleeper'){
		 $scope.sleepers =$scope.sleeper;
		 }
		$scope.last_row = [];
		if(lastno>0){
			inner = parseInt(count - lastno);
			
			$scope.inners =lastno;
			var  totallast=''; $scope.totallast='count';
			if(lastno<5){
				totallast = parseInt(5-lastno);
				
			}else{
				totallast="0";
			}
			$scope.totallast=parseInt(lastno)+parseInt(totallast);
			var tsum =parseInt(count)+parseInt(totallast);
			var s='1';
			for (var i = inner; i < tsum; i++) {
				if(i< count){
					if($scope.sleepers >inner){
				   var sleeper="sleeper";
			   }else{
				   if($scope.bus_type=='Sleeper'){
					  var sleeper="sleeper"; 
				   }else{
					   
					   var sleeper="seater";
				   }
				  
			   }
				}else{
					sleeper='sleeper1';
				}
				
				$scope.last_row.push({bus: i,type:sleeper,seat_no:"E"+s});
				s++;
			}
		}
		console.log($scope.last_row);
		var layout_divide = [0,2,3,3,4];
		
		var layout_name = layout.split("-");
		$scope.layout_name=layout_name;
		var layout_type = parseInt(layout_name[1]);
		layout_count = layout_divide[layout_type];
		var each_row = parseInt(inner / layout_count);
		var total_count = each_row * layout_count;
		var diff_count = parseInt(inner - total_count);
		$scope.each_row=each_row;$scope.diff_count=diff_count;
		console.log("count = "+count);
		console.log("inner = "+inner);
		console.log("layout_count = "+layout_count);
		console.log("each_row = "+each_row);
		console.log("diff_count = "+diff_count);
		
		var layout_var = [];
		layout_var[1] = ["left_1","right_2"];
		layout_var[2] = ["left_1","right_1","right_2"];
		layout_var[3] = ["left_1","left_2","right_2"];
		layout_var[4] = ["left_1","left_2","right_1","right_2"];
		var seat_no =[];
		seat_no =['A','B','C','D'];
		$scope.layout_var=layout_var;
		$scope.seat_details = [];
		
		$scope.seat_details["left_1"] = [];
		$scope.seat_details["left_2"] = [];
		$scope.seat_details["right_1"] = [];
		$scope.seat_details["right_2"] = [];
		
		for(var i = 0; i < layout_var[layout_type].length; i++) {
			
			var seat_count = each_row;
			
			if(i == parseInt(layout_var[layout_type].length - 1)) {
				seat_count = each_row + diff_count;
			}
			 if(i == 0){
				s='';
			 }else{
				s=seat_count*i; 
			 }
			for(var j=0; j < seat_count; j++) {
				seat = parseInt(1 + j)
				num =parseInt(s + j);
				if($scope.sleepers >num){
				   var sleeper="sleeper";
			   }else{
				   if($scope.bus_type=='Sleeper'){
					  var sleeper="sleeper"; 
				   }else{
					   
					   var sleeper="seater";
				   }
				  
			   }
				$scope.seat_details[layout_var[layout_type][i]].push({bus: num ,type:sleeper,seat_no:seat_no[i]+seat})
				
			}
		}
		console.log($scope.seat_details);
	 }
	
	}
	$scope.logModelss = function (count,lastno,bus,layout) {
		if ($('#seatss').parsley().validate() ) {
		$scope.change_test(count,lastno,bus,layout);	
		var layout_name = layout.split("-");
		
	
		var layout_type = parseInt(layout_name[1]);
		var layout_var = [];
		layout_var[1] = ["left_1","right_2"];
		layout_var[2] = ["left_1","right_1","right_2"];
		layout_var[3] = ["left_1","left_2","right_2"];
		layout_var[4] = ["left_1","left_2","right_1","right_2"];
		$scope.sortingLog0 = []; $scope.sortingLog1 = []; $scope.sortingLog2 = []; $scope.sortingLog3 = [];$scope.sortingLog4 = [];
		 $scope.sortableOptionsList = [$scope.sortingLog0, $scope.sortingLog1,$scope.sortingLog2,$scope.sortingLog3,$scope.sortingLog4];
		for(var i = 0; i < layout_var[layout_type].length; i++) {
			var seat_count = $scope.each_row;
			
			if(i == parseInt(layout_var[layout_type].length - 1)) {
				seat_count = $scope.each_row + $scope.diff_count;
			}
      for(var j=0; j < seat_count; j++) {
		  
			  $scope.sortableOptionsList[i].push($scope.seat_details[layout_var[layout_type][i]][j]);
		       
	   
      //var logEntry = $scope.rawScreens[i];
	  //$scope.sortingLog1[i] =$scope.test1[i]; 
      }
		}
	  for (var i = 0; i < $scope.totallast; i++) {
				console.log($scope.totallast)
				 $scope.sortableOptionsList[4].push($scope.last_row[i]);
			}
			console.log($scope.sortableOptionsList[4]);
$scope.SaveLayout();
		}

    };
	

///////////////////////////////////////////////////////
////////////    Ragu Code End         ////////////////
///////////////////////////////////////////////////////
$scope.SaveLayout = function(){
		
  $scope.layoutss={};
	  for (var i = 0; i < 5; i++) {
     
		  //var logEntry = $scope.rawScreens[i];
		   $scope.layoutss[i] =$scope.sortableOptionsList[i]; 
		 
        }
		
		if($scope.lastno==undefined){
			$scope.lastnos=0;
		}else{
			$scope.lastnos=$scope.lastno;
		}
		//alert($scope.lastnos);
		console.log($scope.lastnos);
	  $http({
	  method  : 'POST',
	  url:base_url+'seat_layout/add_seat',
	  data :{'bus':$scope.bus,'totel_seat':$scope.noseat,'layout_type':$scope.layout,'last_seat':$scope.lastnos,'bus_type':$scope.bus_type,'layout': $scope.layoutss,'no_sleeper':$scope.sleeper},//forms user object
	  headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
	  }).success(function(data) {
		
		if (data.status=='failed') {
		  // Showing errors.
		  $scope.changec="error";
		 $scope.myHTML ="Already exist";
		/* location.reload();*/
		  setTimeout(function(){location.reload(); }, 1500);

		 
		} else {
			$scope.changec="success";
		 $scope.myHTML ="success ";
		 setTimeout(function(){location.reload(); }, 1500);
		 
		} 
		
	  });
	};
		$http.get( base_url+'seat_layout/get_results').success(function($data){ $scope.getresultsds=$data; //console.log($scope.getresultsds);
		 $scope.layoutsd = JSON.parse($scope.getresultsds[0].layout);});
		 
		 
		 
		 
		 
		   $scope.get_busname = function(){
					//$scope.select_buss = [];
					//$scope.cinema_screen = response.data;
					//alert(JSON.stringify(cinema_screen.movie_name));
					$http.get(base_url+"Seat_layout/get_busname").success(function(data){ 
						$scope.select_buss = data; 
						//console.log(data);
					});
	            }	
			
				$scope.getseatlayouts = function(layout){
					
						//alert(layout);
						//console.log(layout);
						$http.get(base_url+"Bus_details/seatdetails_view/"+layout).success(function(data){ 
						$scope.showlay = JSON.parse(data.layout);
						//console.log($scope.showlay);
					});
					
					//$scope.cinema_screen = response.data;
					//alert(JSON.stringify(cinema_screen.movie_name));
					
	            }	 
		 
		 
		 
		 
		 
		 
  });
  