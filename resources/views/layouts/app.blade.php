<!DOCTYPE html>
<html lang="{{Lang::locale()}}">
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--<title>Supplier of Test &amp; Measurement Instruments in UAE</title>--}}
    <title>@yield('title')</title>
    <meta name="description" content="Buy Test and Measurement, Industrial Instruments at best prices in UAE">
    <meta name="keywords" content="">
    <meta name="yandex-verification" content="1eed189587ffd83f">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset ('/css/bootstrap.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset ('/css/font-awesome.css') }}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{ asset ('/css/flaticon.css') }}">
    <!-- factoryplus-icons css -->
    <link rel="stylesheet" href="{{ asset ('/css/factoryplus-icons.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset ('/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset ('/css/jquery.fancybox.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/hover.css') }}">

    <link rel="stylesheet" href="{{ asset ('/css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/responsive.css') }}">

    <style>
        .header-v5 .main-nav ul.menu>li:not(.mf-active-menu) {
            background-image: url("{{ asset ('/css/menu-seperate.png') }}");
        }
    </style>

    <!--Favicon-->
    <link rel="icon" href="{{ asset ('/favicon.ico') }}" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset ('/css/responsive.css') }}">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="/assets/ddc9e813/js/respond.js"></script><![endif]-->

    <script type="text/javascript">
        var yupeTokenName = 'YUPE_TOKEN';
        var yupeToken = 'U3NiNWx4T34xVkhYQ0ZzVkFkcVNQeUtyc2ZTbDFhc2nOIHMgE-TVR7pPsLMj-JUCQsPJzgU90VtCuUEPT-XsXA==';
    </script>
    <!-- Google tag (gtag.js) -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-JLYN90MHF5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-JLYN90MHF5');
    </script>
</head>
<body class=" text-xl">

@include('homepage.header')
@yield('content')
<a id="scroll-top" class="backtotop" href="#page-top"><i class="fa fa-angle-up"></i></a>



<!-- jquery Liabrary -->
<script src="{{ asset ('/js/jquery.min.js') }}"></script>
<script src="{{ asset ('/js/jquery-1.12.4.min.js') }}"></script>
<!-- bootstrap v3.3.6 js -->
<script src="{{ asset ('/js/bootstrap.min.js') }}"></script>


<!-- counter js -->
<script src="{{ asset ('/js/jquery.appear.js') }}"></script>
<script src="{{ asset ('/js/jquery.countTo.js') }}"></script>
<!-- validate js -->
<script src="{{ asset ('/js/validate.js') }}"></script>
<!-- switcher js -->
<script src="{{ asset ('/js/switcher.js') }}"></script>


<!-- script JS  -->
<script src="{{ asset ('/js/scripts.min.js') }}"></script>
<script src="{{ asset ('/js/script.js') }}"></script>
<script src="{{ asset ('/js/contact.js') }}"></script>

<div>
    <div style="display: none; position: fixed; top: 30px; width: auto; max-width: 100%; text-align: center; left: 50%; transform: translateX(-50%); z-index: 99999999;"><div style="display: inline-block; font-size: 14px; font-weight: bold; border: 1px solid rgb(240, 195, 109); background-color: rgb(249, 237, 190); padding: 0px 10px; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px;"></div>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation-cjs@1.0.0/dist/jquery.validate.min.js">

</script>
@stack("javascript")
</html>
