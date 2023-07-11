@extends('layouts.app')

@section('title')
    Producers list
@endsection

@section('content')

    <x-page-header></x-page-header>

    @include('products.site-content')

    <x-footer>{{ $country->name }}</x-footer>

@endsection
