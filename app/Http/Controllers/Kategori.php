<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriler;
use Illuminate\Support\Str;

class Kategori extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriler = Kategoriler::all();
        return view('kategoriler',['kategoriler'=>$kategoriler]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategoriler = Kategoriler::where('ad',$request->kategoriad)->get();
        $slug = Str::slug($request->kategoriad,'-');
        if ($kategoriler->isNotEmpty()) {
            return redirect()->back()->withMesaj('Aynı isimde kategori mevcut.');
        } else {
            $kategori = Kategoriler::create([
                'ad' => $request->kategoriad,
                'slug' => $slug,
            ]);
            if ($kategori) {
                return redirect()->back()->withMesaj('Kategori başarıyla eklendi.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $kategoriad = Kategoriler::where('id',$id)->first();
        return view('kategoriler',['duzenleme'=>1,'kategoriid'=>$id,'kategoriad'=>$kategoriad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategoriler = Kategoriler::where('ad',$request->yeniad)->get();
        if (Kategoriler::where('id',$id)->first()->ad == $request->yeniad) {
            return redirect()->route('kategoriler.index')->withMesaj('Herhangi bir değişiklik yapılmadı.');            
        } elseif ( $kategoriler->isNotEmpty()) {
            return redirect()->back()->withMesaj('Aynı isimde kategori mevcut');
        } else {
            $kategori = Kategoriler::find($id);
            $kategori->ad = $request->yeniad;
            $kategori->slug = '/'.Str::slug($request->yeniad);
            $kategori->save();
            return redirect()->route('kategoriler.index')->withMesaj('Kategori başarıyla güncellendi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategoriler::destroy($id);
        return redirect()->back()->withMesaj('Kategori başarıyla silindi.');
    }
}
