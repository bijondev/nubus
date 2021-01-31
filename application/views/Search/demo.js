angular.module('MyApp', ['ngMaterial', 'ngMessages'])
.controller('AppCtrl', function($scope, $mdSidenav) {
    // User Information
$scope.userData = [{
       "id": "1",
       "name": "Srinivas Dasari",
       "place": "Chennai",
       "pic": "https://lh3.googleusercontent.com/-nBqk0jHahk8/VnL9EvT6IPI/AAAAAAAADdU/4JB3A-1zjTM/s160-Ic42/srinivas_dasari.jpg"
     }, {
       "id": "2",
       "name": "Srinivas Tamada",
       "place": "Atlanta",
       "pic": "https://lh3.googleusercontent.com/-lkebnHGHGcs/VnL9E4nO_FI/AAAAAAAADdY/z2IWGONMG8E/s160-Ic42/srinivas_tamada.jpg"
     }, {
       "id": "3",
       "name": "Sri Harsha",
       "place": "Hyderabad",
       "pic": "https://lh3.googleusercontent.com/-x69ytvh8GkA/VnL9Dqye1jI/AAAAAAAADdM/pBDbJRX8Vxo/s160-Ic42/harsha.jpg"
     }, {
       "id": "4",
       "name": "Lokesh Raghuram",
       "place": "London",
       "pic": "https://lh3.googleusercontent.com/-7XM-i20j7CQ/VnL9EZnDLYI/AAAAAAAADdQ/kR99DUgRhak/s160-Ic42/lokesh.jpg"
     }, {
       "id": "5",
       "name": "Bala Ganesh",
       "place": "Chennai",
       "pic": "https://lh3.googleusercontent.com/-snzuBGu0CJE/VnL9DksYVSI/AAAAAAAADdA/7Y0EvQbWc7I/s160-Ic42/ganesh.jpg"
     }, {
       "id": "6",
       "name": "Arun kumar",
       "place": "Visakhapatnam",
       "pic": "https://lh3.googleusercontent.com/-HiQ4bqPp-fk/VnL9Dqo7u0I/AAAAAAAADdc/NqhwXqgb4Ac/s160-Ic42/arun.jpg"
     }];
    
     // selected places
     $scope.selected = [];
     // whole places
     $scope.places = [];
     
     // when user clicks on checkbox, change selected list
     $scope.toggle = function (item, list) {
       var idx = list.indexOf(item);
       if (idx > -1) list.splice(idx, 1);
       else list.push(item);
     };
     
     // is item exists in list
     $scope.exists = function (item, list) {
       return list.indexOf(item) > -1;
     };
     
     // process user data and prepare whole places
     angular.forEach($scope.userData, function(user, key) {
        if($scope.places.indexOf(user.place) == -1) {
            $scope.places.push(user.place);
        }     
     });
    
}).filter('selectedTags', function() {
    // filter to check array of elements
    return function(users, tags) {
        return users.filter(function(user) {
            if (tags.indexOf(user.place) != -1) {
                return true;
            } else if(tags.length == 0) {
                return true;
            }
            return false;

        });
    };
});