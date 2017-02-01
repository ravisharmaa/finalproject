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
        $data = Test::where('name','Parent Category')->get();
        return view(parent::loadDefaultVars($this->view_path.'.index'), compact('data'));
    }

    public function create()
    {
       return view(parent::loadDefaultVars($this->view_path.'.create'));
    }

    public function store(Request $request)
    {
        $root = Test::create([
            'parent_name'    =>  $request->get('name'),
            'name'           =>  'Parent Category',
            'parent_slug'    =>   str_slug($request->get('name')),
        ]);
        return redirect()->route($this->base_route.'.index');
    }

    public function createChild($slug)
    {

    }

}
