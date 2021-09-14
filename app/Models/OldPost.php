<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerp;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerp, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerp = $excerp;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all() {
        return cache()->remember('posts.all', now()->addMinutes(1), function () {
                return collect(File::files(resource_path("posts/")))
                ->map(
                    function($file) {
                        return  YamlFrontMatter::parseFile($file);
                })
                ->map(
                    function($document) {
                            return new Post(
                                $document->title, 
                                $document->excerp,
                                $document->date,
                                $document->body(), 
                                $document->slug
                            );
                })
                ->sortByDesc('date');
            }
        );
    }

    public static function find($slug) {

        return static::all()->firstWhere('slug', $slug);
        
       /* if(! file_exists($path =  resource_path("posts/{$slug}.html"))) {
            //base_path("resources/posts/{$slug}.html")
            //dirname(__DIR__) . "/resources/posts/{$slug}.html"
            //ddd('file doesnot exist');
            //abort(404);
            //return redirect('/');
            throw new ModelNotFoundException();
        }

        return cache()->remember('posts.{$slug}', now()->addMinutes(1) , function () use ($path) 
        {
            var_dump('file_get_contents');
            return file_get_contents($path);
        });*/

    }

    public static function findOrFail($slug) {

        $post = static::all()->firstWhere('slug', $slug);

        if(! $post) {
            throw new ModelNotFoundException();
        }
        
        return $post;
    }
    
}
