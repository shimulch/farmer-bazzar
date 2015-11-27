angular.module('checkmate').controller('SingleProductController', ['$http', '$scope', '$stateParams', function($http, $scope, $stateParams){

	console.log($stateParams);
	$http.get('/api/products/' + $stateParams.productId).then(function(response){
		
		$scope.product = response.data;
			
	});

}]);