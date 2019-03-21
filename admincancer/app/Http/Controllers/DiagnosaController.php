<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function save(Request $request)
    {
        //validasi data
        $this->validate($request, [
            'class'	=> 'required|max:255|string'
        ]);
    
        //menyimpan ke table posts kemudian redirect page 
        $post = Post::create(['title' => $request->title]);
        return redirect(route('diagnosa-rs/index'));
}
