<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\CakeDesign;
use App\Cake;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $designs = new CakeDesign();
        $designs = CakeDesign::all();
        return view('order.index')->with('designs', $designs);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cake_id = $request->input('cake_id');
        $user_id = auth()->user()->id;

        $user = User::find($user_id);
        $cakes = Cake::find($cake_id);
        $designs = new CakeDesign();
        $designs = CakeDesign::all();
        $order = new Order();
        

        $order->user_id = auth()->user()->id;
        $order->cake_id = $cake_id;
        
        $order->save();
        
        return view('order.index')->with('designs', $designs)->with('cakes', $cakes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $orders = Order::all();
       foreach($orders as $order){
           if($order->quantity == null){
               $order->delete();
           }
       }

        return redirect("/cakes");
    }

    public function save_design(Request $request){

        $user_id = auth()->user()->id;
        $order = Order::where('user_id', $user_id)->first();
        $cake_id = $order->cake_id;
        $cakes = Cake::find($cake_id);

        $eggPrice=0;
        if($cakes->eggless_option == 'Available'){
            $eggPrice = 200;
        }

        $qty = $request->input('qty');

        $total_cost = (int)$cakes->price * (int)$qty + (int)$eggPrice;
        $order->total_cost = $total_cost;
        
        $order->cake_message = $request->input('cake_message');
        $order->cake_design = $request->input('cake_design');
        $order->quantity = $qty;
        $order->save();
        return view('thankyou')->with('total_cost', $total_cost);
    }

    public function cancelOrder()
    {
        //
       $orders = Order::all();
       foreach($orders as $order){
           if($order->quantity == null){
               $order->delete();
           }
       }

        return redirect("/cakes");
    }
}
