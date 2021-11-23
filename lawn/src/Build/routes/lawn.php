<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Lawn Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


        Route::get("/post", "PostController@index")->name("post.index");
        
        Route::get("/post/create", "PostController@create")->name("post.create");
        
        Route::post("/post", "PostController@store")->name("post.store");
        
        Route::get("/post", "PostController@index")->name("post.index");
        
        Route::get("/post/edit", "PostController@edit")->name("post.edit");
        
        Route::put("/post", "PostController@update")->name("post.update");
        
        Route::delete("/post", "PostController@destroy")->name("post.destroy");
        


        Route::get("/comment", "CommentController@index")->name("comment.index");
        
        Route::get("/comment/create", "CommentController@create")->name("comment.create");
        
        Route::post("/comment", "CommentController@store")->name("comment.store");
        
        Route::get("/comment", "CommentController@index")->name("comment.index");
        
        Route::get("/comment/edit", "CommentController@edit")->name("comment.edit");
        
        Route::put("/comment", "CommentController@update")->name("comment.update");
        
        Route::delete("/comment", "CommentController@destroy")->name("comment.destroy");
        