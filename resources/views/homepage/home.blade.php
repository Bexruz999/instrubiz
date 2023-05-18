@extends('layouts.app')

@section('title')
    Supplier of Test &amp; Measurement Instruments in {{ $country->name }}
@endsection
@section('content')
    <x-page-header>
        <p style="color: #f7c02d;font-weight: 900;font-size: 24px">Test &amp; Measurement Instruments</p>
        <h1 style="color: #ffffff">Supplier and Reseller in {{ $country->name }}</h1>
        <a class="bg_button" href="/store/brands">Our Products </a>
    </x-page-header>
    @include('homepage.sevice')
    @include('homepage.aboute')
    @include('forms.contactform')
    <x-footer></x-footer>
@endsection
