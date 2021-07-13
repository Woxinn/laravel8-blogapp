<?php

namespace App\Http\Controllers;

use App\Models\Yazilarmodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\YaziRequest;
use Illuminate\Http\Request;
use App\Models\Yorumlarmodel;
use App\Http\Requests\YaziDuzenleRequest;

class Yazilar extends Controller
{

    public function __invoke()
    {
        return view('yeniyazi');
    }

    public function yaziekle(YaziRequest $request)
    {
        $resim = $request->file('file')->getClientOriginalName();
        $filename = time() . '_' . $resim;
        $request->file('file')->move(public_path('images'), $filename);
        $slugkontrol = Yazilarmodel::where('slug', Str::slug($request->yazibaslik))->count();
        if ($slugkontrol == 0) {
            $slug = Str::slug($request->yazibaslik);
        } else {
            $sayi = $slugkontrol + 1;
            $slug = Str::slug($request->yazibaslik) . "-" . $sayi;
        }
        $yazi = new Yazilarmodel;
        $yazi->sahipid = Auth::id();
        $yazi->kategoriid = $request->yazikategori;
        $yazi->baslik = $request->yazibaslik;
        $yazi->resim = $filename;
        $yazi->icerik = $request->yaziicerik;
        $yazi->slug = $slug;
        $yazi->etiketler = $request->yazietiketler;
        $yazi->okunmasayisi = 0;
        $yazi->onecikarilmis = $request->yazionecikarilmis;
        $yazi->created_at = now();
        $yazi->updated_at = now();
        $yazi->save();
        return redirect()->back()->withMesaj('Yazı başarıyla eklendi.');
    }

    public function yazilar()
    {
        $yazilar = Yazilarmodel::paginate(15);
        return view('yazilar', ['yazilar' => $yazilar]);
    }

    public function yazisil($yaziid)
    {
        Yazilarmodel::destroy($yaziid);
        $yorumlar = Yorumlarmodel::where('yaziid', $yaziid);
        if ($yorumlar->count() > 0) {
            $yorumlar->delete();
        }
        return redirect()->back()->withMesaj('Yazı başarıyla silindi.');
    }

    public function yaziduzenle($yaziid)
    {
        $yazi = Yazilarmodel::find($yaziid);
        return view('yaziduzenle', ['yazi' => $yazi]);
    }

    public function yaziguncelle(YaziDuzenleRequest $request, $yaziid)
    {
        $yazi = Yazilarmodel::find($yaziid);
        if ($request->file('file')) {
            $resim = $request->file('file')->getClientOriginalName();
            $filename = time() . '_' . $resim;
            $request->file('file')->move(public_path('images'), $filename);
        } else {
            $filename = $yazi->resim;
        }
        $slugkontrol = Yazilarmodel::where('slug', Str::slug($request->yazibaslik))->count();
        if ($slugkontrol == 0) {
            $slug = Str::slug($request->yazibaslik);
        } else {
            $sayi = $slugkontrol + 1;
            $slug = Str::slug($request->yazibaslik) . "-" . $sayi;
        }
        $yazi->kategoriid = $request->yazikategori;
        $yazi->baslik = $request->yazibaslik;
        $yazi->resim = $filename;
        $yazi->icerik = $request->yaziicerik;
        $yazi->slug = $slug;
        $yazi->etiketler = $request->yazietiketler;
        $yazi->onecikarilmis = $request->yazionecikarilmis;
        $yazi->updated_at = now();
        $yazi->save();    
        return redirect()->route('yazilar')->withMesaj('Yazı başarıyla güncellendi');
    }

    public function onecikar(Request $request, $yaziid){
        $yazi = Yazilarmodel::find($yaziid);
        $yazi->onecikarilmis = $request->onecikarilmis;
        $yazi->save();
        return redirect()->route('yazilar')->withMesaj('Öne çıkarma başarıyla güncellendi.');
    }
}
