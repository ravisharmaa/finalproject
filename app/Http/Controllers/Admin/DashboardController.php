<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;

class DashboardController extends AdminBaseController
{
    protected $view_path = 'cms.dashboard';

    public function __invoke()
    {
        return view(parent::loadDefaultVars($this->view_path. '.index'));
    }

    public function search()
    {
        $search= request('search');
        if(isset($search)){
            $data= Product::where('product_name', 'LIKE', "%$search%")->get();
            return response()->json(json_encode([
                'error' =>false,
                'data'  =>$data,

            ]));
        } else {
            return response()->json(json_encode([
                'error'     => false,
                'message'   => "Could not Complete your request",
            ]));
        }

    }
}
