<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yazilarmodel extends Model
{
    
    use HasFactory;
    protected $table='yazilar';
    protected $fillable=['sahipid','kategoriid','onecikarilmis','baslik','resim','etiketler','icerik','okunmasayisi','created_at','updated_at'];

    public function kategori(){
        return $this->hasOne('App\Models\Kategoriler','id','kategoriid');
    }

    public function sahip(){
        return $this->hasOne('App\Models\User','id','sahipid');
    }

    public function yorumlar(){
        return $this->hasMany('App\Models\Yorumlarmodel','yaziid','id');
    }
}

