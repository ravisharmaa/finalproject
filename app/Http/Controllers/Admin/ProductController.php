<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Model\Product;
use File;

class ProductController extends AdminBaseController
{
    protected $upload_folder = 'uploads/product/';
    protected $view_path    =   'cms.product';
    protected $base_route   =   'cms.product';

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
}
