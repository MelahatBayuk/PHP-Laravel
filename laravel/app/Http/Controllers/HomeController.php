<?php

namespace App\Http\Controllers;

use App\Mail\iletisimFormu;
use App\Models\Ayar;
use App\Models\Kategori;
use App\Models\Sayfa;
use App\Models\User;
use App\Models\Yazi;
use App\Models\Yorum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

use Newsletter;
use willvincent\Rateable\Rating;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Yazi::where('slider', '=', 'goster')->take(6)->get();
        $yazilar = Yazi::where('kategori', 4)->orderby('created_at', 'desc')->take(4)->get();
        $tekli = Yazi::where('kategori', 4)->first(); //pluck
        $yeniler = Yazi::where('video',null)->orderby('created_at', 'desc')->take(5)->get();
        $yorumlar = Yorum::where('onay', 1)->take(5)->get();
        $renkler = array('1', '2', '3', '4', '5');
        $tumu=Yazi::take(4)->get();
        $populer=$tumu->sortByDesc(function ($tumu){
            return $tumu->views();
        });

        $videolar=Yazi::where('video','!=',null)->take(6)->get();
        return view('anasayfa.index', compact('sliders', 'yazilar', 'tekli', 'yeniler', 'yorumlar', 'renkler','populer','videolar'));
    }

    public function cikis()
    {
        auth()->logout();
        return redirect('/');

    }

    public function yazidetay($id, $post)
    {
        $yazi = Yazi::find($id); //id si detayına baktığım yazinin id si ile eşit olnmayan yazıları getir
        $ekle   = views($yazi)->count();
        $ilgililer = Yazi::where('id', '!=', $id)->take(3)->get();
        $yorumlar = Yorum::where('onay', 1)->where('yazi_id', $id)->get();
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(5)->get();
        $yeniyorumlar = Yorum::orderby('created_at', 'desc')->take(5)->get();

        return view('anasayfa.detay', compact('yazi', 'ilgililer', 'yorumlar', 'enfazlayorumlar', 'yeniyorumlar'));

    }

    public function yorumgonder(request $request)
    {
        $yorum = new Yorum();
        $yorum->user_id = Auth::user()->id;
        $yorum->yorum = request('yorum');
        $yorum->yazi_id = request('yazi');
        $yorum->rating=request('derece');

        $yorum->onay = 0;
        $yorum->save();

        $yazi=Yazi::find(request('yazi'));
        $rating=new Rating();
        $rating->rating=request('derece');
        $rating->user_id=Auth::user()->id;
        $yazi->ratings()->save($rating);

        alert()->flash('Teşekkürler', 'success', [
            'text' => 'Yorumunuz onay bekliyor',
            'timer' => 20000
        ]);
        return back();
    }

    public function kategori($id)
    {
        $kategori = Kategori::find($id);
        $yazilar = Yazi::where('kategori', $id)->orderby('created_at', 'desc')->paginate(5);
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(5)->get();
        $yeniyorumlar = Yorum::orderby('created_at', 'desc')->take(5)->get();

        return view('anasayfa.kategori', compact('kategori', 'enfazlayorumlar', 'yeniyorumlar', 'yazilar'));
    }

    public function sayfa($id)
    {
        $sayfa = Sayfa::find($id);
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(5)->get();
        $yeniyorumlar = Yorum::orderby('created_at', 'desc')->take(5)->get();
        return view('anasayfa.sayfa', compact('sayfa', 'enfazlayorumlar', 'yeniyorumlar'));
    }

    public function arama(request $request)
    {
        $this->validate(request(), array('kelime' => 'required'));
        $kelime = request('kelime');
        $sonuclar = Yazi::where('baslik', 'LIKE', '%' . $kelime . '%')->latest()->paginate(5); //lıke komutu benzer anlamın da kullanılır benzer olarak eşitlemek için %kullanıldı
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(5)->get();
        $yeniyorumlar = Yorum::orderby('created_at', 'desc')->take(5)->get();

        return view('anasayfa.arama', compact('sonuclar', 'enfazlayorumlar', 'yeniyorumlar'));
    }

    public function profilim()
    {

        if (!Auth::check()) {
            return redirect()->route('anasayfa');
        } else {
            $kullanici = Auth::user()->id;
            $profilim = User::find($kullanici);
            return view('anasayfa.profil', compact('profilim'));
        }


    }

    public function profilguncelle($id)
    {
        $kullanici = User::find($id);
        $kullanici->name = request('name');
        $kullanici->email = request('email');
        if (!empty(request('password'))) {
            if (request('password') != request('password_tekrar')) {
                alert()->flash('Hata', 'error', [
                    'text' => 'Şifreler Eşleşmiyor',
                    'timer' => 20000
                ]);
                return back();
            } else {
                $kullanici->password = Hash::make(request('password'));
            }
        }
        if (request()->hasFile('avatar')) {
            $this->validate(request(), array('avatar' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            $resim = request()->file('avatar');
            $dosya_adi = 'avatar' . '-' . time() . '.' . $resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uplaods/dosyalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $kullanici->avatar = $dosya_yolu;
            }
        }
        $kullanici->save();
        if ($kullanici) {
            alert()->flash('Başarılı', 'success', [
                'text' => 'Profiliniz Başarı ile Güncellendi',
                'timer' => 20000
            ]);
            return back();
        } else {
            alert()->flash('Hata', 'error', [
                'text' => 'Profiliniz Güncellenemedi',
                'timer' => 20000
            ]);
            return back();
        }
    }

    public function aboneol(request $request)
    {
        $kayitlimi = Newsletter::isSubscribed(request('email'));
        if ($kayitlimi) {
            alert()->flash('Hata', 'error', [
                'text' => 'E-Mail adresiniz zaten var',
                'timer' => 20000
            ]);
            return back();
        } else {
            $aboneol = Newsletter::subscribe(request('email'));
            if ($aboneol) {
                alert()->flash('Teşekkürler', 'succcess', [
                    'text' => 'E-Mail Adresiniz Kaydedildi',
                    'timer' => 20000
                ]);
                return back();

            }
        }
    }

    public function iletisim(){
    return view('anasayfa.iletisim');
    }
    public function iletisimkaydet(request $request)
    {
        $this->validate(request(), array(
            'adsoyad' => 'required',
            'email' => 'required',
            'mesaj' => 'required',
        ));
        $ayar = Ayar::find(1);
        $adres = $ayar->baslik;  //site başlığını çekiyoruz
        $mailadresim = $ayar->email;

        $bilgiler = array(
            'adsoyad' => request('adsoyad'),
            'email' => request('email'),
            'mesaj' => request('mesaj'),
            'sitebaslik' => $adres,

        );
        Mail::to($mailadresim)->send(new iletisimFormu($bilgiler));

        alert()->flash('Başarılı', 'success', [
            'text' => 'E-Mail Gönderildi',
            'timer' => 20000
        ]);
        return redirect()->route('anasayfa');
    }

    public function dildegistir($lang){
       Session::put('applocale',$lang);
       return redirect()->back();

    }


}
