<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yazilarmodel;


class Anasayfa extends Controller
{
    public function __invoke(){
        $onecikarilmis = Yazilarmodel::where('onecikarilmis','1')->get();
        $yazilar = Yazilarmodel::paginate(15);
        return view('anasayfa',['onecikarilmis'=>$onecikarilmis,'yazilar'=>$yazilar]);
    }
    
        
    
}
