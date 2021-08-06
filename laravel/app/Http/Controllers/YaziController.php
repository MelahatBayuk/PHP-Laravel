<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

use App\Models\User;
use App\Models\Yazi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YaziController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $yazilar=Yazi::all();
       return view('admin.yazilar.index',compact('yazilar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriler= Kategori::all();
        return view('admin.yazilar.create',compact('kategoriler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),array(
            'baslik'=>'required',
            'icerik'=>'required',
            'kategori'=>'required',

        ));
        $yazi=new Yazi();
        $yazi->baslik=request('baslik');
        $yazi->icerik=request('icerik');
        $yazi->user_id=Auth::user()->id;/*auth usr dediğimizde giriş yapan kullanıcının id sini alır*/
        $yazi->kategori=request('kategori');
        $yazi->slider=request('slider');
        $yazi->video=request('video');
        $yazi->slug=str_slug(request('baslik'));

        if (request()->hasFile('resim')) {
            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));
        }

        $resim = request()->file('resim');
        $dosya_adi = time() . '.' . $resim->extension();
        if ($resim->isValid()) {
            $hedef_klasor = 'uplaods/dosyalar';
            $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
            $resim->move($hedef_klasor, $dosya_adi);
            $yazi->resim = $dosya_yolu;
        }
     $yazi->save();
        if ($yazi){
            alert()->flash('Başarılı', 'success', [
                'text' => 'Yazi Eklendi',
                'timer' => 20000
            ]);
            return back();
        }
        else {
            alert()->flash('Hata', 'error', [
                'text' => 'Yazi Eklenemedi',
                'timer' => 20000
            ]);
            return back();
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yazi=Yazi::find($id);
        $kategoriler=Kategori::where('id','!=',$yazi->kategori)->get();/*aynı kategorilerden tekrardan göünmeyecek sadece biri olacak 4 tane spor kategorisi varsa aynı başlıktan sadece biri görünecek */
        return view('admin.yazilar.edit',compact('yazi','kategoriler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(),array(
            'baslik'=>'required',
            'icerik'=>'required',
            'kategori'=>'required',

        ));
        $yazi=Yazi::find($id);
        $kullanici=$yazi->user_id;
        $yazi->baslik=request('baslik');
        $yazi->icerik=request('icerik');
        $yazi->user_id=$kullanici;
        $yazi->kategori=request('kategori');
        $yazi->slider=request('slider');
        $yazi->slug=str_slug(request('baslik'));
        $yazi->video=request('video');

        if (request()->hasFile('resim')) {
            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            $resim = request()->file('resim');
            $dosya_adi = time() . '.' . $resim->extension();
            if ($resim->isValid()) {
                $hedef_klasor = 'uplaods/dosyalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $yazi->resim = $dosya_yolu;
            }
        }
        $yazi->save();
        if ($yazi){
            alert()->flash('Başarılı', 'success', [
                'text' => 'Yazi Güncellendi',
                'timer' => 20000
            ]);
            return redirect()->route('yazilar.index');        }
        else {
            alert()->flash('Hata', 'error', [
                'text' => 'Yazi Güncellenemedi',
                'timer' => 20000
            ]);
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $sil =Yazi::destroy($id);
        if ($sil){
            alert()->flash('Başarılı', 'success', [
                'text' => 'Yazi Silindi',
                'timer' => 20000
            ]);
            return redirect()->route('yazilar.index');
        }
        else {
            alert()->flash('Hata', 'error', [
                'text' => 'Yazi Silinemedi',
                'timer' => 20000
            ]);
            return back();
        }
    }
}
