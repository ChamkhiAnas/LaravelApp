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
    // public function testPostStoreFail(){
    //     $data=[

    //         'title'=>'test our post Store',
    //         'content'=> 'content store',
    //     ];
    //     $this->post('/posts',$data)
    //          -> assertStatus(302)
    //          -> assertSessionHas('status');
        
    //     $messages=session('errors')->getMessages();
        
    //     $this->assertEquals($messages['title']['0'],'the title field is required');
    //     $this->assertEquals($messages['content']['0'],'The content field is required.');

    // }
    public function testPostUpdate(){
        $post=new Post();
        $post->title="second Title to test";
        $post->content="new content";
        $post->slug = Str::slug($post->title,'-');
        $post->active=true;

        $post->save();

        $this->assertDatabaseHas('posts',$post->toArray());

        $data=[            
            'title'=>'test our post updated',
            'slug'=>Str::slug('test our post store', '-'),
            'content'=> 'content store',
            'active'=> true
        ];

        $this->put("/posts/{$post->id}",$data)
                ->assertStatus(302)
                ->assertSessionHas('status');

        $this->assertDatabaseHas('posts',[

            'title'=>$data['title'],

        ]);

        $this->assertDatabaseMissing('posts',[

            'title'=>$post->title
        ]);


    }

    // public function testPostDelete(){
    //     $post=new Post;
    //     $post->title="second Title to test";
    //     $post->content="new content";
    //     $post->slug = Str::slug($post->title,'-');
    //     $post->active=true;

    //     $post->save();

    //     $this->assertDatabaseHas('posts',$post->toArray());

        
    //     $this->delete("/posts/{$post->id}")
    //          ->assertStatus(302);
    //         //  ->assertSessionsHas('status');

    //     $this->assertDatabaseMissing('pots' ,$post->toArray());

    // }
}
