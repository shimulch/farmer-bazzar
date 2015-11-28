angular.module('checkmate', ['ui.router', 'ui.bootstrap', 'satellizer', 'angular-loading-bar', 'angular-input-stars']);


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
	    .state('search', {
	        url: "/search?main_category&distrcit&search",
	        templateUrl: '/tpl/search.html',
	        controller: 'SearchController',
	        reload: true
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
		.state('edit', {
			url: '/edit',
			templateUrl:'/tpl/edit.html',
			controller: 'UserController'
		});

}]);
