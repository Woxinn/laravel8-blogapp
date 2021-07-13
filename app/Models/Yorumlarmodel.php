<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yorumlarmodel extends Model
{
    use HasFactory;
    protected $table = 'yorumlar';
    protected $fillabel = ['sahipid','yaziid','yorum'];

    public function sahip(){
        return $this->hasOne('App\Models\User','id','sahipid');
    }
}
