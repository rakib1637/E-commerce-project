<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	//database relation
    public function images(){
    	 return $this->hasMany(productImage::class);
    }

    public function category(){
    	 return $this->belongsTo(category::class);
    }
    public function brand(){
    	return $this->belongsTo(brands::class);
    }
    
}
