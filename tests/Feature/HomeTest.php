<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
  
    public function testExample()
    {
        $response = $this->get('/home');
        $response->assertSeeText('Home Page');
        $response->assertSeeText('Learn');
       
    }
    public function testAboutPage(){
        $response = $this->get('/about');
        $response->assertSeeText('About Page');
        $response->assertSeeText('Learn Laravel 6');

       

    }
}
