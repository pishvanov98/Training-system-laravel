<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminTheme;
use function view;

class IndexController extends Controller
{
    public function index (){

        $themes=AdminTheme::all();

        return view('admin.theme.index', compact('themes'));
    }

    public function create (){

        return view('admin.theme.create');
    }
}
