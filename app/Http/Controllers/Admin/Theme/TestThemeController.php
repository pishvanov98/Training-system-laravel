<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminCategoryTheme;
use App\Models\AdminTest;
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

    public function store(){

        if(!empty($_POST['data']) && !empty($_POST['id'])){
            $mass_test=$_POST['data'];
            $id_tem=$_POST['id'];

            AdminTest::create([
                'id_tem' => $id_tem,
                'test_info' => $mass_test
            ]);
            return response()->json(['info'=>'Тест успешно добавлен']);
        }

        return response()->json(['info'=>'Ошибка']);


    }



}
