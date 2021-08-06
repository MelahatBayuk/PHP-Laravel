<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detay extends Model
{
    protected $table='detaylar';
    protected $guarded=[];
public function user(){
return $this->belongsTo('App\User','id','user_id');
}


}
