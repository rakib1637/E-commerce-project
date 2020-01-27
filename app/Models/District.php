<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function divisions(){
    	$this->belongsTo(Division::class);
    }
}
