@extends('anasayfa.template')

@section('icerik')

    <form method="POST" action="{{ route('password.email') }}">
        @csrf


        <div class="zm-section bg-white pt-40 pb-70 " >
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <div class="section-title-2 mb-40">
                            <h3 class="inline-block uppercase">Kayıp Şifre Talebi</h3>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="registation-form-wrap">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="single-input">
                                <label>E-Mail Adresi:</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="row">
                                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                    <div class="single-input">
                                        <button class="submit-button mt-20 inline-block" type="submit">Şİfremi Gönder</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
@endsection
