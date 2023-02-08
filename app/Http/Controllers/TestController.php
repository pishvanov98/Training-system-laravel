<?php

namespace App\Http\Controllers;

use App\Models\AdminTest;
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



        return view('test', compact('mass_test','count_mass_test') );

    }
}
