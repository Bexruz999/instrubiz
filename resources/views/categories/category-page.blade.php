@extends('layouts.app')

@section('title')
    {!! $category->name !!} in {!! $country->name !!} | Instrubiz
@endsection

@section('description')
    Shop for {!! $category->name !!} and other test & measurement instruments in {!! $country->shop_desc !!} with Instubiz
@endsection

@section('content')

    @include('categories.service-detail')
    <x-footer></x-footer>
@endsection
