<?php

namespace Tkusa\Lawn\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use Tkusa\Lawn\Http\Requests\PostRequest;
use Tkusa\Lawn\Models\Post;


class PostController extends BaseController
{
    
    public function index(Request $request)
    {
        $posts = Post::all()->paginate();
        return view("lawn.post.index",compact($posts));
    }
    
    public function create(Request $request)
    {
        return view("lawn.post.create");
    }
    
    public function store(PostRequest $request)
    {
        $form = $request->all();
        unset($form["_token"]);

        $post = new Post;
        $post->fill($form)->save();

        return redirect()->route("lawn.post.index");
    }
    
    public function show(Request $request, $id)
    {
        $post = Post::find($id);
        return view("lawn.post.show",compact($post));
    }
    
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        return view("lawn.post.edit",compact($post));
    }
    
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $form = $request->all();
        unset($form["_token"]);

        $post->fill($form)->save();
        return redirect()->route("lawn.post.show",compact($id));
    }
    
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route("lawn.post.index");
    }
    
}
