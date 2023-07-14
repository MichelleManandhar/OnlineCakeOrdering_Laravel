<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cake;
use App\User;

class CakesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show','cakes']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cakes = Cake::all();
        return view('cakes.index')->with('cakes', $cakes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::find(auth()->user()->id);
        if($users->admin == 1){
            return view('admin.cake.create');
        }
        return view('pages.index');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation of data fields
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'price' => 'required',
            'eggless_option' => 'required',
            'cake_image' => 'image|max:1999'
        ]);
        
        if($request->hasFile('cake_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cake_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cake_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            //Upload Image
            $path = $request->file('cake_image')->storeAs('public/cake_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Cake
        $cake = new Cake();
        $cake->title = $request->input('title');
        $cake->body = $request->input('body');
        $cake->cake_image = $fileNameToStore;
        $cake->price = $request->input('price');
        $cake->eggless_option = $request->input('eggless_option');
        
        $users = User::find(auth()->user()->id);
        if($users->admin == 1){
            $cake->save();
            return redirect('/admin/cakes')->with('success', 'Cake Added');
        }
        return view('pages.index');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cake = Cake::find($id);
        return view('cakes.show')->with('cake', $cake);
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
        $cake = Cake::find($id);
        $users = User::find(auth()->user()->id);
        if($users->admin == 1){
            return view('admin.cake.edit')->with('cake', $cake);
        }
        return view('pages.index');
        

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
        // Validation of data fields
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'price' => 'required',
            'eggless_option' => 'required',
            'cake_image' => 'image|max:1999'
        ]);
        $cake = Cake::find($id);

        if($request->hasFile('cake_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cake_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cake_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            //Upload Image
            $path = $request->file('cake_image')->storeAs('public/cake_images', $fileNameToStore);

            $cake->cake_image = $fileNameToStore;
        }

        // Create Cake
        
        $cake->title = $request->input('title');
        $cake->body = $request->input('body');        
        $cake->price = $request->input('price');
        $cake->eggless_option = $request->input('eggless_option');

        $users = User::find(auth()->user()->id);
        if($users->admin == 1){
            $cake->save();
            return redirect('/admin/cakes')->with('success', 'Cake Updated');
        }
        return view('pages.index');     
        
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
        $cake = Cake::find($id);
        $users = User::find(auth()->user()->id);
        if($users->admin == 1){    
            $cake->delete();
            return redirect('/admin/cakes')->with('success', 'Cake Deleted');
        }
        return view('pages.index');

    }
}
