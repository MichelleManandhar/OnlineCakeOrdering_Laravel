<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CakeDesign;
use App\User;

class CakeDesignController extends Controller
{

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
        $users = User::find(auth()->user()->id);
        $designs = CakeDesign::all();
        if($users->admin == 1){
            return view('admin.design.index')->with('designs', $designs);
        }
        return view('pages.index');
        
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
            return view('admin.design.create');
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
        //
        $this->validate($request, [
            'design_image' => 'image|max:1999'
        ]);
        
        if($request->hasFile('design_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('design_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('design_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            //Upload Image
            $path = $request->file('design_image')->storeAs('public/design_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Cake
        $design = new CakeDesign();
        $design->design_image = $fileNameToStore;
        $users = User::find(auth()->user()->id);

        if($users->admin == 1){
            $design->save();
            return redirect('/design')->with('success', 'Cake Design Added');
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
        $users = User::find(auth()->user()->id);
        $design = CakeDesign::find($id);
        if($users->admin == 1){
            return view('admin.design.edit')->with('design', $design);
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
        $this->validate($request, [
            'design_image' => 'image|max:1999'
        ]);
        $design = CakeDesign::find($id);

        if($request->hasFile('design_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('design_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('design_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            //Upload Image
            $path = $request->file('design_image')->storeAs('public/design_images', $fileNameToStore);

            $design->design_image = $fileNameToStore;
        }

        // Create Cake
        
        
        $users = User::find(auth()->user()->id);
        if($users->admin == 1){
            $design->save();
            return redirect('/design')->with('success', 'Cake Design Edited');
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
        $design = CakeDesign::find($id);
        $users = User::find(auth()->user()->id);
        if($users->admin == 1){    
            $design->delete();
            return redirect('/admin/design')->with('success', 'Cake Design Deleted');
        }
        return view('pages.index');
    }
}
