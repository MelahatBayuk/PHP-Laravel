<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{      protected $table='posts';
       protected $guarded=[];


    public function kategori(){
        return $this->belongsTo('App\Kategori','kategori_id');

    }
    public function user(){
        return $this->belongsTo('App\User','user_id');

    }
    use HasFactory;
}
