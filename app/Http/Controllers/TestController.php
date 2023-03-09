<?php

namespace App\Http\Controllers;

use App\Models\AdminTest;
use App\Models\AdminTestAnswer;
use App\Models\AdminTheme;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show($id){

        $them= AdminTheme::findOrFail($id);

        $breadcrumb=[
            'Главная' => route('home'),
            $them->name_theme => route('theme.show',$id),
            'Тестирование' => route('test.show',$id)
        ];

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

        $j= 0;
        foreach ($mass_test as $key => $item_answer){ //получил массив с ответами
            $j++;
            foreach ($item_answer as $key2 => $item_true){

                if($item_true[1] == 'true'){
                    $mass_test_answer[$j]=[$key2 => $item_true[1]];
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

        return view('test', compact('mass_test','count_mass_test','id','isset_to_table','mass_test_answer','breadcrumb') );

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
                    $mass_test_answer = json_decode($mass_test_answer, true);

                    $answer_test_no_encode= $_POST['data'];
                    $answer_count=0;
                    $answer_test_html='<div class="test_answer_block_modal">';
                    foreach ($answer_test_no_encode as $item){     //ищу правильный ключ ответа зная ответы пользователя

                      if(!empty($mass_test_answer[$item[0]][$item[1]])){
                          $answer_test_html .='<div><span class="item_test_answer_modal">'.$item[0].'</span><span>+</span></div>';
                          $answer_count++;
                      }else{
                          $answer_test_html .='<div><span class="item_test_answer_modal">'.$item[0].'</span><span>-</span></div>';
                      }

                    }
                    $answer_test_html .= '</div>';



                    AdminTestAnswer::create([
                        'id_user'=>auth()->id(),
                        'id_tem'=>$id_test_tem,
                        'answer_test'=>$answer_test,
                        'answer_count' => $answer_count.'/'.count($_POST['data']) //answer_count поле с количеством правильных ответов
                    ]);
                    $data['result']= 2;

                    $data['success']= $answer_test_html;

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
