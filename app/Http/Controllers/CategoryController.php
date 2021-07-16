<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('kategoriler',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryCheck = Category::where('name',$request->categoryname)->count();

        if ($categoryCheck > 0) {
            return redirect()->route('categories.index')->withStatus('categoryExist');
        } else {
            $categoryslug = Str::slug($request->categoryname,'-');
            Category::create([
                'name' => $request->categoryname,
                'slug' => $categoryslug,
            ]);
            
            return redirect()->route('categories.index')->withStatus('categorySuccess');
        }
        
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('kategoriler',['edit'=>'1','category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $categoryExist = Category::where('name',$request->newCategoryName)->count();
        if ($category->name == $request->newCategoryName) {
            return redirect()->route('categories.index')->withStatus('categoryNoChange');            
        } elseif ( $categoryExist > 0) {

            return redirect()->back()->withStatus('categoryExist');

        } else {
            $category->name = $request->newCategoryName;
            $category->slug = Str::slug($request->newCategoryName);
            $category->save();

            return redirect()->route('categories.index')->withStatus('categoryEditSuccess');
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->withStatus('categoryDeleteSuccess');
    }
}
