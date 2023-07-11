@extends('layouts.app')

@section('title')
    {!! $product->name !!} in {!! $country->name !!} | Instrubiz
@endsection

@section('description')
    Buy {!! $product->name !!} and other {!! $product->category->name !!} at the best price in {!! $country->shop_desc !!} on Instrubiz | {{ Arr::get($producer, 'name', '') }} Supplier and Reseller in {!! $country->name !!}
@endsection

@section('styles')
    <meta property="og:image" content="{{$product->image}}">
    <meta property="og:type" content="product">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="canonical" href="{{ url('') }}/store/{!! $product->category->slug !!}/{{ $product->slug }}.html"/>
@endsection

@section('content')

    <x-page-header>
        <div class="container">
            <h1>{{"$product->name in $country->shop_desc"}}</h1>
            <nav class="breadcrumbs">
                <a class="home" href="/"><span>Home</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a class="home"
                   href="/store/{!! $product->category->slug !!}"><span>{!! $product->category->name !!}</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span>{!! "$product->name in $country->name"!!}</span>
            </nav>
        </div>
    </x-page-header>
    @include('products.product')
    <x-footer>{{ $country->name }}</x-footer>
@endsection

@section('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $('#slider').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 2,
            autoplay: true,
            arrows: true,
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
@endsection
