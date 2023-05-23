@extends('layouts.app')

@section('title')
    Test and measurement, Industrial Instruments brands in {!! $country->name !!} | Instrubiz
@endsection
@section('description')
    A wide selection of world brands of measuring instruments at the best prices in {{ $country->shop_desc }}.
@endsection

@section('content')

    <x-page-header>
        <div class="container">
            <h1>ALL MAJOR BRANDS OF INSTRUMENTATION AT THE BEST PRICES IN THE {!! $country->name !!}</h1>
            <nav class="breadcrumbs">
                <a class="home" href="/"><span>Home</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span>Brands</span>
            </nav>
        </div>
    </x-page-header>
    @include('brands.service')
    <x-footer></x-footer>
@endsection
