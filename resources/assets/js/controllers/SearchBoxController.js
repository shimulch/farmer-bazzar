angular.module('checkmate').controller('SearchBoxController', ['$window', '$http', '$scope', '$state', '$rootScope', function($window, $http, $scope, $state, $rootScope){

	$http.get('/api/districts').then(function(response){
		$scope.districts = response.data;
	});
	
	$scope.main_category = "";
	$scope.district = "";
	$scope.searchText = "";
	$rootScope.paginate = {
            page: 1,
            take: 10
        };
	$scope.search = function(){
		var url = '/#/search?';
		url = url+'main_category=' + $scope.main_category + '&district=' + $scope.district + '&search=' + $scope.searchText;
		
		$http.get('/api/products/search?main_category='+$scope.main_category+'&district='+$scope.district+'&search='+$scope.searchText+'&page='+$rootScope.paginate.page+'&take='+$rootScope.paginate.take).then(function(response){
			$rootScope.searchProducts = response.data.products;
			$rootScope.paginate.pages = response.data.total;
		});
		$window.location.href = url;
	};


	$scope.nextPage = function() {
                if ($rootScope.paginate.page < $rootScope.paginate.pages) {
                    $rootScope.paginate.page++;
                    $scope.search();
                }
            };
            
    $scope.previousPage = function() {
        if ($rootScope.paginate.page > 1) {
            $rootScope.paginate.page--;
            $scope.search();
        }
    };
	
}]);