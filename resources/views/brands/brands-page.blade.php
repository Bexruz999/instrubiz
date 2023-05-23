@extends('layouts.app')

@section('title')
    {{"$brand->name in $country->name" }}
@endsection

@section('description')
    Buy for {!! $brand->name !!} Products at the profitable price in {!! $country->shop_desc !!} on Instrubiz
@endsection

@section('content')

    @include('brands.service-detail')
    <x-footer></x-footer>
@endsection
