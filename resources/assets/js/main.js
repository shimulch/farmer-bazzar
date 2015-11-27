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
