@extends('layouts.app')

@section('title')
    Supplier of Test & Measurement Instruments in {{ $country->name }} - Instrubiz
@endsection

@section('description')
    In instrubiz store you will find all the best in Test and Measurement, Industrial Instruments. More than 200 brands of industrial appliances with fast delivery to {{ $country->shop_desc }}
@endsection

@section('content')
    <x-page-header>
        <h1>
        <span style="font-size: 24px">Test & Measurement Instruments</span>
            <br />
        <span style="color: #ffffff">
            SUPPLIER AND RESELLER IN {{ $country->name }}
        </span>
        </h1>
        <a class="bg_button" href="/store/brands" rel="external">Our Products </a>
    </x-page-header>
    @include('homepage.sevice')
    @include('homepage.aboute')
    @include('forms.contactform')
    <x-footer></x-footer>
@endsection
