angular.module('checkmate').controller('UploadProductController', [ 'fileUpload', '$scope', '$http', '$rootScope', function( fileUpload, $scope, $http, $rootScope){

    $scope.title ="";
    $scope.main_category="";
    $scope.price = 0;
    $scope.quantity = 0;
    $scope.expiry_date = new Date();
    console.log($scope.expiry_date);
    $scope.sub_category = "";
	$scope.findSubCategory = function(){
		$http.get('/api/list-categories/'+ $scope.main_category).then(function(response){
			$scope.subCategories = response.data;
			$scope.sub_category = $scope.subCategories[0].id;
			console.log($scope.subCategories);
		});
	};

	$scope.pricing_type = 'প্রতি কেজি';
	$scope.unit = 'কেজি';

	$scope.upload = function(){
        var file = $scope.myFile;
        console.log('file is ' );
        console.dir(file);
        var uploadUrl = "/api/products";
    
        var fd = new FormData();
        fd.append('file', file);

        fd.append('title', $scope.title);
        fd.append('main_category', $scope.main_category);
        fd.append('sub_category', $scope.sub_category);
        fd.append('price', $scope.price);
        fd.append('pricing_type', $scope.pricing_type);
        fd.append('quantity', $scope.quantity);
        fd.append('unit', $scope.unit);
        fd.append('expiry_date', $scope.expiry_date);
        
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).success(function(response){
            console.log(response);
        })
        .error(function(response){
            $scope.formErrors = response.errors;
            console.log(response);
        });;
    };
}]);