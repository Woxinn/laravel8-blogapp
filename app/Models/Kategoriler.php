<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    use HasFactory;
    protected $table = 'kategoriler';
    protected $fillable = ['ad','slug'];

    public function yazi(){
        return $this->belongsTo('App\Models\Yazilarmodel');
    }
}
