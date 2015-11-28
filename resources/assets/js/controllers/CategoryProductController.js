angular.module('checkmate').controller('CategoryProductController', ['$http', '$scope', '$stateParams', '$rootScope', function($http, $scope, $stateParams, $rootScope){

	$http.get('/api/list-categories/' + $stateParams.categorySlug + '/products').then(function(response){
		
		$scope.products = response.data;


			
	});
	$scope.calc = function(ratings){
		var total = 0;
		for(var i = 0; i<ratings.length; i++){
			total += ratings[i].rating;
		}
		console.log(total);
		$scope.rate = (total/ratings.length);
	};

	$scope.isReadonly = !$rootScope.loggedIn;
	
	$scope.doRate = function (itemId){
		console.log($scope.rate);
		$http.post('/api/products/'+itemId+'/ratings', {rating: $scope.rate}).then(function(response){
			console.log(response);
		});

	};
	
}]);