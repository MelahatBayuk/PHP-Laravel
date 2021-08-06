<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$ayar->baslik}}</title>
    <meta name="description" content="{{$ayar->aciklama}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/anasayfa/images//favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="/anasayfa/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="/anasayfa/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="/anasayfa/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/anasayfa/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="/anasayfa/css/custom.css">
    <link href="/anasayfa/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
    <link href="/anasayfa/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- Style customizer (Remove these lines please) -->
    <link rel="stylesheet" href="/anasayfa/css/style-customizer.css">
    <link href="#" data-style="styles" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
@yield('css')
<!-- Modernizr JS -->
    <script src="/anasayfa/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start of header area -->
@include('anasayfa.header')
    @if(request()->route()->getName()=='anasayfa')

        @include('anasayfa.flash')
        @include('anasayfa.yenislider')

    @endif
      <section id="page-content" class="page-wrapper">
        <!-- End Popular News [layout A+D]  -->
       @yield('icerik')

    </section>
    <!-- End page content -->
    <!-- Start footer area -->
  @include('anasayfa.footer')
    <!-- End footer area -->
</div>
<!-- Body main wrapper end -->



<!-- Placed js at the end of the document so the pages load faster -->
<!-- jquery latest version -->
<script src="/anasayfa/js/vendor/jquery-1.12.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="/anasayfa/js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="/anasayfa/js/owl.carousel.min.js"></script>
<script src="/anasayfa/js/plugins.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="/anasayfa/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script src="/anasayfa/js/star-rating.min.js" type="text/javascript"></script>
<script src="/anasayfa/krajee-svg/theme.js"></script>
<script>
    // initialize with defaults
    $("#input-id").rating();

    // with plugin options (do not attach the CSS class "rating" to your input if using this approach)
    $("#input-id").rating({'size':'xs'});
</script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


@yield('js')
</body>

</html>