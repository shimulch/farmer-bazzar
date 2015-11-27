angular.module('checkmate').controller('NavbarController', ['$http', '$rootScope',  '$scope', '$location', '$auth', function($http, $rootScope, $scope, $location, $auth){

	$scope.isActive = function (viewLocation) { 
        return viewLocation === $location.path();
    };

    $http.get('/api/list-categories').then(function(response){
    	$rootScope.categories = response.data;
    	//console.log($rootScope.categories);
    });
    
    $rootScope.loggedIn = $auth.isAuthenticated();
}]);