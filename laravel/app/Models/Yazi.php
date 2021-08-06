<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use willvincent\Rateable\Rateable;

class Yazi extends Model implements Viewable
{  use Rateable;
    use InteractsWithViews;

    protected $table = 'yazilar';
    protected $guarded = [];


    public function kullanici()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function kategorisi()
    { /*yazının bir tane kategorisi olur o yüzden belongsto kullandık */
        return $this->belongsTo('App\Models\Kategori', 'kategori');
    }

    public function yorumlar()
    { /*bir yazı birden fazla yoruma sahip olabilir */
        return $this->hasMany('App\Models\Yorum', 'yazi_id');
    }
}
