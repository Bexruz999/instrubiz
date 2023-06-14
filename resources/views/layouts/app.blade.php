<!DOCTYPE html>
<html lang="{{Lang::locale()}}">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(93798272, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/93798272" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="">
    <meta name="yandex-verification" content="1eed189587ffd83f">
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta name="robots" content="index, follow">
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

    <link rel="stylesheet" href="{{ asset ('/css/jquery.fancybox.css') }}"/>
    <link rel="stylesheet" href="{{ asset ('/css/hover.css') }}">

    <link rel="stylesheet" href="{{ asset ('/css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/responsive.css') }}">

    <style>
        .header-v5 .main-nav ul.menu > li:not(.mf-active-menu) {
            background-image: url("{{ asset ('/css/menu-seperate.png') }}");
        }
    </style>

    <!--Favicon-->
    <link rel="icon" href="{{ asset ('/favicon.ico') }}" type="image/x-icon">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset ('/css/responsive.css') }}">

    <script type="text/javascript">
        var yupeTokenName = 'YUPE_TOKEN';
        var yupeToken = 'U3NiNWx4T34xVkhYQ0ZzVkFkcVNQeUtyc2ZTbDFhc2nOIHMgE-TVR7pPsLMj-JUCQsPJzgU90VtCuUEPT-XsXA==';
    </script>
    <!-- Google tag (gtag.js) -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-JLYN90MHF5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-JLYN90MHF5');
    </script>
    @yield('styles')
</head>
<body class=" text-xl">
@include('homepage.header')


@yield('content')


<div class="primary-mobile-nav header-v1" id="primary-mobile-nav" role="navigation">
    <a href="#" class="close-canvas-mobile-panel">×</a>
    <ul class="menu" id="yw3">
        <li class="listItem nav_item"><a class="listItemLink" href="/">Home</a></li>
        <li class="listItem nav_item"><a class="listItemLink" href="/store/brands">Brands</a></li>
        <li class="listItem nav_item"><a class="listItemLink" href="/store/categories">Categories</a></li>
        <li class="listItem nav_item"><a class="listItemLink" href="/contacts">Contacts</a></li>
    </ul>
</div>
<a id="scroll-top" class="backtotop" href="#page-top"><i class="fa fa-angle-up"></i></a>


<!-- jquery Liabrary -->
<script src="{{ asset ('/js/jquery.min.js') }}"></script>
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
    <div
        style="display: none; position: fixed; top: 30px; width: auto; max-width: 100%; text-align: center; left: 50%; transform: translateX(-50%); z-index: 99999999;">
        <div
            style="display: inline-block; font-size: 14px; font-weight: bold; border: 1px solid rgb(240, 195, 109); background-color: rgb(249, 237, 190); padding: 0px 10px; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px;"></div>
    </div>

    <div class="callBack">
        <div class="callBack__body">
            <div class="callBack__icon">
                <img src="{{ asset ('/storage/icons/call.svg') }}" alt="call">
            </div>
            <a href="tel:+971589285102" class="callBack__phone">
                <img src="{{ asset ('/storage/icons/phoneicon.svg') }}" alt="phone">
            </a>
            <a href="https://wa.me/971589285102" class="callBack__whatsApp">
                <img src="{{ asset ('/storage/icons/chaticon.svg') }}" alt="whatsApp">
            </a>
            <a href="mailto:inquiry@instrubiz.com" class="callBack__mail">
                <img src="{{ asset ('/storage/icons/mailicon.svg') }}" alt="mail">
            </a>
        </div>
    </div>
</div>

@yield('scripts')
</body>

<script>
    let btn = document.querySelector('.callBack__icon');
    let phone = document.querySelector('.callBack__phone');
    let whatsApp = document.querySelector('.callBack__whatsApp');
    let mail = document.querySelector('.callBack__mail');

    btn.onclick = function () {
        phone.classList.toggle('active')
        whatsApp.classList.toggle('active')
        mail.classList.toggle('active')
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation-cjs@1.0.0/dist/jquery.validate.min.js">

</script>
@stack("javascript")
</html>
