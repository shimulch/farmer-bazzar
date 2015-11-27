<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $dates = ['created_at', 'updated_at', 'expiry_date'];
	
	public function category(){
		return $this->belongsTo('App\Category');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

}
