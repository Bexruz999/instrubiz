@extends('layouts.app')

@section('title')
    Producers list
@endsection

@section('content')

    <x-page-header>
        <div class="container">
            <h1>Shop for all major Test and Measurement Instrument Brands at Best Prices in UAE</h1>
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
