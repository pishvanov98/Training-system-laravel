<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;

use App\Models\AdminTest;
use App\Models\AdminTestAnswer;
use App\Models\AdminTheme;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use function redirect;

class UserController extends Controller
{


    public function index(){


       $users= User::all();
       $mass_user=array();
       if(!empty($users)){


           $tests= AdminTest::all();
           $tests->toArray();
           if(!empty($tests)){
               $count_mass_test=0;
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


           foreach ($users->toArray() as $item_user){

               $data = AdminTestAnswer::where('id_user', '=', $item_user['id'])->get();

               $data = $data->toArray();
               $sum=0;


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



               $mass_user[]=array($item_user['id'],$item_user['name'],$sum,$count_mass_test);
           }

       }






    return view('admin.users.index',compact('mass_user'));

    }


}
