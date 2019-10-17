<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	//database relation
    public function image(){
    	 return $this->hasOne('App\productImage');
    }
}
