<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        
        $title = '';
 
        if(request('kategori')) {
             $category = Category::firstWhere('slug', request('kategori'));
             $title = ' in ' . $category->name;
        }
 
         return view('posts', [
             "title" => "Blog" . $title,
             "active" => 'posts',
             'categories' => Category::all(),
             'list_post' => Post::latest()->take(5)->get(),
             // == solve N+1 problem == //
             "posts" =>  Post::latest()->filter(request(['search', 'kategori']))->paginate(5)->withQueryString()
         ]);
    }

    public function show(Post $post) {
        return view('post', [
            "title" => $post->title,
            "active" => 'posts',
            "post" => $post,
            'categories' => Category::all(),
            'list_post' => Post::latest()->take(5)->get(),
        ]);
    }
}
