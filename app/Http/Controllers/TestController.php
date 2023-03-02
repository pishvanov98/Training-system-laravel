<?php

namespace App\Http\Controllers;

use App\Models\AdminTest;
use App\Models\AdminTestAnswer;
use App\Models\AdminTheme;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show($id){

    $test= AdminTest::where('id_tem', '=', $id)->get();
        $test->toArray();

    if (empty($test)){
        return redirect()->route('theme.show',$id);
    }

    $json_decode_test=json_decode($test, true);


        $json_decode_test[0]['test_info']=explode(',',$json_decode_test[0]['test_info']);

        $json_decode_test[0]['test_info'] = str_replace("]", "", $json_decode_test[0]['test_info']);
        $json_decode_test[0]['test_info'] = str_replace("[", "", $json_decode_test[0]['test_info']);
        $json_decode_test[0]['test_info'] = str_replace('"', "", $json_decode_test[0]['test_info']);




        $mass_test=array();
        $quantity='';
        foreach ($json_decode_test[0]['test_info'] as $item){


            if (!str_contains($item, '|')) {
                $quantity=$item;
                continue;
            }else{
                $item=explode('|', $item);
            }


            $mass_test[$quantity][]=$item;

        }
        $count_mass_test=count($mass_test);




        if (AdminTestAnswer::where('id_tem', '=', $id)->count() > 0) {
            $isset_to_table= true;
        }else{
            $isset_to_table = false;
        }


        return view('test', compact('mass_test','count_mass_test','id','isset_to_table') );

    }

    public function store(){

        $id_test_tem=$_POST['id_test_tem'];
        $answer_test=json_encode($_POST['data']);

        if(empty(auth()->id())){
                $data= 0;
        }else{

            if (AdminTestAnswer::where('id_tem', '=', $id_test_tem)->count() > 0) {
                $data= 1;
            }else{
                AdminTestAnswer::create([
                    'id_user'=>auth()->id(),
                    'id_tem'=>$id_test_tem,
                    'answer_test'=>$answer_test,
                ]);
                $data= 2;
            }
        }
        return response()->json($data);

    }

    public function delInfoToTable (){

        $id_test_tem=$_POST['id_test_tem'];

        if(!empty($id_test_tem)){
            AdminTestAnswer::where('id_tem', '=', $id_test_tem)->delete();
        }

    }

}
