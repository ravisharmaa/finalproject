<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;

class DashboardController extends AdminBaseController
{
    protected $view_path = 'cms.dashboard';

    public function __invoke()
    {
        return view(parent::loadDefaultVars($this->view_path. '.index'));
    }

    public function search(Request $request)
    {
        dd($request);
    }
}
