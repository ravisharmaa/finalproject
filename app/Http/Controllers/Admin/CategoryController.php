<?php

namespace App\Http\Controllers\Admin;

use App\Classes\AppHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Model\Category;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;

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
        if(!empty($request->get('parent_id'))){
            if($request->hasFile('image'))
            {
                $imgDms =   [];
                $imgDms['height']   =200;
                $imgDms['width']    =200;
                $image                  =  $request->file('image');
                $upload_folder          = $this->upload_folder.'sub-category';
                $imageName              =  AppHelper::imageProcessor($image,$upload_folder,$imgDms);

                Category::create([
                    'name'          =>  $request->get('name'),
                    'description'   =>  $request->get('description'),
                    'rank'          =>  $request->get('rank'),
                    'status'        =>  $request->get('status'),
                    'parent_id'     =>  $request->get('parent_id'),
                    'child_type'    =>  $request->get('child_type'),
                    'image'         =>  $imageName
                ]);
                return redirect()->route($this->base_route.'.index')->with('message', Lang::get('response.CUSTOM_SUCCESS_MESSAGE'),
                    [
                        'message'=>'New Sub-Category Has Been Created Successfully'
                    ]);

            }
        } else {
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
                return redirect()->route($this->base_route.'.index')->with('message', Lang::get('response.CUSTOM_SUCCESS_MESSAGE'),
                    [
                        'message'=>'New Category Has Been Created Successfully'
                    ]);

            }
        }


    }

    public function subCatIndex($slug)
    {
        $this->view_path= 'cms.category.sub-category';
//        $data=   DB::table('category as root')
//                ->select('name as root_name',
//                        'down1.name as down1_name',
//                        'down2.name as down2_name',
//                        'down3.name as down3_name')
//                ->join('category as down1',
//                        'down1.parent_id','=','root.id',
//                        'left outer')
//                ->join('category as down2',
//                        'down2.parent_id','=','down1.id',
//                        'left outer')
//                ->join('category as down3',
//                        'down3.parent_id','=','down2.id',
//                        'left outer')
//                ->where('root.parent_id','=',null)
//                ->toSql();

//        $data=   DB::table('category as root')
//                ->select('name as root_name',
//                        'down1.name as down1_name')
//                ->join('category as down1',
//                        'down1.parent_id','=','root.id',
//                        'left outer')->tosql();
//        dd($data);
        $data=  DB::table('category')
                ->select('id','name')
                ->where('slug', $slug)->first();
        return view(parent::loadDefaultVars($this->view_path.'.index'),compact('data'));
    }

    public function subForm($cat_name)
    {
        $data   =   Category::findOrFail($cat_name);
        $this->view_path = 'cms.category.sub-category';
        return view(parent::loadDefaultVars($this->view_path.'.create_sub-cat'),compact('data'));
    }




}
