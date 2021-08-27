<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'desc_integeredient', 'recipe_id'];
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
