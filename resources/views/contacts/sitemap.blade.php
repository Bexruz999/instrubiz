@extends('layouts.app')

@section('title')
    Sitemap | Instrubiz
@endsection

@section('description')
    Instrubiz Sitemap Information
@endsection

@section('styles')
    <meta property="og:image" content="https://instrubiz.ae/storage/{!!str_replace("\\","/",setting('site.logo'))!!}">
    <meta property="og:type" content="contact">
    <link rel="canonical" href="https://instrubiz.ae/sitemap"/>
@endsection

@section('content')

    <x-page-header>
        <div class="container">
            <h1>Sitemap</h1>
            <nav class="breadcrumbs">
                <a class="home" href="/"><span>Home</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span>Sitemap</span>
            </nav>
        </div>
    </x-page-header>
    @include('contacts.sitemap-service')
    <x-footer></x-footer>
@endsection
