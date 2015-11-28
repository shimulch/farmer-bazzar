angular.module('checkmate').controller('UserController', ['fileUpload', '$scope', '$http', '$auth', '$state', function(fileUpload, $scope, $http, $auth, $state){

	$http.get('/api/user-data').success(function(response){
		$scope.userData = response;
		console.log(response);
	}).error(function(response){
		console.log(response);
		//$state.go('/login');
	});
	

	$scope.upload = function(){
        var file = $scope.myFile;
       
        var uploadUrl = "/api/change-profile-picture";
    
        var fd = new FormData();
        fd.append('file', file);
        
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(response){
            $scope.userData = response;
        })
        .error(function(response){
            $scope.formErrors = response.errors;
            console.log(response);
        });;
    };

}]);