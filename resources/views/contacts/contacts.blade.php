@extends('layouts.app')

@section('title')
    Contacts | Instrubiz
@endsection

@section('description')
    Instrubiz Contact Information
@endsection

@section('styles')
    <meta property="og:image" content="https://instrubiz.ae/storage/{!!str_replace("\\","/",setting('site.logo'))!!}">
    <meta property="og:type" content="contact">
    <link rel="canonical" href="https://instrubiz.ae/contacts"/>
@endsection

@section('content')

    <x-alerts></x-alerts>
    <x-page-header>
        <div class="container">
            <h1>CONTACT US</h1>
            <nav class="breadcrumbs">
                <a class="home" href="/"><span>Home</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span>Contact us</span>
            </nav>
        </div>
    </x-page-header>
    @include('contacts.service')
    <x-footer>{{ $country->name }}</x-footer>
@endsection
