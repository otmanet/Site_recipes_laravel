<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image_recipe extends Model
{
    protected $fillable = [ 'id','photo','recipe_id' ];
    // public $timestamps = false;
    use SoftDeletes;
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}