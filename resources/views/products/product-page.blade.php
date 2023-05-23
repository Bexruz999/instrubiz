@extends('layouts.app')

@section('title')
    Buy {!! $product->name !!} in {!! $country->name !!} | Instrubiz
@endsection

@section('description')
    {!! $product->name !!} and other {!! $product->category->name !!} at the best price in {!! $country->shop_desc !!} on Instrubiz
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')

    <x-page-header>
        <div class="container">
            <h1>{{"$product->name | $country->name"}}</h1>
            <nav class="breadcrumbs">
                <a class="home" href="/"><span>Home</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a class="home"
                   href="/store/{!! $product->category->slug !!}"><span>{!! $product->category->name !!}</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span>{!! "$product->name | $country->name"!!}</span>
            </nav>
        </div>
    </x-page-header>
    @include('products.product')
    <x-footer></x-footer>
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
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
        });
    </script>
@endsection
