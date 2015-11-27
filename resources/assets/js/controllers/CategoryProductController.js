angular.module('checkmate').controller('CategoryProductController', ['$http', '$scope', '$stateParams', function($http, $scope, $stateParams){

	$http.get('/api/list-categories/' + $stateParams.categorySlug + '/products').then(function(response){
		
		$scope.products = response.data;
			
	});

}]);