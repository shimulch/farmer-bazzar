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