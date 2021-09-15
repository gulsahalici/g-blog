<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

Route::get('/', function () {

    //\Illuminate\Support\Facades\DB::listen(function ($query){
    //    logger($query->sql, $query->bindings);
    //});

    return view('posts', [
        'posts' => Post::latest()->get(),
        'categories' => Category::all()
    ]);

})->name('home');

Route::get('/posts/{postt}', function (Post $postt) {

    return view('post', [
        'post' => $postt //'<h1>Hello Worlldd!!</h1>'
    ]);

})->where('post', '[A-z_\-]+'); //whereAlpha('post') whereNumber('post');



Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts, //->load('category', 'author')
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);

})->name('category');


Route::get('/authors/{author:username}', function (User $author) {
 
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);

});
