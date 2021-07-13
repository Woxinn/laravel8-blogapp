<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\Yorumlarmodel;
use App\Models\Yazilarmodel;
use App\Models\User;

class SlugKontrol extends Controller
{
    public function __invoke($slug)
    {
        if (Kategoriler::where('slug',$slug)->first()) {
            return 'kategori';
        } elseif (Yazilarmodel::where('slug',$slug)->first()) {
            $yazi = Yazilarmodel::where('slug',$slug)->first();
            return view('yazi',['yazi'=>$yazi]);
        } else {
            return 'bulunamadi';
        }
    }

    public function kategori(){
        return $this->hasOne(Kategoriler::class);
    }
}
