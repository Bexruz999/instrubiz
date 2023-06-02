@extends('layouts.app')

@section('title')
    {{"$brand->name Suppliers and Dealers in $country->name" }}
@endsection

@section('description')
    Buy {!! $brand->name !!} Products at the profitable price in {!! $country->shop_desc !!} on Instrubiz
@endsection

@section('styles')
    <meta property="og:image" content="{{$brand->image}}">
    <meta property="og:type" content="brand">
    <link rel="canonical" href="{{ url('') }}/store/brand/{!! $brand->slug !!}"/>
@endsection

@section('content')

    @include('brands.service-detail')
    <x-footer></x-footer>
@endsection
