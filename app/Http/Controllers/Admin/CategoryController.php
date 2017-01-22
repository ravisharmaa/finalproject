<?php

namespace App\Http\Controllers\Admin;

use App\Classes\AppHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Model\Category;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;
use File;

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
        $this->extra_values['title']        =   'category';
        $cat_data   =  DB::table('category')->where('parent_id', null)->get();
        return view (parent::loadDefaultVars($this->view_path .'.index', $this->extra_values),compact('cat_data'));
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
//                $upload_folder          = $request->get('parent_id')==''?$this->upload_folder:$this->upload_folder.'.sub-category/';
                $imageName              =  AppHelper::imageProcessor($image,$this->upload_folder,$imgDms);

                Category::create([
                    'name'          =>  $request->get('name'),
                    'description'   =>  $request->get('description'),
                    'rank'          =>  $request->get('rank'),
                    'status'        =>  $request->get('status'),
                    'parent_id'     =>  $request->get('parent_id')==''?null:$request->get('parent_id'),
                    'slug'          =>  str_slug($request->get('name')),
                    'child_type'    =>  $request->get('child_type'),
                    'image'         =>  $imageName
                ]);
                return redirect()->route($this->base_route.'.index')->with('message', Lang::get('response.CUSTOM_SUCCESS_MESSAGE'),
                    [
                        'message'=>'New Sub-Category Has Been Created Successfully'
                    ]);

            }
    }

    public function subCatIndex($slug)
    {
        $data       = [];
        $data['parent']         =   Category::where('slug', $slug)->first();
        $data['child']          =   Category::where('parent_id',$data['parent']->id)->get();
        $this->view_path= 'cms.category.sub-category';
        if($data['parent']->child_type=='product'){
            $view_path= 'cms.product.create';
            return view(parent::loadDefaultVars($view_path),compact('data'));
        } else {
            return view(parent::loadDefaultVars($this->view_path.'.index'),compact('data'));
        }

    }

    public function subForm($cat_name)
    {
        $data            =   Category::findOrFail($cat_name);
        $this->view_path = 'cms.category.sub-category';
        return view(parent::loadDefaultVars($this->view_path.'.create_sub-cat'),compact('data'));
    }

    public function subChildIndex($id)
    {
        $data=      [];
        $data['parent'] = DB::table('category')->where('slug',$id)->first();
        $data['child']  = Category::where('parent_id',$data['parent']->id)->get();
        $view_path= $this->view_path. '.' .'sub-category'.'.' .'sub-child';
        return view(parent::loadDefaultVars($view_path.'.index'),compact('data'));
    }

    public function subChildCreate($id)
    {
        $data= Category::findOrfail($id);
        $view_path= 'cms.category.sub-category.sub-child';
        return view(parent::loadDefaultVars($view_path.'.create'),compact('data'));
    }


    public function edit($id)
    {
        $data= [];
        $data['main']   =   Category::findOrFail($id);
        $data['sub']    =   Category::select('id','name')->where('parent_id',null)->pluck('name','id');
        return view(parent::loadDefaultVars($this->view_path.'.edit'),compact('data'));
    }

    public function update(Request $request, $id)
    {

        $data= Category::findOrFail($id);
        $imgDms =   [];
        $imgDms['height']   =200;
        $imgDms['width']    =200;
        if($request->hasFile('image'))
        {
           $this->deleteImageFile($data->image);
           $imageName= AppHelper::imageProcessor($request->file('image'),$this->upload_folder,$imgDms);
           $data->image= $imageName;
        }

        $data->name         =   $request->get('name');
        $data->description  =   $request->get('description');
        $data->status       =   $request->get('status');
        $data->child_type   =   $request->get('child_type');
        $data->parent_id    =   $request->get('parent_id')==''?null:$request->get('parent_id');
        $data->save();
        return redirect()->back();

    }

    public function deleteImageFile($data)
    {
        if(File::exists($this->upload_folder. $data)){
             return File::delete($this->upload_folder.$data);
        } else {
            return false;
        }
    }


}
