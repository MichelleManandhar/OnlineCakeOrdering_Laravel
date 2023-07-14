<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cake;
use App\Order;
use App\User;
use Auth;
use function GuzzleHttp\Promise\all;
use App\CakeDesign;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::find(auth()->user()->id);
        if($users->admin == 1){
            return view('admin.dashboard');
        }
        return view('pages.index');
        
    }

    public function cake(){
        
        $cakes = Cake::all();
        $users = User::find(auth()->user()->id);

        if($users->admin == 1){
            return view('admin.cake.index')->with('cakes', $cakes);
        }
        return view('pages.index');
        
    }
    
    public function order(){
        $orders = Order::all();
        $users = User::find(auth()->user()->id);

        if($users->admin == 1){
            return view('admin.order')->with('orders', $orders);
        }
        return view('pages.index');
        
    }

    public function design(){
        $designs = CakeDesign::all();
        $users = User::find(auth()->user()->id);

        if($users->admin == 1){
            return view('admin.design.index')->with('designs', $designs);
        }
        return view('pages.index');
        
    }
}
