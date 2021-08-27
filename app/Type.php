<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    //
     use SoftDeletes;
     protected $fillable = [ 'id','name','name_ar' ];
     public function recipe()
     {
     return $this->hasMany('App\Recipe');
     }
}