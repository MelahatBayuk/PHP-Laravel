@extends('anasayfa/template')
@section('icerik')
    <section id="page-content" class="page-wrapper">
        <!-- Start contact address area  -->
        <div class="zm-section bg-white ptb-65">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-4 col-sm-8">
                        <div class="section-title-2 mb-40">
                            <h3 class="inline-block uppercase">İletişim Formu</h3>
                            <p>Aşağıdaki Formu kullanarak Bize Ulaşabilirsiniz</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="single-address text-center">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <h4>Adres</h4>
                            <p>{{$ayar->adres}}</p>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 xs-mt-30">
                        <div class="single-address text-center">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <h4 class="uppercase">Email Adresi</h4>
                            <p>{{$ayar->email}}</p>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 xs-mt-30">
                        <div class="single-address text-center">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4 class="uppercase">Telefon</h4>
                            <p>{{$ayar->telefon}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End contact address area  -->
        <!-- Start contact message area -->
        <div class="zm-section bg-white pt-60 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="section-title-2 mb-40">
                            <h3 class="inline-block uppercase">İletişim Formu</h3>
                        </div>
                    </div>
                </div>
                <div class="message-box">
                    <form action="{{route('iletisim.gonder')}}"  id="contact-form" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="adsoyad" placeholder="Adınız-Soyadınız">
                                <input type="email" name="email" placeholder="Email Adresiniz*">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="mesaj" placeholder="Mesajınız..."></textarea>
                                <button class="submit-button" type="submit">Gönder</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
        <!-- End contact message area -->
    </section>



@endsection
@section('css')
@endsection
@section('js')
@endsection