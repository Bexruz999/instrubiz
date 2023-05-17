<div class="page-header has-image">
    <div class="page-header-content">
        <div class="featured-image" style="background-image: url('/storage/{!!str_replace("\\","/",setting('site.header_bg'))!!}')"></div>
        <div class="container text-center">
            {{ $slot }}
        </div>
    </div>
</div>
