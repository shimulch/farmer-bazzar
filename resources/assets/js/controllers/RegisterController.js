angular.module('checkmate').controller('RegisterController', ['$http', '$scope', '$state', function($http, $scope, $state){

	$scope.submit = function(){
		var data = {
			name: $scope.name,
			phone_no: $scope.phone_no,
			house: $scope.house,
			village: $scope.village,
			post_office: $scope.post_office,
			post_code: $scope.post_code,
			thana: $scope.thana,
			district: $scope.district,
			password: $scope.password,
			confirm_password: $scope.confirm_password
		};

		$http.post('/api/register', data)
			.success(function(response){
				$state.go('login');
			}).error(function(response){
				console.log(response);
				$scope.formErrors = response.errors;
			});
	}

}]);