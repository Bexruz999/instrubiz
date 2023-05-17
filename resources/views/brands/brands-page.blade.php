@extends('layouts.app')

@section('title')
    {{"$brand->name | $country->name " }} InstruBiz
@endsection

@section('content')

    @include('brands.service-detail')
    <x-footer></x-footer>
@endsection
