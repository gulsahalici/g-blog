<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();

        if (request(['search'])) {
            $posts->filter(request(['search']));
        }
        
        return view('posts', [
            'posts' => $posts->get(),
            'categories' => Category::all()
        ]);
    }

    
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post 
        ]);
    }
}
