<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminTheme;
use function view;

class HomeController extends Controller
{
    public function index (){

       $themes= AdminTheme::all();


       $breadcrumb=[
         'Главная'=>route('home')
       ];

        return view('home', compact('themes','breadcrumb'));
    }

    public function show ($id){

       $them= AdminTheme::findOrFail($id);

        $breadcrumb=[
            'Главная'=>route('home'),
            $them->name_theme=>route('theme.show',$id)
        ];


       return view('them', compact('them','breadcrumb'));

    }

}
