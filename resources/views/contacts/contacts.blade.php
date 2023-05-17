@extends('layouts.app')

@section('title')
    Contact us
@endsection

@section('content')

    <x-page-header>
        <div class="container">
            <h1>Contact us</h1>
            <nav class="breadcrumbs">
                <a class="home" href="/"><span>Home</span></a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span>Contact us</span>
            </nav>
        </div>
    </x-page-header>
    @include('contacts.service')
    <x-footer></x-footer>
@endsection
