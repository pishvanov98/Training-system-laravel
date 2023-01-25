<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminCreateImage;
use Faker\Core\File;
use Illuminate\Http\Request;
use function redirect;

class ImageController extends Controller
{
    public function upload(Request $request){

        $file= $request->file('image_upload')->store('uploads','public');
        $file_name = $request->file('image_upload')->getClientOriginalName();//получаю имя картинки

        AdminCreateImage::create([  //загрузил в таблицу имя загруженной картинки на сервыр и имя выбранной картинки
            'image_to_server'=>$file,
            'image_select'=>$file_name
        ]);

       return redirect()->route('admin.image');
    }

    public function index(){

       $images= AdminCreateImage::all();

       if(count($images) == 0){
           $images = false;
       }

        return view('admin.image.index', compact('images'));
    }


    public function destroy(){

            if($_POST['image']){
                $id=(int)$_POST['image'];
                $image= AdminCreateImage::findOrFail($id);//получили по id данные колонки
                $image_arr= $image->toArray();
                if(\File::exists(public_path('img/'.$image_arr['image_to_server']))){
                    \File::delete(public_path('img/'.$image_arr['image_to_server']));
                }
                $image->delete();//удалил колонку
            }
        return redirect()->route('admin.image');
    }

}
