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
        $mass_test_answer=array();
        $quantity='';
        foreach ($json_decode_test[0]['test_info'] as $item){ // получил массив с вопросом и ответами


            if (!str_contains($item, '|')) {
                $quantity=$item;
                continue;
            }else{
                $item=explode('|', $item);
            }


            $mass_test[$quantity][]=$item;

        }


        foreach ($mass_test as $key => $item_answer){ //получил массив с ответами

            foreach ($item_answer as $key2 => $item_true){

                if($item_true[1] == 'true'){
                    $mass_test_answer[$key]=[$key2 => $item_true[1]];
                }

            }

        }

        $count_mass_test=count($mass_test);

        $mass_test_answer = json_encode($mass_test_answer);
        $mass_test_answer = base64_encode($mass_test_answer);

        if (AdminTestAnswer::where('id_tem', '=', $id)->count() > 0) {
            $isset_to_table= true;
        }else{
            $isset_to_table = false;
        }

        return view('test', compact('mass_test','count_mass_test','id','isset_to_table','mass_test_answer') );

    }

    public function store(){

        $id_test_tem=$_POST['id_test_tem'];
        $answer_test=json_encode($_POST['data']);

        if(empty(auth()->id())){
            $data['result']= 0;
        }else{

            if (AdminTestAnswer::where('id_tem', '=', $id_test_tem)->count() > 0) {
                $data['result']= 1;
            }else{

                if(!empty($_POST['mass_test_answer'])){

                    $mass_test_answer = base64_decode($_POST['mass_test_answer']);
                    $mass_test_answer = json_decode($mass_test_answer);


                     //тут сравниваю 2 массива и узнаю кол-во правильных ответов и записываю в бд

                    AdminTestAnswer::create([
                        'id_user'=>auth()->id(),
                        'id_tem'=>$id_test_tem,
                        'answer_test'=>$answer_test,
                        'answer_count' => '8/8' //answer_count поле с количеством правильных ответов
                    ]);
                    $data['result']= 2;

                    $data['success']= 'Всё ок, вот тебе массив с результатом';

                }


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
