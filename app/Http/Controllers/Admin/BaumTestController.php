<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Model\Test;
use Baum;

class BaumTestController extends AdminBaseController
{
    protected $view_path    =   'cms.baum';
    protected $base_route   =   'cms.baum';

    public function index()
    {
        $data   =   Test::where('name','Parent Category')->get();
        return view(parent::loadDefaultVars($this->view_path.'.index'), compact('data'));
    }

    public function create()
    {
       return view(parent::loadDefaultVars($this->view_path.'.create'));
    }

    public function store(Request $request, $slug=null)
    {
        if($slug==null){
            $root = Test::create([
                'parent_name'    =>  $request->get('name'),
                'name'           =>  'Parent Category',
                'parent_slug'    =>   str_slug($request->get('name')),
            ]);
        } else {
            $root   = Test::where('parent_slug',$slug)->first();
            $child1 = $root->children()->create([
                'parent_name'   =>  $root->parent_name,
                'name'          =>  $request->get('name'),
            ]);
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function createChild($slug)
    {
        $parent_data = Test::where('parent_slug', $slug)->first();
        return view (parent::loadDefaultVars($this->view_path.'.create'), compact('parent_data'));
    }

    public function renderHtml($index)
    {
        $data           =   [];
        $data['index']  =   integerValue($index);
        $data['html']   =   view($this->view_path.'.partials._render_form', compact($data))->render();
        return response(json(json_encode($data)));
    }



}
