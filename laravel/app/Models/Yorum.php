<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Yorum extends Model
{    use Rateable;
    protected $table='yorumlar';
    protected $guarded=[];



public function kullanici(){
    return $this->belongsTo('App\Models\User','user_id');    /*  belongsto dedik çünkü kullanıcıya ait yorumları biz burada belirlemiş olacağız */
}
    public function yazi(){
        return $this->belongsTo('App\Models\Yazi','yazi_id');    /*  belongsto dedik çünkü kullanıcıya ait yorumları biz burada belirlemiş olacağız */
    }

}
