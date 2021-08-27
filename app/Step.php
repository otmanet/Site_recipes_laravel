<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
     use SoftDeletes;
     protected $fillable = ['id', 'desc_steps', 'recipe_id'];
     public function recipe()
     {
     return $this->belongsTo('App\Recipe');
     }
}
