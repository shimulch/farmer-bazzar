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
	                
	                <li ng-show="loggedIn" ng-class="{ active: isActive('/edit')}"><a ui-sref="edit">Edit</a> </li>
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
						<li ng-repeat="category in categories" ui-sref-active="active">
							<a ui-sref="singleCategory({categorySlug:category.slug})">{{category.title}}</a>
						</li>
					</ul>
        		</div>
        		<div class="col-md-10">

        			<div class="row searchWrapper">
        				<form ng-controller="SearchBoxController" class="form-horizontal">
	        				

						    <div class="row">

						    	<div class="col-md-4">
						    		<div class="form-group">
										<label for="main_category" class="col-sm-4 control-label">পণ্যের ধরন</label>
										<div class="col-sm-8">
											<select class="form-control" ng-change="search()" id="main_category" ng-model = "main_category" ng-change="findSubCategory()">
												<option ng-repeat="category in categories" value="{{category.id}}">{{category.title}}</option>
											</select>
										</div>

									</div>
						    	</div>

						    	<div class="col-md-4">
						    		<div class="form-group">
						    			
						    			<label for="main_category" class="col-sm-4 control-label">জেলা</label>
										<div class="col-sm-8">	
											<select class="form-control" ng-change="search()" id="district" ng-model="district">
												<option ng-repeat="district in districts" value="{{district.district}}">{{district.district}}</option>
											</select>
										</div>
										
									</div>
						    	</div>

						    	<div class="col-md-4">
						    		<div class="input-group">
								      <input type="text" class="form-control"  ng-model="searchText">
								      <span class="input-group-btn">
								        <button class="btn btn-default" ng-click="search()" type="submit">অনুসন্ধান</button>
								      </span>
								    </div><!-- /input-group -->
						    	</div>

						    </div>
						    <div class="row">
						    	<div class="col-md-12">
								    <button ng-click='previousPage()' class="btn btn-info pull-left">Previous</button>
									<button ng-click='nextPage()' class="btn btn-info pull-right">Next</button>
								</div>
							</div>
					    </form>
        			</div>

        			<div ui-view></div>
        		</div>
        	</div>
        </div>
		
		
	</body>

	<script src="/js/vendor.js"></script>
	<script src="/js/app.js"></script>
	<script type="text/javascript">$('.datepicker').datepicker();</script>
</html>
