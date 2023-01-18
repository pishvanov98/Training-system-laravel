<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminCategoryTheme;
use App\Models\AdminTheme;


class TestThemeController extends Controller
{
    public function index (){

        $themes = AdminTheme::all();

        if (count($themes) == 0){
            $themes = false;
        }
        return view('admin.test.index', compact('themes'));

    }

    public function create (){

        if(!empty($_GET['them'])){

            $id_them=$_GET['them'];
            return view('admin.test.create', compact('id_them'));
        }
        return redirect()->route('admin.test');
    }


}
