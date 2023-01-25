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

        $tests = AdminTest::all();

        if (count($themes) == 0){
            $themes = false;
        }
        if (count($tests) == 0){
            $tests = false;
        }
        return view('admin.test.index', compact('themes','tests'));

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
            $SelectTem= AdminTheme::findOrFail([$id_tem]);
            $SelectTemMass= $SelectTem->toArray();
            AdminTest::updateOrCreate([  //проверка если тема существует уже в таблице, обновляем иначе создаем
                'id_tem' => $id_tem],
                ['id_tem' => $id_tem,
                'test_info' => $mass_test,
                'name_tem' => $SelectTemMass[0]['name_theme']]);
            return response()->json(['info'=>'Тест успешно добавлен']);
        }

        return response()->json(['info'=>'Ошибка']);


    }


    public function destroy(){

        if(!empty($_POST['test'])){
            $id=(int)$_POST['test'];
            $test= AdminTest::findOrFail($id);//получили по id данные колонки
            $test->delete();//удалил колонку
            return redirect()->route('admin.test');
        }


    }



}
