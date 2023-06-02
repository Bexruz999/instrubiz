@extends('layouts.app')

@section('title')
    Test and measurement, Industrial Instruments product categories in {!! $country->name !!} | Instrubiz
@endsection

@section('description')
    More than 100 categories of test & measurement Instruments  from world manufacturers at the best prices in {!! $country->shop_desc !!} - Instrubiz
@endsection

@section('styles')
    <meta property="og:type" content="product">
    <link rel="canonical" href="{{ url('') }}/store/categories"/>
@endsection

@section('content')
    <x-page-header>
        <div class="container">
            <h1>SHOP FOR ALL MAJOR TEST AND MEASUREMENT INSTRUMENT BRANDS AT BEST PRICES IN {!! $country->name !!}</h1>
            <nav class="breadcrumbs">
                <a class="home" href="/"><span>Home</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span> Categories</span>
            </nav>
        </div>
    </x-page-header>
    @include('categories.service')
    <x-footer></x-footer>
@endsection
