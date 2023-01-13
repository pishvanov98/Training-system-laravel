<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\AdminCreateImage;
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
        return view('admin.image.index');
    }

}
