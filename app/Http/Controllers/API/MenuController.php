<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status'=>1,
            'message'=>'getting menu list success',
            'data'=> Menu::with('category')->get()->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_category'=>'required',
            'name'=>'required',
            'harga'=>'required',
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $photo = $request->file('photo');

        $file_name = time()."_".preg_replace('/\s+/', '', $photo->getClientOriginalName());
        $photo->move("uploads/menus/", $file_name);

        $menu = Menu::create([
            'id_category'=> $request->id_category,
            'name' => $request->name,
            'harga' => $request->harga,
            'photo' => $file_name,
        ]);

        return response()->json([
            'status'=>1,
            'message'=>'adding menu success',
            'data'=> $menu
        ]);
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
    }
}
