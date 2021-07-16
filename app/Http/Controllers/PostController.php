<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);

        return view('yazilar',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('yeniyazi' , ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('postImage')->getClientOriginalName();
        $imageName = time() . '_' . $image;
        $request->file('postImage')->move(public_path('images'), $imageName);
        $slugCheck = Post::where('slug', Str::slug($request->postTitle))->count();
        
        if ($slugCheck == 0) {
            $slug = Str::slug($request->postTitle);
        } else {
            $sayi = $slugCheck + 1;
            $slug = Str::slug($request->postTitle) . "-" . $sayi;
        }
        
        Post::create([
            'user_id' => Auth::id(),
            'category_id' => $request->postCategory,
            'featured' => $request->postFeatured,
            'title' => $request->postTitle,
            'content' => $request->postContent,
            'slug' => $slug,
            'image' => $imageName,
            'tags' => $request->postTags,
            'created_at' => now(),
        ]);

        return redirect()->route('posts.create')->withStatus('postSuccess');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function featuredUpdate(Post $post, Request $request)
    {   
        $post->featured = $request->featured;
        $post->updated_at = now();
        $post->save();

        return redirect()->route('posts.index')->withStatus('success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('yaziduzenle', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->file('postImage')) {            
        $image = $request->file('postImage')->getClientOriginalName();
        $imageName = time() . '_' . $image;
        $request->file('postImage')->move(public_path('images'), $imageName);
        } else {
            $imageName = $post->image;
        }      

        $slugCheck = Post::where('slug', Str::slug($request->postTitle))->count();        
        
        if ($slugCheck == 0) {
            $slug = Str::slug($request->postTitle);
        } else {
            $sayi = $slugCheck + 1;
            $slug = Str::slug($request->postTitle) . "-" . $sayi;
        }


        $post->category_id = $request->postCategory;
        $post->title = $request->postTitle;
        $post->image = $imageName;
        $post->content = $request->postContent;
        $post->slug = $slug;
        $post->tags = $request->postTags;
        $post->featured = $request->postFeatured;
        $post->updated_at = now();
        $post->save();
        return redirect()->route('posts.index')->withStatus('postUpdateSuccess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->withStatus('postDeleteSuccess');
    }
}
