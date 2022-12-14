<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminTheme;
use function view;

class IndexController extends Controller
{
    public function index (){

        $test=AdminTheme::all();
        dd($test);

        return view('admin.theme.index');
    }
}
