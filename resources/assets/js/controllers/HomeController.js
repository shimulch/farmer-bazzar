angular.module('checkmate').controller('HomeController', ['$http', '$scope', '$state', function($http, $scope, $state){

	$http.get('/api/products').then(function(response){
		$scope.products = response.data;
		console.log(response);
		
	});

}]);