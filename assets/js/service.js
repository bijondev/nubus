 App.service('WebService', function( $http, $q){
  
	/* SIGN UP 
	===========================================/
	 this.upload = function( link,img_el,post_data ){
		
		// $.mobile.loading('show');
		var url = base_url + link ;
		var result = null;
		
		var deferred = $q.defer();
	    
		var img = document.getElementById(img_el); 
		var imageURI = img.src;
		
			var options = new FileUploadOptions();
			options.fileKey="file";
			options.fileName=imageURI.substr(imageURI.lastIndexOf('/')+1);
			options.mimeType="image/jpeg";
			// var params = new Object();
			// params.value1 = "test";
			// params.value2 = "param";
			
			options.params = post_data;
			options.chunkedMode = false;
			var ft = new FileTransfer();
			
			ft.upload(imageURI, url, 
			function(r){
				deferred.resolve(r.response);	
			}, function(error){
				alert("An error has occurred: Code::: = " + error.code);
				 
				
			}, options);
		
		return deferred.promise;
	  //alert(result);
	 }

	 /* SEARCH SHOPS 
	  =============================================== */ 
	 this.send_data = function( link , post_data ){
			var self = this;
			
			var deferred = $q.defer();
			
			var url = base_url + link;
			var result = null;
			
			 var req = {
				 method: 'POST',
				 url: url,
				 data: post_data
			}
			
			 
			$http(req).then( 
				function (data){
					// alert(JSON.stringify(data.data));
					deferred.resolve(data.data);		
				},function (error){
					/*
					alert(error.status +" "+ error.statusText);
					// alert(JSON.stringify(error,null,4));
					if(error.status == 404){
						alert("Sorry! Server not responding (404)");
					}
					else{
						alert('sorry! an error occured');
					}
					*/
					// self.remove_loading();
					
					deferred.reject();
				}
			);	
		  
		  return deferred.promise;
		 }
		 
	
 })