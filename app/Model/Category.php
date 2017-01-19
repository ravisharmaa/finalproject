<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table        =   'category';
    protected $fillable     =   ['id','parent_id','name','description','rank','status','image','child_type'];
}
