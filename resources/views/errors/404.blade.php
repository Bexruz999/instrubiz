@extends('layouts.app')
@section('content')
    <div id="content" class="site-content error404">
        <div class="container">
            <div class="row">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <section class="error-404 not-found">
                            <header class="page-header">
                                <img src="{{ asset ('/img/oops.png') }}" alt="oops">
                                <br />
                                <br />
                                <p class="line-1">The page you requested was not found. We have been notified of the problem and we will do our best to fix it as soon as possible. Please return to our homepage or search the site:</p>
                                <br />

                                <form class="" id="yw1" action="/store" method="GET">
                                    <div class="input-group input-group-lg search_404">
                                        <input type="text" class="form-control" name="q" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        <button type="submit" class="btn btn-dark">Search</button>
                                    </div>
                                </form>

                            </header>
                            <div class="page-content">
                                <div class="back-home">
                                    <a href="/"><button type="button" style="color: #000; font-size: 18px;" class="btn">Back to Home Page</button></a>
                                </div>

                            </div>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
@endsection
