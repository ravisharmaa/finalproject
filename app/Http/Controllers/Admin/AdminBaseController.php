<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class AdminBaseController extends AppBaseController
{
    protected $base_route;
    protected $view_path;
    protected $table;
    protected $css_path;
    protected $js_path;
    protected $master;
    protected $title;
    protected $upload_folder;

    public function __construct()
    {
        $this->css_path =   config('doublard.backend.assets_path.css_path');
        $this->js_path  =   config('doublard.backend.assets_path.js_path');
        $this->master   =   config('doublard.backend.page_paths.master');
        $this->middleware('auth');

    }

    protected function loadDefaultVars($view_path,$extra_values=null)
    {
        View::composer($view_path, function($view) use ($view_path, $extra_values){
            $view->with('base_route',   $this->base_route);
            $view->with('css_path',     $this->css_path);
            $view->with('js_path',      $this->js_path);
            $view->with('view_path',    $this->view_path);
            $view->with('table',        $this->table);
            $view->with('master',       $this->master);
            $view->with('upload_folder', $this->upload_folder);
            $view->with('extra_values',  $extra_values);
        });
        return $view_path;
    }
}
