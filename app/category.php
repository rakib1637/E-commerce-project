<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
 public function parent(){
 	return $this->belongsTo(category::class, 'parent_id');
 }
}
