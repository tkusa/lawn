<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    
        public function test_index()
        {
            $response = $this->get("/comment");

            $response->assertStatus(200);
        }
        
        public function test_create()
        {
            $response = $this->get("/comment/create");

            $response->assertStatus(200);
        }
        
        public function test_store()
        {
            $response = $this->post("/comment");

            $response->assertStatus(200);
        }
        
        public function test_show()
        {
            $response = $this->get("/comment/1");

            $response->assertStatus(200);
        }
        
        public function test_edit()
        {
            $response = $this->get("/comment/1/edit");

            $response->assertStatus(200);
        }
        
        public function test_update()
        {
            $response = $this->put("/comment/1");

            $response->assertStatus(200);
        }
        
        public function test_destroy()
        {
            $response = $this->delete("/comment/1");

            $response->assertStatus(200);
        }
        
}
