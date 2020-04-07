<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 

    public function home(){
        return view('home');
    }
    public function about(){
        return view('about');
    }
    public function blog($Myid,$Myname="by default"){

        $posts=[
            1=>['title'=>'<a> Anas Chamkhi </a>'],
            2=>['title'=>'Mehdi Bezikha'],
            3=>['title'=>'Sara El Gbouri'],
        ];
    
        return view('posts.show',
        [
            'data'=>$posts[$Myid],
            'author'=>$Myname,
        ]);
        
    }
}
