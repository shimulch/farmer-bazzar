<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return view('app');
});

Route::get('/test', function() {
	 $categories = \App\Category::all();
	 dd($categories);
});

Route::group(['prefix' => 'api'], function()
{

    Route::post('register', 'AuthenticateController@register');
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('user-data', 'AuthenticateController@userData');
    Route::post('change-profile-picture', 'AuthenticateController@changeProfilePicture');
    
    Route::get('products/search', 'ProductController@search');
    Route::resource('list-categories', 'CategoryController', ['except' => ['store', 'update', 'create']]);
    Route::resource('list-categories.products', 'ProductController', ['except' => ['show', 'store', 'update', 'create']]);
    Route::get('products', 'ProductController@allProducts');
    Route::get('products/{id}', 'ProductController@show');
    
    Route::resource('products.ratings', 'RatingController', ['except' => ['create', 'update', 'edit', 'delete']]);
    Route::post('products', 'ProductController@store');

    Route::get('districts', 'OtherResourcesController@districts');
});
