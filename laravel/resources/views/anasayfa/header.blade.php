<header  class="header-area header-wrapper bg-white clearfix">
    <!-- Start Sidebar Menu -->
    <div class="sidebar-menu">
        <div class="sidebar-menu-inner"></div>
        <span class="fa fa-remove"></span>
    </div>
    <!-- End Sidebar Menu -->
    <div class="header-top-bar bg-dark ptb-10">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7  hidden-xs">
                    <div class="header-top-left">
                        <nav class="header-top-menu zm-secondary-menu">
                            <ul>
                                <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                                <li><a href="{{route('iletisim.formu')}}">İletişim</a></li>

                            @foreach($sayfalar as$sayfa )

                                <li><a href="/sayfa/{{$sayfa->id}}/{{$sayfa->slug}}">{{$sayfa->baslik}}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                    <div class="header-top-right clierfix text-right">
                        <div class="header-social-bookmark topbar-sblock">
                            <ul>
                                <li><a href="https://www.facebook.com/{{$ayar->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://plus.google.com/{{$ayar->google}}"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://twitter.com/{{$ayar->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://pinterest.com/{{$ayar->pinterest}}"><i class="fa fa-pinterest"></i></a></li>

                            </ul>
                        </div>

                        <div class="header-social-bookmark topbar-sblock">
                            <ul>
                                <li><a href="{{route('lang.switch','tr')}}">Türkçe</a></li>
                                <li><a href="{{route('lang.switch','en')}}">İngilizce</a></li>


                            </ul>
                        </div>

                        <div class="user-accoint topbar-sblock">

                            @if(!Auth::check())
                            <span class="login-btn uppercase">Giriş Yap</span>  |
                                <span class="kayit-btn uppercase"><a href="{{route('register')}}"> Kayıt Ol</a></span>

                                <div class="login-form-wrap bg-white">
                                <form method="POST" action="{{ route('login') }}" class="zm-signin-form text-left">
                                    @csrf
                                    <input id="email" type="email" class="zm-form-control username @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="EMail Adresiniz" required autocomplete="email" >

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <input id="password" type="password" class="zm-form-control password @error('password') is-invalid @enderror" name="password" placeholder="Şifreniz" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Beni Hatırla<br>
                                    <div class="zm-submit-box clearfix  mt-20">
                                        <input type="submit" value="Giriş">
                                        <a href="{{route("register")}}">Kayıt Ol</a>
                                    </div>
                                    <a href="#" class="zm-forget">Şifremi Unuttum</a>
                                </form>
                            </div>
                            @else
                                @if(Auth::user()->yetki=="admin")
                                    <span class="login-btn uppercase"><a href="{{route('yonetim.index')}}" >Yönetim Paneli </a></span> |
                                @endif
                                <span class="login-btn uppercase"><a href="/kullanici/">Profilim</a> </span> |
                                    <span class="login-btn uppercase"><a href="{{route('kullanici.cikis')}}"> Çıkış Yap </a></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-5 col-xs-12 header-mdh">
                    <div class="global-table">
                        <div class="global-row">
                            <div class="global-cell">
                                <div class="logo">
                                    <a href="{{route('anasayfa')}}">
                                        <img src="/{{$ayar->logo}}" alt="main logo">
                                    </a>
                                 {{--- <p class="site-desc">News blog & Magazine Template</p> ---}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($reklam->link1!="")
                <div class="col-md-8 col-lg-7 col-sm-7 col-xs-12 col-lg-offset-1 header-mdh hidden-xs">
                    <div class="global-table">
                        <div class="global-row">
                            <div class="global-cell">
                                <div class="advertisement text-right">
                                    <a href="{{$reklam->link1}}" class="block"><img src="{{$reklam->reklam1}}" alt="ad img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
    <div class="header-bottom-area hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="menu-wrapper  bg-theme clearfix">
                        <div class="row">
                            <div class="col-md-11">
                                <button class="sidebar-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                                <div class="mainmenu-area">
                                    <nav class="primary-menu uppercase">
                                        <ul class="clearfix">
                                        @foreach($kategoriler as $kategori)

                                            <li class="current drop"><a href="/kategori/{{$kategori->id}}/{{$kategori->slug}}">{{$kategori->baslik}}</a>

                                       @if($kategori->altkategori->count())

                                                <ul class="dropdown">
                                                    @foreach($kategori->altkategori as $altkategori)

                                                            <li><a href="/kategori/{{$altkategori->id}}/{{$altkategori->slug}}">{{$altkategori->baslik}}</a></li>



                                                       @endforeach
                                                        </ul>
                                                @endif
                                                    </li>



                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="search-wrap pull-right">
                                    <div class="search-btn"><i class="fa fa-search"></i></div>
                                    <div class="search-form">
                                        <form action="{{route('arama.yap')}}" method="GET">
                                            {{csrf_field()}}
                                            <input type="search" placeholder="Arama Yap" name="kelime">
                                            <button type="submit"><i class='fa fa-search'></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</header>
