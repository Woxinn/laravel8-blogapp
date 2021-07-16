<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class SlugController extends Controller
{
    public function __invoke($slug)
    {
        if (Category::where('slug',$slug)->first()) {
            return 'kategori';
        } elseif (Post::where('slug',$slug)->first()) {
            $post = Post::where('slug',$slug)->first();
            $post->increment('hit');
            return view('yazi',['post'=>$post]);
        } else {
            return 'bulunamadi';
        }
    }
}
