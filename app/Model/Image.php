<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table    =   'product_image';
    protected $fillable = ['id','product_id','image'];

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
}
