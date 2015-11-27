<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OtherResourcesController extends Controller {

	public function districts(){
		return \App\User::select('district')->groupBy('district')->get()->toArray();
	}

}
