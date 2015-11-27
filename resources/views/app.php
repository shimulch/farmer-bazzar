<html ng-app="checkmate">
	<head>
		<title>Laravel</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
	    			<li ng-show="loggedIn" ng-class="{ active: isActive('/upload-product')}"><a ui-sref="upload-product">Upload New Product</a></li>
	                <li ng-show="loggedIn" ng-class="{ active: isActive('/logout')}"><a ui-sref="logout">Logout</a></li>
	            </ul>
	        </div>
        </nav>


        <div class="container">
        	<div class="row">
        		<div class="col-md-2">
        			<ul class="nav nav-pills nav-stacked">
						<li ng-repeat="category in categories">
							<a href="{{category.slug}}">{{category.title}}</a>
						</li>
					</ul>
        		</div>
        		<div class="col-md-10">
        			<div ui-view></div>
        		</div>
        	</div>
        </div>
		
		
	</body>

	<script src="/js/vendor.js"></script>
	<script src="/js/app.js"></script>
</html>
