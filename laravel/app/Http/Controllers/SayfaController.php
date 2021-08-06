<?php

namespace App\Http\Controllers;

use App\Models\Sayfa;
use Illuminate\Http\Request;

class SayfaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sayfalar=Sayfa::all();
        return view('admin.sayfalar.index',compact('sayfalar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sayfalar.create');
    }

    /**laravel
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
        ));
        $sayfa=new Sayfa();
        $sayfa->baslik=request('baslik');
        $sayfa->icerik=request('icerik');
        $sayfa->slug=str_slug(request('baslik'));
        $sayfa->save();
        if ($sayfa){
            alert()->flash('Başarılı', 'success', [
                'text' => 'Sayfa Eklendi',
                'timer' => 20000
            ]);
            return back();        }
        else {
            alert()->flash('Hata', 'error', [
                'text' => 'Sayfa Eklenemedi',
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
        $sayfa=Sayfa::find($id);
        return view('admin.sayfalar.edit',compact('sayfa'));
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
        ));

        $sayfa=Sayfa::find($id);
        $sayfa->baslik=request('baslik');
        $sayfa->icerik=request('icerik');
        $sayfa->slug=str_slug(request('baslik'));
        $sayfa->save();
        if ($sayfa){
            alert()->flash('Başarılı', 'success', [
                'text' => 'Sayfa Güncellendi',
                'timer' => 20000
            ]);
            return back();        }
        else {
            alert()->flash('Hata', 'error', [
                'text' => 'Sayfa Güncellenemedi',
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
        $sil=Sayfa::destroy($id);
        if ($sil){
            alert()->flash('Başarılı', 'success', [
                'text' => 'Sayfa Silindi',
                'timer' => 20000
            ]);
            return back();        }
        else {
            alert()->flash('Hata', 'error', [
                'text' => 'Sayfa Silinemedi',
                'timer' => 20000
            ]);
            return back();
        }
    }
}
