<?php

namespace App\Providers;

use App\Models\Ayar;
use App\Models\Kategori;
use App\Models\Reklam;
use App\Models\Sayfa;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $ayar = Ayar::find(1);
        $sayfalar = Sayfa::all();
        $kategoriler = Kategori::where('ust_id', '=', null)->get();
        $reklam=Reklam::find(1);
        View::share([
            'ayar' => $ayar,
            'sayfalar' => $sayfalar,
            'kategoriler' => $kategoriler,
            'reklam'=>$reklam,
        ]);
    }
}
