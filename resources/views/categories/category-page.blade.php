@extends('layouts.app')

@section('title')
    Order {{$category->name}}
@endsection

@section('content')

    @include('categories.service-detail')
    <x-footer></x-footer>
@endsection
