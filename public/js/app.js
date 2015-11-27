angular.module('checkmate', ['ui.router', 'ui.bootstrap', 'satellizer', 'angular-loading-bar']);


angular.module('checkmate').config(['$stateProvider', '$urlRouterProvider', '$authProvider', function ($stateProvider, $urlRouterProvider, $authProvider){
	
	$authProvider.loginUrl = '/api/authenticate';

	$urlRouterProvider.otherwise("/");
	
	$stateProvider
		.state('home', {
			url: '/',
			templateUrl: '/tpl/home.html',
			controller: 'HomeController'
		})
		.state('login', {
			url:'/login',
			templateUrl: '/tpl/login.html',
			controller: 'AuthController as auth'
		})
		.state('register', {
			url:'/register',
			templateUrl: '/tpl/register.html',
			controller: 'RegisterController as register'
		})
		.state('upload-product', {
			url: '/upload-product',
			templateUrl: '/tpl/upload-product.html',
			controller: 'UploadProductController'
		})
		.state('singleProduct', {
	        url: "/product/:productId",
	        templateUrl: '/tpl/product-show.html',
	        controller: 'SingleProductController'
	    })
	    .state('singleCategory', {
	        url: "/category/:categorySlug/products",
	        templateUrl: '/tpl/category-show.html',
	        controller: 'CategoryProductController'
	    })
		.state('logout', {
			url:'/logout',
			controller: function($auth, $rootScope, $state){
				$rootScope.loggedIn = false;
				$auth.logout().then(function(){
					$state.go('home');
				});

			}
		})
		.state('about', {
			url: '/about',
			templateUrl:'/tpl/about.html',
			controller: function($scope){
				 $scope.items = ["A", "List", "Of", "Sajid"];
			}
		});

}]);

angular.module('checkmate').controller('AuthController', ['$auth', '$state', '$rootScope', function($auth, $state, $rootScope){

	var vm = this;
            
    vm.login = function() {

        var credentials = {
            phone_no: vm.phone_no,
            password: vm.password
        }
        
        // Use Satellizer's $auth service to login
        $auth.login(credentials).then(function(data) {
        	$rootScope.loggedIn = true;
            // If login is successful, redirect to the users state
            $state.go('home');
        });
    }

    vm.logout = function(){
    	$auth.logout().then(function(){
    		$state.go('home');
    	});
    }

}]);
angular.module('checkmate').controller('CategoryProductController', ['$http', '$scope', '$stateParams', function($http, $scope, $stateParams){

	$http.get('/api/list-categories/' + $stateParams.categorySlug + '/products').then(function(response){
		
		$scope.products = response.data;
			
	});

}]);
angular.module('checkmate').controller('HomeController', ['$http', '$scope', '$state', function($http, $scope, $state){

	$http.get('/api/products').then(function(response){
		$scope.products = response.data;
		console.log(response);
		
	});

}]);
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
angular.module('checkmate').controller('SingleProductController', ['$http', '$scope', '$stateParams', function($http, $scope, $stateParams){

	console.log($stateParams);
	$http.get('/api/products/' + $stateParams.productId).then(function(response){
		
		$scope.product = response.data;
			
	});

}]);
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
angular.module('checkmate').controller('UserController', ['$auth', '$state', function($auth, $state){

	

}]);
angular.module('checkmate').directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);
angular.module('checkmate').service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, data){
        var fd = new FormData();
        fd.append('file', file);

        fd.append('data', angular.toJson(data));
        return $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        });
    }
}]);
//# sourceMappingURL=app.js.map
