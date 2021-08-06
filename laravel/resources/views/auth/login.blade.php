@extends('anasayfa.template')

@section('icerik')
    <form method="POST" action="{{ route('login') }}">
        @csrf


        <div class="zm-section bg-white pt-40 pb-70 "  style="width: 700px; margin: 0 auto;" >
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <div class="section-title-2 mb-40">
                            <h3 class="inline-block uppercase">Giriş Yap</h3>
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
                            <div class="single-input">
                                <label>Şifre:</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="single-input">

                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Beni Hatırla
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="single-input">
                                <button class="submit-button mt-20 inline-block" type="submit">Giriş Yap</button>
                            </div>
                            <div class="single-input" style=" margin-top:10px;">
                                <a href="{{route('password.request')}}" class="submit-button mt-20 inline-block"> Şifremi Unuttum</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
