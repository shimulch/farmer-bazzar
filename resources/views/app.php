<html ng-app="checkmate">
	<head>
		<title>Laravel</title>
		
		<link rel="stylesheet" type="text/css" href="/css/app.css">

	</head>
	<body>

		<nav class="navbar navbar-default" ng-controller="NavbarController">
	        <div class="container">
	            <div class="navbar-header">
	                <a class="navbar-brand" href="/">Farmar Bazzar</a>
	            </div>

	            <ul class="nav navbar-nav navbar-right">
	                <li ng-class="{ active: isActive('/')}"><a href="#"><i class="fa fa-home"></i> Home</a></li>
	                

	                <li ng-hide="loggedIn" ng-class="{ active: isActive('/login')}"><a ui-sref="login">Login</a></li>
	                <li ng-hide="loggedIn" ng-class="{ active: isActive('/register')}"><a ui-sref="register">Register</a></li>
	                <li ng-show="loggedIn" ng-class="{ active: isActive('/logout')}"><a ui-sref="logout">Logout</a></li>
	            </ul>
	        </div>
        </nav>

		<div ui-view></div>
		
	</body>

	<script src="/js/vendor.js"></script>
	<script src="/js/app.js"></script>
</html>
