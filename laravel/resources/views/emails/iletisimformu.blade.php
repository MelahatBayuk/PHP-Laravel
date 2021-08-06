@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $gidecekler['sitebaslik'] }}
        @endcomponent
    @endslot

    {{-- Body --}}
    **Gönderen:** <!--2 * yazıyı kalın yapar---> {{$gidecekler['adsoyad']}}<br>
    **E-Mail Adresi:**  {{$gidecekler['email']}}<br>
    **Mesajınız**  {{$gidecekler['mesaj']}}<br>


    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
