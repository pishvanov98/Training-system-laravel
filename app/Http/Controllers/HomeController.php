<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use function view;

class HomeController extends Controller
{
    public function index (){
        return view('home');
    }
}
