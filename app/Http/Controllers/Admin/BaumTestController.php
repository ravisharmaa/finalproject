<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Model\Test;

class BaumTestController extends AdminBaseController
{
    protected $view_path    =   'cms.baum';
    protected $base_route   =   'cms.baum';

    public function index()
    {
        return view(parent::loadDefaultVars($this->view_path.'.index'));
    }

    public function create()
    {
       return view(parent::loadDefaultVars($this->view_path.'.create'));
    }

    public function store(Request $request)
    {
        $root = Test::create([
                'parent_name'    =>  $request->get('name'),
                'name'           =>   'Parent Category',
                ]);
        return redirect()->route($this->base_route.'.index');

    }

}
