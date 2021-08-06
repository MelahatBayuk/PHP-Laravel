<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Kategori extends Model
{
    protected $table='kategoriler';
    protected $guarded=[];

    public function yazilar(){
        return $this->hasMany('App\Models\Yazi','kategori');
    }

    public function anakategori(){
        return $this->belongsTo('App\Models\Kategori','id');
    }
    public function altkategori(){
        return $this->hasMany('App\Models\Kategori','ust_id');
    }

    use HasFactory;
 }
