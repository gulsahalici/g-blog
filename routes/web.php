<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->where('post', '[A-z_\-]+'); 

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
