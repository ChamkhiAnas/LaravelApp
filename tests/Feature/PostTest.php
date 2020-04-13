<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\str;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testSavePost()
    {
        $post=new Post();
        $post->title="new Title to test";
        $post->content="new content";
        $post->slug = Str::slug($post->title,'-');
        $post->active=false;
        $post->save();

        $this->assertDatabaseHas('posts',[
            'title'=> 'new Title to test',
        ]);


    }
    public function testPostStoreValid(){
        $data=[

            'title'=>'test our post Store',
            'slug'=>Str::slug('test our post store', '-'),
            'content'=> 'content store',
            'active'=> false,
        ];
        $this->post('/posts',$data)
             -> assertStatus(302)
             -> assertSessionHas('status');
        
        $this->assertEquals(session('status'),'post was created');
        
    }
}
