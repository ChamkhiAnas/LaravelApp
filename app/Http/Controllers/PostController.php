<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
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
    

    // $posts=Post::get();


    //     foreach($posts as $post){
    //         foreach($post->comments as $comment){
    //             dump($comment);
    //         }
    //     }

 
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

    public function store(StorePost $request){
        
        // dd($request->all());
        // $title=$request->input('title');
        // $content=$request->input('content');

        // $validatedData=$request->validate([
        //     'title'=>'required|min:4|max:100',
        //     'content'=>'required|'
        // ]);


        $data=$request->only(['title','content']);
        $data['slug']=Str::slug($data['title'],'-');
        $data['active']=false;
        $post=Post::create($data);



        //first way of persisting 
        
        // $post=New Post(); //instanciation de l'objet à partir de model post
        // $post->title=$request->input('title');
        // $post->content=$request->input('content');
        // $post->slug=Str::slug($post->title, '-');
        // $post->active=false;
        // $post->save();

        $request->session()->flash('status','post was created');

       
        return redirect()->route('posts.index');

    }


    public function edit($id){

        $post=Post::findOrFail($id);
        return view('posts.edit',[

            'post'=>$post

        ]);

    }

    public function update(StorePost $request, $id){
        $post=Post::findOrFail($id);

        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->slug=Str::slug($request->input('content'),'-');

        $post->save();

        $request->session()->flash('status','post was Updated');

       
        return redirect()->route('posts.index');


    }

    public function destroy(Request $request,$id){

        // $post=Post::findOrFail($id);
        // $post->delete();
     
        Post::destroy($id);
        $request->session()->flash('status','post was Deleted');
        return redirect()->route('posts.index');
        


    }
 
 
}
