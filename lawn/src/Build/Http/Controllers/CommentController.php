<?php

namespace Tkusa\Lawn\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use Tkusa\Lawn\Http\Requests\CommentRequest;
use Tkusa\Lawn\Models\Comment;


class CommentController extends BaseController
{
    
        public function index(Request $request)
        {
            $comments = Comment::get();
            return view("lawn.comment.index",compact($comments));
        }
        
        public function create(Request $request)
        {
            return view("lawn.comment.create");
        }
        
        public function store(CommentRequest $request)
        {
            $form = $request->all();
            unset($form["_token"]);

            $comment = new Comment;
            $comment->fill($form)->save();

            return redirect()->route("lawn.comment.index");
        }
        
        public function show(Request $request, $id)
        {
            $comment = Comment::find($id);
            return view("lawn.comment.show",compact($comment));
        }
        
        public function edit(Request $request, $id)
        {
            $comment = Comment::find($id);
            return view("lawn.comment.edit",compact($comment));
        }
        
        public function update(CommentRequest $request, $id)
        {
            $comment = Comment::find($id);

            $form = $request->all();
            unset($form["_token"]);

            $comment->fill($form)->save();
            return redirect()->route("lawn.comment.show",compact($id));
        }
        
        public function destroy(Request $request, $id)
        {
            $comment = Comment::find($id);
            return redirect()->route("lawn.comment.index");
        }
        
}
