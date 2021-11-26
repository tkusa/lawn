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
Route::get("/", "HomeController@home")->name("home");

    Route::get("/post", "PostController@index")->name("post.index");
    
    Route::get("/post/create", "PostController@create")->name("post.create");
    
    Route::post("/post", "PostController@store")->name("post.store");
    
    Route::get("/post", "PostController@index")->name("post.index");
    
    Route::get("/post/edit", "PostController@edit")->name("post.edit");
    
    Route::put("/post", "PostController@update")->name("post.update");
    
    Route::delete("/post", "PostController@destroy")->name("post.destroy");
    
