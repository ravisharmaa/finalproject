<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Model\Product;
use App\Model\Image;
use File;

class ProductController extends AdminBaseController
{
    protected $upload_folder = 'uploads/product/';
    protected $view_path    =   'cms.product';
    protected $base_route   =   'cms.product';

    public function index()
    {
        $data= Product::orderBy('id')->with('images')->with('category')->get();
//        $data= Product::select('category.name as cname','category.description as cdes','product.product_name','product.product_description','product.id','product.wholesell_price','product.retail_price','product.status','product_image.image','product_image.id')
//                ->leftJoin('category','category.id','=','product.category_id')
//                ->leftJoin('product_image','product_image.product_id','=','product.id')
//                ->with('images')->with('category')
//                ->get();

        return view(parent::loadDefaultVars($this->view_path.'.index'),compact('data'));

    }

    public function store(Request $request)
    {

        $data=   Product::create([
            'product_name'          => $request->get('product_name'),
            'product_description'   => $request->get('product_description'),
            'wholesell_price'       =>  $request->get('wholesell_price'),
            'retail_price'          =>  $request->get('retail_price'),
            'status'                =>  $request->get('status'),
            'category_id'           =>  $request->get('category_id')

        ]);
        foreach ($request->file('image') as $image){
            $filename   =   $image->getClientOriginalName();
            $filename   =   pathinfo($filename, PATHINFO_FILENAME);
            $imageName  =   str_slug($filename).'.'.$image->getClientOriginalExtension();
            if(is_dir($this->upload_folder)==false){
                File::makeDirectory($this->upload_folder, 0777, true);
            }
            $image->move($this->upload_folder, $imageName);
            \DB::table('product_image')->insert([
                'product_id'    => $data->id,
                'image'         => $imageName,
            ]);
        }
        return redirect()->route('cms.category.index');
    }

    public function show($id)
    {
        $data= Product::findOrFail($id);
        return view(parent::loadDefaultVars($this->view_path.'.show'),compact('data'));
    }

    public function edit($id)
    {
        $data= Product::findOrFail($id);
        return view(parent::loadDefaultVars($this->view_path.'.edit'),compact('data'));
    }
}
