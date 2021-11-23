<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    
        public function test_index()
        {
            $response = $this->get("/post");

            $response->assertStatus(200);
        }
        
        public function test_create()
        {
            $response = $this->get("/post/create");

            $response->assertStatus(200);
        }
        
        public function test_store()
        {
            $response = $this->post("/post");

            $response->assertStatus(200);
        }
        
        public function test_show()
        {
            $response = $this->get("/post/1");

            $response->assertStatus(200);
        }
        
        public function test_edit()
        {
            $response = $this->get("/post/1/edit");

            $response->assertStatus(200);
        }
        
        public function test_update()
        {
            $response = $this->put("/post/1");

            $response->assertStatus(200);
        }
        
        public function test_destroy()
        {
            $response = $this->delete("/post/1");

            $response->assertStatus(200);
        }
        
}
