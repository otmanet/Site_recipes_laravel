<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    // public $timestamps = false;
    use SoftDeletes;
    protected $fillable = [ 'id','recipe_name','recipe_description','type_id' ];

    public function type()
    {
    return $this->belongsTo('App\Type');
    }
    public function image_recipe()
    {
        return $this->hasMany('App\Image_recipe');
    }
    public function ingredient()
    {
        return $this->hasMany('App\Ingredient');
    }
    public function step()
    {
    return $this->hasMany('App\Step');
    }

}