<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\str;


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
        // $title=$request->input('title');
        // $content=$request->input('content');
        
        $post=New Post(); //instanciation de l'objet à partir de model post
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->slug=Str::slug($post->title, '-');
        $post->active=false;
        $post->save();

        echo($post->id);

       
        return redirect()->route('posts.show',['post'=>$post->id]);

    }


 
 
}
