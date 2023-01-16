<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminCategoryTheme;
use App\Models\AdminCreateImage;
use App\Models\AdminTheme;
use function view;

class IndexController extends Controller
{
    public function index (){

        $data=AdminTheme::all();

        return view('admin.theme.index', compact('data'));
    }

    public function create (){

        $categories=AdminCategoryTheme::all();
        $images=AdminCreateImage::all();
        if (count($categories) == 0){
            $categories= false;
        }
        if (count($images) == 0){
            $images= false;
        }
        return view('admin.theme.create', compact('categories','images'));
    }

    public function store (){
        $data= request()->validate([
        'name_theme'=>'filled', //filled проверка на существование данных
        'category'=>'filled',
        'image'=>'filled',
        'small_description'=>'filled',
        'full_description'=>'filled',
        ]);
       AdminTheme::create($data);
       return redirect()->route('admin.theme');
    }

    public function edit ($id){

       $data= AdminTheme::findOrFail($id);
        $categories=AdminCategoryTheme::all();
        $images=AdminCreateImage::all();
        if (count($categories) == 0){
            $categories= false;
        }
        if (count($images) == 0){
            $images= false;
        }
       return view('admin.theme.edit',compact('data','categories','images') );
    }

    public function update ($id) {
        $data= request()->validate([
            'name_theme'=>'filled',
            'category'=>'filled',
            'image'=>'filled',
            'small_description'=>'filled',
            'full_description'=>'filled',
        ]);
        $them= AdminTheme::findOrFail($id);//получили по id данные колонки
        $them->update($data);//обновили колонку
        return redirect()->route('admin.theme');
    }
    public function destroy ($id) {
        $them= AdminTheme::findOrFail($id);//получили по id данные колонки
        $them->delete();//удалил колонку
        return redirect()->route('admin.theme');
    }

}
