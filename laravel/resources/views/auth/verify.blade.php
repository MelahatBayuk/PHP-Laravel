@extends('anasayfa.template')

@section('icerik')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lütfen Email Adresinizi Onaylayın') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Yeni Bir Onay Linki email adresinize gönderilmiştir.') }}
                        </div>
                    @endif

                    {{ __('devam etmeden önce lütfen email adresinize gelen aktivasyon linkine tıklayın.') }}
                    {{ __('eğer email almadıysanız ') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('yenisini talep edebilirsiniz.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
