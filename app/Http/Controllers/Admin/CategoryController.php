<?php

namespace App\Http\Controllers\Admin;

use App\Classes\AppHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Model\Category;
use Illuminate\Support\Facades\Lang;

class CategoryController extends AdminBaseController
{
    protected $view_path        = 'cms.category';
    protected $base_route       = 'cms.category';
    protected $extra_values     = [];
    protected $upload_folder;


    public function __construct()
    {
        $this->upload_folder    =   config('doublard.backend.uploads.upload_folder');
        parent::__construct();
    }

    public function index()
    {
        return view (parent::loadDefaultVars($this->view_path .'.index'));
    }

    public function create()
    {
        $this->extra_values['title']        =   'category';
        return view(parent::loadDefaultVars($this->view_path.'.create',$this->extra_values));
    }

    public function store(Request $request)
    {
        if($request->hasFile('image'))
        {
            $imgDms =   [];
            $imgDms['height']   =200;
            $imgDms['width']    =200;
            $image                  =  $request->file('image');
            $imageName              =  AppHelper::imageProcessor($image,$this->upload_folder,$imgDms);

            Category::create([
                'name'          =>  $request->get('name'),
                'description'   =>  $request->get('description'),
                'rank'          =>  $request->get('rank'),
                'status'        =>  $request->get('status'),
                'parent_id'     =>  null,
                'child_type'    =>  $request->get('child_type'),
                'image'         =>  $imageName
            ]);
            return redirect()->route($this->base_route.'.index')->with('message', Lang::get('response.CUSTOM_MESSAGE_SUCCESS'),
                [
                    'message'=>'New Category Has Been Created Successfully'
                ]);

        }

    }



}
