angular.module('checkmate').controller('NavbarController', ['$scope', '$location', '$auth', function($scope, $location, $auth){

	$scope.isActive = function (viewLocation) { 
        return viewLocation === $location.path();
    };
}]);