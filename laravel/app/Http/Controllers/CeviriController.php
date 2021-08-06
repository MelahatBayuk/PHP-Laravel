<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\TranslationLoader\LanguageLine;

class CeviriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ceviriler=LanguageLine::all();
        return view('admin.ceviri.index',compact('ceviriler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ceviri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kontrol=Validator::make($request->all(),[
            'group'=>'required',
            'key'=>'required',
            'tr'=>'required',
            'en'=>'required',

        ]);

        if ($kontrol->fails()){
        return  redirect()->back()->withErrors($kontrol)->withInput();

        }
        else{
           $ekle= LanguageLine::create([
                'group' => request('group'),
                'key' => request('key'),
                'text' => ['tr' => request('tr'), 'en' =>  request('en')],
            ]);
            if ($ekle){
                alert()->flash('Başarılı', 'success', [
                    'text' => 'Çeviri Eklendi',
                    'timer' => 20000
                ]);
                return back();        }
            else {
                alert()->flash('Hata', 'error', [
                    'text' => 'Çeviri Eklenemedi',
                    'timer' => 20000
                ]);
                return back();
            }



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
        $kelime=LanguageLine::find($id);
        $veriler=array_values($kelime->text);
        $turkce=$veriler[0];
        $ingilizce=$veriler[1];
        return view('admin.ceviri.edit',compact('kelime','turkce','ingilizce'));

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
        $kontrol=Validator::make($request->all(),[
            'group'=>'required',
            'key'=>'required',
            'tr'=>'required',
            'en'=>'required',

        ]);

        if ($kontrol->fails()){
            return  redirect()->back()->withErrors($kontrol)->withInput();

        }
        else{
         $veriler=[
             'group'=>request('group'),
              'key'=>request('key'),
             'text' => ['tr' => request('tr'), 'en' =>  request('en')],




         ];
         $kelime=LanguageLine::find($id);
         $kaydet=$kelime->update($veriler);


            if ($kaydet){
                alert()->flash('Başarılı', 'success', [
                    'text' => 'Çeviri Güncellendi',
                    'timer' => 20000
                ]);
                return back();        }
            else {
                alert()->flash('Hata', 'error', [
                    'text' => 'Çeviri Güncellenemedi',
                    'timer' => 20000
                ]);
                return back();
            }



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
       $sil= LanguageLine::destroy($id);
        if ($sil){
            alert()->flash('Başarılı', 'success', [
                'text' => 'Çeviri Silindi',
                'timer' => 20000
            ]);
            return back();        }
        else {
            alert()->flash('Hata', 'error', [
                'text' => 'Çeviri Silinemedi',
                'timer' => 20000
            ]);
            return back();
        }


    }
}
