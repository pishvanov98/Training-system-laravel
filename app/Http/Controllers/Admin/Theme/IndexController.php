<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminTheme;
use function view;

class IndexController extends Controller
{
    public function index (){

        $data=AdminTheme::all();

        return view('admin.theme.index', compact('data'));
    }

    public function create (){

        return view('admin.theme.create');
    }

    public function store (){
        $data= request()->validate([
        'name_theme'=>'',
        'category'=>'',
        'image'=>'',
        'small_description'=>'',
        'full_description'=>'',
        ]);
       AdminTheme::create($data);
       return redirect()->route('admin.theme');
    }

    public function edit ($id){

       $data= AdminTheme::findOrFail($id);

       return view('admin.theme.edit',compact('data') );
    }

    public function update ($id) {
        $data= request()->validate([
            'name_theme'=>'',
            'category'=>'',
            'image'=>'',
            'small_description'=>'',
            'full_description'=>'',
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
