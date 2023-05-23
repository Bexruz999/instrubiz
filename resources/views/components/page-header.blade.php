<div class="page-header has-image">
    <div class="page-header-content" style="background-image: url('/storage/{!!str_replace("\\","/",setting('site.header_bg'))!!}')">
        <div class="container text-center">
            <div class="header-content">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
