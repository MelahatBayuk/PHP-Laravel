<footer id="footer" class="footer-wrapper footer-1">
    <!-- Start footer top area -->
    <div class="footer-top-wrap ptb-70 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 hidden-sm">
                    <div class="zm-widget pr-40">
                        <h2 class="h6 zm-widget-title uppercase text-white mb-30">Hakkımızda</h2>
                        <div class="zm-widget-content">
                            <p>{{$ayar->hakkimizda}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6 col-lg-2">
                    <div class="zm-widget">
                        <h2 class="h6 zm-widget-title uppercase text-white mb-30">Sosyal Medya</h2>
                        <div class="zm-widget-content">
                            <div class="zm-social-media zm-social-1">
                                <ul>
                                    <li><a href="https://www.facebook.com/{{$ayar->facebook}}"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li><a href="https://twitter.com/{{$ayar->twitter}}"><i class="fa fa-twitter"></i>Twitter</a></li>
                                    <li><a href="https://www.pinterest.com/{{$ayar->pinterest}}"><i class="fa fa-pinterest"></i>Pinterest</a></li>
                                    <li><a href="https://www.instagram.com/{{$ayar->instagram}}"><i class="fa fa-instagram"></i>Instagram</a></li>
                                    <li><a href="https://plus.google.com/{{$ayar->google}}"><i class="fa fa-google-plus"></i>GooglePlus</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6 col-lg-3">
                    <div class="zm-widget pr-50 pl-20">
                        <h2 class="h6 zm-widget-title uppercase text-white mb-30">Linkler</h2>
                        <div class="zm-widget-content">
                            <div class="zm-category-widget zm-category-1">
                                <ul>
                                    @foreach($sayfalar as$sayfa )

                                        <li><a href="/sayfa/{{$sayfa->id}}/{{$sayfa->slug}}">{{$sayfa->baslik}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6 col-lg-3">
                    <div class="zm-widget">
                        <h2 class="h6 zm-widget-title uppercase text-white mb-30">Ücretsiz E-Mail Aboneliği</h2>
                        <!-- Start Subscribe From -->
                        <div class="zm-widget-content">
                            <div class="subscribe-form subscribe-footer">
                                <p>Haber Bültenimize Ücretsiz Kayıt Olabilirsiniz.</p>
                                <form action="{{route('abone.ol')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="email" name="email" placeholder="E-Mail Adresiniz " required>
                                    <input type="submit" style="background-color:orangered; color: white; width:310px;  height: 40px;" value="Abone Ol">
                                </form>
                            </div>
                        </div>
                        <!-- End Subscribe From -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer top area -->
    <div class="footer-buttom bg-black ptb-15">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="zm-copyright">
                        <p class="uppercase">&copy; {{$ayar->baslik}}</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 text-right hidden-xs">
                    <nav class="footer-menu zm-secondary-menu text-right">
                        <ul>
                            @foreach($sayfalar as$sayfa )

                                <li><a href="/sayfa/{{$sayfa->id}}/{{$sayfa->slug}}">{{$sayfa->baslik}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>