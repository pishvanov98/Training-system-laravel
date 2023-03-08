<?php
namespace App\Http\Controllers;

use App\Models\AdminTest;
use App\Models\AdminTestAnswer;
use Illuminate\Http\Request;

class AccountController extends Controller{

    public function index (){

        if(!empty(auth()->id())){

            $data = AdminTestAnswer::where('id_user', '=', auth()->id())->get();

            $data = $data->toArray();
            $sum=0;
            $count_mass_test=0;
            if (!empty($data)) {

                foreach ($data as $item) {
                    $expl = explode('/', $item['answer_count']);//правильно отмеченых
                    if (empty($sum)) {
                        $sum = (int)$expl[0];
                    } else {
                        $sum = $sum + (int)$expl[0];
                    }

                }
            }
                $tests= AdminTest::all();
                $tests->toArray();
                if(!empty($tests)){

                    foreach ($tests as $test){

                        $json_decode_test=json_decode($test, true);



                        $json_decode_test['test_info']=explode(',',$json_decode_test['test_info']);

                        $json_decode_test['test_info'] = str_replace("]", "", $json_decode_test['test_info']);
                        $json_decode_test['test_info'] = str_replace("[", "", $json_decode_test['test_info']);
                        $json_decode_test['test_info'] = str_replace('"', "", $json_decode_test['test_info']);




                        $mass_test=array();
                        $quantity='';
                        foreach ($json_decode_test['test_info'] as $item){ // получил массив с вопросом и ответами


                            if (!str_contains($item, '|')) {
                                $quantity=$item;
                                continue;
                            }else{
                                $item=explode('|', $item);
                            }


                            $mass_test[$quantity][]=$item;

                        }
                        if(empty($count_mass_test)){
                            $count_mass_test=count($mass_test);
                        }else{
                            $count_mass_test=$count_mass_test + count($mass_test);
                        }
                    }

                }
            $percentage = $sum;
            $totalWidth = $count_mass_test;
if($percentage != 0 || $totalWidth != 0){
    $new_width = ($percentage/$totalWidth) * 100;
}else{
    $new_width = 0;
}

            return view('account', compact('sum', 'count_mass_test','new_width'));
        }else{
            return redirect()->route('home');
        }

    }




}
