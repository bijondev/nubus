var App = angular.module('seat', ['ui.sortable']);

App.controller('layout', function ($scope,$http,$timeout) {
  	$scope.counter=Array;
	
	 $scope.sortableOptions = {
		 
    placeholder: "app",
    connectWith: ".apps-container"
  };
  
	$scope.change = function(count,lastno,bus){
		 $scope.sleeper ='0';
		 if($scope.bus_type=='Seater && Sleeper'){
		 $scope.sleeper =$scope.sleeper;
		 }
		if(lastno>0){
			if(lastno == '5'){
				$scope.addClass = "col-md-15 col-sm-3";
				
				
			}else{
				
				$scope.addClass = "col-md-"+12/lastno;
			}
			$scope.counts = parseInt(count);
			$scope.lastno = parseInt(lastno);
			$scope.start =  parseInt((count - lastno)/2);
			$scope.lseat =  parseInt((count - lastno));
			$scope.INCASE =  parseInt($scope.start) +  parseInt($scope.even) ;
			
		}else{
			$scope.counts = parseInt(count);
			$scope.lastno = parseInt("0");
			$scope.start =  parseInt((count)/2);
			$scope.lseat =  parseInt(("0"));
			$scope.INCASE =  parseInt($scope.start) +  parseInt($scope.even) ;
		}
				
			$scope.test1 =[];
	    for (var i = 0; i < $scope.start; i++) {
		
		   if(i<$scope.sleeper){
			   var sleeper="sleeper";
		   }else{
			   if($scope.bus_type=='Sleeper'){
				  var sleeper="sleeper"; 
			   }else{
				   
				   var sleeper="seater";
			   }
			  
		   }
		 $scope.test1.push({bus: bus+i,type:sleeper});
		}
			$scope.test2 = [];
			var left_s =$scope.start-$scope.sleeper;
			if($scope.start>$scope.sleeper){
				var sLeft =0;
			}else{
				var sLeft =Math.abs($scope.start-$scope.sleeper);
			}
	   for (var i = 0; i < $scope.INCASE; i++) {
		  if(i<sLeft){
			   var sleeper="sleeper";
		   }else{
			   if($scope.bus_type=='Sleeper'){
				  var sleeper="sleeper"; 
			   }else{
				   var sleeper="seater";
			   }
		   }
		   $scope.test2.push({bus: bus+($scope.start+i),type:sleeper});
		}
			$scope.test3 = [];
			if($scope.INCASE>sLeft){
				var sUnder =0;
			}else{
				var sUnder =Math.abs(sLeft-$scope.INCASE);
			}
			var last_seater =$scope.start-$scope.sleeper;
	    for (var i = 0; i < $scope.lastno; i++) {
		 if(i<sUnder){
			   var sleeper="sleeper";
		   }else{
			  
			   if($scope.bus_type=='Sleeper'){
				  var sleeper="sleeper"; 
			   }else{
				   var sleeper="seater";
			   }
		   }
		 $scope.test3.push({bus: bus+($scope.lseat+i),type:sleeper});
		}

	}
	$scope.sortableOptionsList = [$scope.test1, $scope.test2,$scope.test3];
	$scope.classLeft = function(Lclass){
		
		if(Lclass == 'layout-1'){
			$scope.addL = 'col-md-12';
			$scope.addR = 'col-md-12';
		}else if(Lclass == 'layout-2'){
			$scope.addL = 'col-md-12';
			$scope.addR = 'col-md-6';
		}else if(Lclass == 'layout-3'){
			$scope.addL = 'col-md-6';
			$scope.addR = 'col-md-12';
		}else if(Lclass == 'layout-4'){
			$scope.addL = 'col-md-6';
			$scope.addR = 'col-md-6';
		}
	};
	$scope.logModels = function () {
		
		$scope.sortingLog1 = []; $scope.sortingLog2 = []; $scope.sortingLog3 = [];
		for (var i = 0; i < $scope.start; i++) {
		   $scope.sortingLog1.push($scope.test1[i]);
		  //var logEntry = $scope.rawScreens[i];
		  //$scope.sortingLog1[i] =$scope.test1[i]; 
		  
		}for (var i = 0; i < $scope.start; i++) {
		 $scope.sortingLog2.push($scope.test2[i]);
		  //var logEntry = $scope.rawScreens[i];
		 // $scope.sortingLog2[i] =$scope.test2[i]; 
		  
		}for (var i = 0; i < $scope.lastno; i++) {
		  $scope.sortingLog3.push($scope.test3[i]);
		  //var logEntry = $scope.rawScreens[i];
		  //$scope.sortingLog3[i] =$scope.test3[i]; 
		  
		}
		$scope.SaveLayout();
  };
    $scope.layouts=[];
	$scope.SaveLayout = function(){
		$scope.change($scope.noseat,$scope.lastno,$scope.bus);
		//$scope.logModels();

	  $scope.sortableOptionsList = [$scope.sortingLog1, $scope.sortingLog2,$scope.sortingLog3];
		for (var i = 0; i < 3; i++) {
     
		  //var logEntry = $scope.rawScreens[i];
		   $scope.layouts[i] =$scope.sortableOptionsList[i]; 
		 
        }
		
	  $http({
	  method  : 'POST',
	  url:base_url+'Welcome/add_seat',
	  data :{'bus':$scope.bus,'totel_seat':$scope.noseat,'layout_type':$scope.layout,'last_seat':$scope.lastno,'bus_type':$scope.bus_type,'layout':$scope.layouts},//forms user object
	  headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
	  }).success(function(data) {
		
		if (data[0].status=='failed') {
		  // Showing errors.
		  $scope.change=false;
		 $scope.myHTML =data[0].message;
		  
		 
		} else {
			$scope.change=true;
		 $scope.myHTML =data[0].message;
		} 
		
	  });
	};
	
	$http.get( base_url+'welcome/get_label').success(function($data){ $scope.getresultsds=$data; console.log($scope.getresultsds);});
	


	$scope.getresults = function(){ 
	//alert(value);
	 $http({
          method  : 'POST',
          url:base_url+'Welcome/get_label',
         //data :{'id':"layout"+value},//forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function(data) {
			
           $scope.results=data;
		  
		   if(data[0].last_seat == '5'){
			$scope.addClass = "col-md-15 col-sm-3";
			
			
		}else{
			
			$scope.addClass = "col-md-"+12/data[0].last_seat;
		}
		   
		  
          });
	};
	$scope.getlayout = function(res,x){ 
	 $scope.classLeft(res.layout_type);
	if(res.last_seat == '5'){
			$scope.addClass = "col-md-15 col-sm-3";
			
			
		}else{
			
			$scope.addClass = "col-md-"+12/res.last_seat;
		}
	$scope.layouts = JSON.parse(res.layout);
	alert($scope.layouts);
	console.log($scope.layouts[x]);
	return $scope.layouts[x];
	
	};
$scope.isEven = function(value1,value2){ 
var value =parseInt(value1) +  parseInt(value2) ;
	if (value%2 == 0){
		$scope.even='0';
		return true;
	}
		
	else{
		$scope.even='1';
		return false;
	}
		
};


  });
  