<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use function view;

class IndexController extends Controller
{
    public function __invoke (){
        return view('admin.theme.index');
    }
}
