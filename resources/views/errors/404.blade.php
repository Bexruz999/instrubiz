@extends('layouts.app')
<!-- test -->
@section('content')

    <div id="content" class="site-content error404">
        <div class="container">
            <div class="row">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <section class="error-404 not-found">
                            <header class="page-header">
                                <h1 class="page-title">404</h1>
                                <p class="line-1">Unable to resolve the request "admin".</p>
                            </header>
                            <!-- .page-header -->

                            <div class="page-content">
                                <div class="back-home">
                                    <a href="/">Back to Home Page</a>
                                </div>

                            </div>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
