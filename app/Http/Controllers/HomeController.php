<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminTheme;
use function view;

class HomeController extends Controller
{
    public function index (){

       $themes= AdminTheme::all();

        return view('home', compact('themes'));
    }
}
