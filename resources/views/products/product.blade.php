<div id="content" class="site-content woocommerce sidebar-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-9 col-sm-12 col-xs-12">
                <div class="product" itemscope itemtype="http://schema.org/Product">

                    <div class="mf-product-details clearfix">
                        <div class="product-image">
                            <img src="{{ $product->image }}" class="product-gallery__main-img"
                                 itemprop="image" alt="{{ $product->image_alt }}" title="{{ $product->name }}">
                        </div>
                        <div class="product-summary entry-summary">
                            <h2 itemprop="name" class="product_title entry-title">{{ "$product->name - $country->name" }} </h2>
                            <span><b>Category:</b>
                                <a style="color: #0a6aa1 !important;font-weight: 800"
                                   href="/store/{!! $category !!}">{!! $product->category->name !!}</a>
                            </span>
                            <br>
                            <span><b>Manufacturer:</b>
                            @if(Arr::get($product->producer, 'slug', null))
                                    <a itemprop="brand" style="color: #0a6aa1 !important;font-weight: 800"
                                       href="/store/brand/{{ Arr::get($product->producer, 'slug', null) }}">{{$product->producer->name}}</a>
                                @endif
                            </span>

                            <div itemprop="description" class="woocommerce-product-details__short-description">
                                {!! str_replace('Learn more...', '', $product->short_description ) !!}
                                <br>
                                <h2 style="font-size: 18px;font-weight: 800">
                                    InstruBiz is a leading supplier and reseller of {{$product->producer->name}} in {{ $country->name }}, and we ship to all major cities such as {{ $country->shop_desc }}
                                </h2>
                            </div>

                            <a href="mailto:inquiry@instrubiz.com" class="button">
                                Request a Quote
                            </a>
                            <a href="{{ setting('site.whatsapp') }}?text=Hello, I want to order {{ $product->name }}" class="button">
                                WhatsApp us
                            </a>
                        </div>
                    </div>

                    <!--product tab-->
                    <div class="panel with-nav-tabs panel-default woocommerce-tabs">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab" aria-expanded="true">Description</a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            {!! preg_replace('#<div class="razzle-dazzle">[.\n\s\w<="/ ->]*</div>#', '</div>', $product->description) !!}
                        </div>
                    </div>
                    <link itemprop="availability" href="http://schema.org/InStock">
                </div>
            </div>

            <aside id="primary-sidebar" class="widgets-area primary-sidebar shop-sidebar col-xs-12 col-sm-12 col-md-3">
                <div class="induscity-widget">
                    <div class="widget woocommerce widget_product_categories">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="product-categories">
                        @foreach ($categories as $producer)
                                <li>
                                    <a href="/store/{{ $producer->slug }}">
                                        <i class="fa fa-long-arrow-right"></i>{!! $producer->name !!}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </aside>

            <div id="primary" class="content-area col-md-9 col-sm-12 col-xs-12">
                <br>
                <h4>Similar products</h4>
                <br>
                <ul class="products service-dtail" id="slider">
                    @foreach($similars as $similar)
                        <li class="product" style="margin: 5px">
                            <div class="product-inner">

                                <a href="/store/{{$category}}/{{$similar->slug}}.html" class="woocommerce-loop-product__link">
                                    <img src="{{$similar->image}}" alt="{{$similar->image_alt}}" width="270" height="270">
                                    <span class="product-icon"><i class="fa fa-link"></i></span>
                                </a>

                                <div class="product-info">
                                    <h4>
                                        <a href="/store/{{$category}}/{{$similar->slug}}.html">{!! $similar->name !!}</a>
                                    </h4>
                                    <br>
                                    <p>{!! $similar->short_description !!}</p>
                                    <div class="product-footer">
                                        <a href="/store/{{$category}}/{{$similar->slug}}.html" class="btn btn-warning">More</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <br />
            </div>
        </div>
    </div>
</div>
