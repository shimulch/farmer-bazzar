angular.module('checkmate', ['ui.router', 'ui.bootstrap']);


angular.module('checkmate').config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider){
	
	$urlRouterProvider.otherwise("/");
	
	$stateProvider
		.state('home', {
			url: '/',
			templateUrl: '/tpl/home.html'
		})
		.state('about', {
			url: '/about',
			templateUrl:'/tpl/about.html',
			controller: function($scope){
				 $scope.items = ["A", "List", "Of", "Sajid"];
			}
		});

}]);
