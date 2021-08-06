<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$ayar->baslik}}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="/admin/css/matrix-media.css" />
    <link href="/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/admin/css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Merhaba,{{Auth::user()->name}}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{route('kullanici.duzenle',Auth::user()->id)}}" ><i class="icon-user"></i>  Profilim</a></li>

                <li class="divider"></li>
                <li><a href="{{route('yonetim.cikis')}}"><i class="icon-key"></i> Çıkış</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="{{route('yonetim.index')}}" class="visible-phone"><i class="icon icon-home"></i> Yonetim Anasayfa</a>
    <ul>
        <li class="active"><a href="{{route('yonetim.index')}}"><i class="icon icon-home"></i> <span>Yonetim Paneli</span></a> </li>

        <li><a href="{{route('anasayfa')}}" target="_blank"><i class="icon icon-home"></i> <span>Site Anasayfa</span></a> </li>




        <li><a href="{{route('ayarlar.index')}}"><i class="icon  icon-cog"></i> <span>Site Ayarları</span></a> </li> <!---menüde ekleme --->
        <li><a href="{{route('kategoriler.index')}}"><i class="icon  icon-folder-open"></i> <span>Kategori Yönetimi</span></a> </li>
        <li><a href="{{route('yazilar.index')}}"><i class="icon  icon-pencil"></i> <span>İçerik Yönetimi</span></a> </li>
        <li><a href="{{route('kullanici.index')}}"><i class="icon  icon-user"></i> <span>Kullanıcı Yönetimi</span></a> </li>
        <li><a href="{{route('sayfalar.index')}}"><i class="icon  icon-copy"></i> <span>Sayfa Yönetimi</span></a> </li>
        <li><a href="{{route('yorumlar.index')}}"><i class="icon  icon-comment"></i> <span>Yorum Yönetimi</span></a> </li>
        <li><a href="{{route('reklam.goster')}}"><i class="icon  icon-link"></i> <span>Reklam Yönetimi</span></a> </li>
        <li><a href="{{route('ceviri.index')}}"><i class="icon  icon-edit"></i> <span>Çeviri Yönetimi</span></a> </li>

    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
       @yield('icerik')
        </div>
        <!--End-Action boxes-->


    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->

<script src="/admin/js/excanvas.min.js"></script>
<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/js/jquery.ui.custom.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/jquery.flot.min.js"></script>
<script src="/admin/js/jquery.flot.resize.min.js"></script>
<script src="/admin/js/jquery.peity.min.js"></script>
<script src="/admin/js/matrix.js"></script>
<script src="/admin/js/matrix.dashboard.js"></script>
<script src="/admin/js/jquery.gritter.min.js"></script>
<script src="/admin/js/matrix.interface.js"></script>
<script src="/admin/js/jquery.validate.js"></script>
<script src="/admin/js/matrix.form_validation.js"></script>
<script src="/admin/js/jquery.uniform.js"></script>
<script src="/admin/js/select2.min.js"></script>
<script src="/admin/js/jquery.dataTables.min.js"></script>
<script src="/admin/js/matrix.tables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
@include('sweetalert::alert')
<?php

/*alert()->warning('Hatalı','Güncelleme Yapılamadı'); */


?>

@yield('js')




</body>
</html>
