angular.module('checkmate', ['ui.router', 'ui.bootstrap', 'satellizer', 'angular-loading-bar']);


angular.module('checkmate').config(['$stateProvider', '$urlRouterProvider', '$authProvider', function ($stateProvider, $urlRouterProvider, $authProvider){
	
	$authProvider.loginUrl = '/api/authenticate';

	$urlRouterProvider.otherwise("/");
	
	$stateProvider
		.state('home', {
			url: '/',
			templateUrl: '/tpl/home.html'
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
        
        console.log(credentials);
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
angular.module('checkmate').controller('NavbarController', ['$scope', '$location', '$auth', function($scope, $location, $auth){

	$scope.isActive = function (viewLocation) { 
        return viewLocation === $location.path();
    };
}]);
angular.module('checkmate').controller('RegisterController', ['$http', '$scope', function($http, $scope){

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
				
			}).error(function(response){
				$scope.formErrors = response.errors;
			});
	}

}]);
angular.module('checkmate').controller('UserController', ['$auth', '$state', function($auth, $state){

	

}]);
//# sourceMappingURL=app.js.map
