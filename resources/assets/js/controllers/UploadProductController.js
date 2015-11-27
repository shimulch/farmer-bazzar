angular.module('checkmate').controller('UploadProductController', [ 'fileUpload', '$scope', '$http', '$rootScope', function( fileUpload, $scope, $http, $rootScope){

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
        var data = {
        	title: $scope.title,
        	main_category: $scope.main_category,
        	sub_category: $scope.sub_category,
        	price: $scope.price,
        	pricing_type: $scope.pricing_type,
        	quantity: $scope.quantity,
        	unit: $scope.unit,
        	expiry_date: $scope.expiry_date
        };
        fileUpload.uploadFileToUrl(file, uploadUrl, data);
    };
}]);