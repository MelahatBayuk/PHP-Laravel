<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'yonetim','middleware'=>'admin'],function (){

    Route::get('/','App\Http\Controllers\YonetimController@index')->name('yonetim.index');
    Route::get('cikis','App\Http\Controllers\YonetimController@cikis')->name('yonetim.cikis');
    Route::resource('ayarlar','App\Http\Controllers\AyarController');
    Route::resource('kategoriler','App\Http\Controllers\KategoriController');
    Route::resource('yazilar','App\Http\Controllers\YaziController');
    Route::get('kullanicilar','App\Http\Controllers\YonetimController@kullanicilar')->name('kullanici.index');
    Route::get('kullaniciekle','App\Http\Controllers\YonetimController@kullaniciekle')->name('kullanici.ekle');
    Route::post('kullanicikayit','App\Http\Controllers\YonetimController@kullanicikayit')->name('kullanici.kayit');
    Route::get('kullaniciduzenle/{id}','App\Http\Controllers\YonetimController@kullaniciduzenle')->name('kullanici.duzenle');
    Route::post('kullaniciguncelle/{id}','App\Http\Controllers\YonetimController@kullaniciguncelle')->name('kullanici.guncelle');
    Route::delete('kullanicisil/{id}','App\Http\Controllers\YonetimController@kullanicisil')->name('kullanici.sil'); /*delete yapmasaydık veritabanından silmezdi */
    Route::resource('sayfalar','App\Http\Controllers\SayfaController');
    Route::resource('yorumlar','App\Http\Controllers\YorumController');
    Route::get('onayla/{id}','App\Http\Controllers\YorumController@onayla')->name('yorum.onayla');
    Route::get('onaykaldir/{id}','App\Http\Controllers\YorumController@onaykaldir')->name('yorum.onaykaldir');
    Route::get('iletisim','App\Http\Controllers\YonetimController@iletisim')->name('iletisim');
    Route::post('iletisim','App\Http\Controllers\YonetimController@iletisimgonder')->name('iletisim.gonder');
    Route::get('reklam','App\Http\Controllers\YonetimController@reklamgoster')->name('reklam.goster');
    Route::put('reklam','App\Http\Controllers\YonetimController@reklam')->name('reklam.guncelle');
    Route::resource('ceviri','App\Http\Controllers\CeviriController');


});

Auth::routes(['verify' => true]);
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('anasayfa');
Route::get('kategori/{id}/{slug}','App\Http\Controllers\HomeController@kategori')->name('kategori.goster');
Route::get('yazi/{id}/{slug}','App\Http\Controllers\HomeController@yazidetay')->name('yazi.goster');
Route::get('sayfa/{id}/{slug}','App\Http\Controllers\HomeController@sayfa')->name('sayfa.goster');
Route::get('cikisyap','App\Http\Controllers\HomeController@cikis')->name('kullanici.cikis');
Route::post('yorumgonder','App\Http\Controllers\HomeController@yorumgonder')->name('yorum.gonder');
Route::get('arama', ['as' => 'arama.yap', 'uses' =>'App\Http\Controllers\HomeController@arama']);
Route::get('kullanici','App\Http\Controllers\HomeController@profilim')->name('profil.duzenle')->middleware('verified');;
Route::post('kullanici/{id}','App\Http\Controllers\HomeController@profilguncelle')->name('profil.guncelle')->middleware('verified');;
Route::post('aboneol','App\Http\Controllers\HomeController@aboneol')->name('abone.ol');
Route::get('iletisim','App\Http\Controllers\HomeController@iletisim')->name('iletisim.formu');
Route::post('iletisim','App\Http\Controllers\HomeController@iletisimkaydet')->name('iletisim.gonder');
Route::get('lang/{lang}',['as'=>'lang.switch','uses'=>'App\Http\Controllers\HomeController@dildegistir']);
