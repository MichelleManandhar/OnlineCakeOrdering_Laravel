<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function index(){
        return view('pages.index');
    }

    public function cake(){
        return view('cakes.index');
    }

    public function about(){
        return view('pages.about');
    }
}
