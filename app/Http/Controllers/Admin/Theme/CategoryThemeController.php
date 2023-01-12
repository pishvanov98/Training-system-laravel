<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminCategoryTheme;


class CategoryThemeController extends Controller
{
    public function index (){
        $data=AdminCategoryTheme::all();

      return view('admin.categoryTheme.index', compact('data'));
    }

    public function destroy ($id) {
        $category_them= AdminCategoryTheme::findOrFail($id);//получили по id данные колонки
        $category_them->delete();//удалил колонку
        return redirect()->route('admin.category');
    }
    public function create(){
        return view('admin.categoryTheme.create');
    }
    public function store (){
        $data= request()->validate([
            'name_category'=>''
        ]);
        AdminCategoryTheme::create($data);
        return redirect()->route('admin.category');
    }


}
