<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Ayar;
use Illuminate\Http\Request;


class AyarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayarlar = Ayar::find(1);/*databse kısmında id=1 olduğu için 1 yazdık */
        return view('admin.ayarlar.create', compact('ayarlar')); /*değişken olarak aktarmak için compact kullandık */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), array(
            'baslik' => 'required',
            'aciklama' => 'required',
        ));
        $ayar = Ayar::find(1);
        $ayar->baslik = request('baslik');
        $ayar->aciklama = request('aciklama');
        $ayar->email = request('email');
        $ayar->facebook = request('facebook');
        $ayar->twitter = request('twitter');
        $ayar->instagram = request('instagram');
        $ayar->pinterest = request('pinterest');
        $ayar->google = request('google');
        $ayar->hakkimizda = request('hakkimizda');
        $ayar->adres = request('adres');
        $ayar->telefon = request('telefon');
        if (request()->hasFile('logo')) {
            $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            $resim = request()->file('logo');
            $dosya_adi = 'logo' . '-' . time() . '.' . $resim->extension(); //resmin uzantısıbı alıyor

            if ($resim->isValid()) {   //resim değerleri geçerli iise kurallarıma uyuyorsa
                $hedef_klasor = 'uplaods/dosyalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi; //database deki logo kısmına dosya yolunu yazdıracaz
                $resim->move($hedef_klasor, $dosya_adi); // move=taşı resmi hedef klasörün altına dosya adi ile yükleyeceğiz
                $ayar->logo = $dosya_yolu;
            }
        }
        $ayar->save();
        if ($ayar) {
            alert()->flash('Başarılı', 'success', [
                'text' => 'Ayarlar Güncellendi',
                'timer' => 20000
            ]);
            return back();
        } else {
            alert()->flash('Hata', 'error', [
                'text' => 'Ayarlar Güncellenemedi',
                'timer' => 20000
            ]);
            return back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }


}
