<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

	protected $table ='likes';

    public function image(){
    	return $this->belowsTo('App\Image', 'image_id');
    }

    public function user(){
    	return $this->belowsTo('App\User', 'user_id');
    }
}
