<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;


class Anasayfa extends Controller
{
    public function __invoke(){
        $featuredPosts = Post::where('featured','1')->get();
        $posts = Post::paginate(15);
        $categories = Category::all();
        $popularPosts = Post::orderByDesc('hit')->limit(4)->get();

        return view('anasayfa',['featuredPosts'=>$featuredPosts,'posts'=>$posts,'categories'=>$categories,'popularPosts'=>$popularPosts]);
    }
    
        
    
}
