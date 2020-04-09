<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view('posts.index',[
        'posts'=>Post::all()
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
        

        return view('posts.show',[

            'post'=>Post::find($id)

        ]);
       

    }

    public function create(){
        
        return view('posts.create');
       

    }

    public function store(Request $request){
        
        // dd($request->all());
        $title=$request->input('title');
        $content=$request->input('content');

        dd($title, 'content', $content);
       

    }


 
 
}
