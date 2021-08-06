<div class="slider-post-area">
    <div class="container">
        <div class="row">
            <!-- Start Left side -->
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-8">
                <div class="slider-post-area-content">
                    <ul class="slide-posts owl-carousel list-unstyled">

                      @foreach($sliders as $slider)

                        <li class="item">
                            <a href="/yazi/{{$slider->id}}/{{$yazi->slug}}" ><img src="/{{$slider->resim}}" alt="img" width="803" height="467"></a>
                        </li>

                        @endforeach
                    </ul><!--/.owl-slider-->
                    <ul class="posts-thumbnails-wrapper list-unstyled">

                        @foreach($sliders as $slider)
                        <li class="post-thumbnail">
                            <a href="#"><img  src="/{{$slider->resim}}" alt="img" width="138" height="78"></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- End Left side -->

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-md">
                <!-- Start post layout E -->
                <aside class="zm-post-lay-e-area">
                    <div class="row mb-40">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="section-title">

                                <h5><a data-toggle="tab" href="#latest_posts">POPÜLER İÇERİKLER</a></h5>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="zm-posts">
                                <!-- Start Latest Posts -->


                                    @foreach($populer as $pop)

                                        <article class="zm-post-lay-e zm-single-post clearfix">
                                            <div class="zm-post-thumb f-left">
                                                <a href="/yazi/{{$pop->id}}/{{$pop->slug}}"><img src="/{{$pop->resim}}" alt="img"></a>
                                            </div>
                                            <div class="zm-post-dis f-right">
                                                <div class="zm-post-header">
                                                    <h2 class="zm-post-title"><a href="/yazi/{{$pop->id}}/{{$pop->slug}}">{{$pop->baslik}}</a></h2>
                                                    <div class="zm-post-meta">
                                                        <ul>
                                                            <li class="s-meta">Yazar :<a href="#" class="zm-author">{{$pop->kullanici->name}}</a></li>
                                                            <li class="s-meta">Tarih :<a href="#" class="zm-date">{!! date('d-m-y',strtotime($pop->created_at))  !!}</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach



                                </div>
                            </div>
                        </div>

                </aside>
                <!-- End post layout E -->
            </div>
            <!-- End Right side -->
        </div>
    </div>
</div>