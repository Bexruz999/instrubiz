@extends('layouts.app')

@section('title')
    Buy {{ $product->name }}
@endsection

@section('content')

    <x-page-header>
        <div class="container">
            <h1>{{"$product->name | $country->name"}}</h1>
            <nav class="breadcrumbs">
                <a class="home" href="/"><span>Home</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a class="home" href="/store/{{ $category }}"><span>{{ $product->category->name }}</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span>{{"$product->name | $country->name"}}</span>
            </nav>
        </div>
    </x-page-header>
    @include('products.product')
    <x-footer></x-footer>
@endsection
