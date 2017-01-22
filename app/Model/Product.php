<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table        = 'product';
    protected $fillable     =   ['id','category_id','product_name','product_description','wholesell_price','retail_price','status'];


    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Model\Image');
    }
}
