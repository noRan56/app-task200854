<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title ="welcome to Home ";
        return view('Pages.index' )->with('title',$title);
        //return"index";
    }
    public function about(){
        $title = "Welcome To About";
        return view('Pages.about' , compact('title'));
    }

    public function features(){
        $data = array(
            'title'=>'features',
            'features'=>['create Post','Upload Media ']
        );
        return view('Pages.features')->with($data);
    }
}
