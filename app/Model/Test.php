<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Baum;

class Test extends Baum\Node
{
    protected $table        = 'baum_test';

    protected $parentColumn = 'parent_id';

    protected $leftColumn   =   'lft';

    protected $rightColumn  =   'rgt';

    protected $depthColumn =    'depth';

    protected $guarded      = ['id','parent_id','lft','rgt','depth'];

    protected $fillable     =   ['parent_name','name'];
}
