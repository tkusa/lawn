<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tkusa\Lawn\Models\Post;

class PostTest extends TestCase
{
    
    public function test_insert()
    {
        $post = Post::factory()->create();
        $data = [
            "id" => $post->id,
        ];
        $this->assertDatabaseHas($post, $data);
    }
    
    public function test_select()
    {
        $post = Post::factory()->create();
        $found = Post::find($post->id);

        $this->assertTrue($found);
        $this->assertEquals($post->id, $found->id);
     }
    
    public function test_update()
    {
        $post = Post::factory()->create();
        $updated = $post->updated_at;

        $data = Post::factory()->raw();
        $post->fill($data)->save();
        $this->assertTrue($updated < $post->updated_at);
    }
    
    public function test_delete()
    {
        $post = Post::factory()->create();
        $data = [
            "id" => $post->id,
        ];
        $this->assertDatabaseHas($post, $data);

        $post->delete();
        $this->assertDatabaseMissing($post, $data);
    }
    
}

