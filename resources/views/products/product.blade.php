<div id="content" class="site-content woocommerce sidebar-content">
    <div class="container">
        <div class="row">

            <aside id="primary-sidebar" class="widgets-area primary-sidebar shop-sidebar col-xs-12 col-sm-12 col-md-3">
                <div class="induscity-widget">
                    <div class="widget woocommerce widget_product_categories">
                        <p class="widget-title">Categories</p>
                        <ul class="product-categories">
                            @foreach ($categories as $producer)
                                <li>
                                    <a href="/store/{{ $producer->slug }}">
                                        <i class="fa fa-long-arrow-right"></i>{!! Arr::get($producer, 'name', 'undefined') !!}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </aside>

            <div id="primary" class="content-area col-md-9 col-sm-12 col-xs-12">
                <div class="product" itemscope itemtype="http://schema.org/Product">

                    <div class="mf-product-details clearfix">
                        <div class="product-image" style="position: relative">
                            <img src="{{ $product->image }}" class="product-gallery__main-img" itemprop="image" alt="{{ $product->image_alt }}" title="{{ $product->name }}">
                            <div style="width: calc(100% - 15px); height: 50px; background-color: #fff; position: absolute; bottom: 21px; border-radius: 0 0 3px 3px;"></div>
                        </div>
                        <div class="product-summary entry-summary">
                            <h2 itemprop="name" class="product_title entry-title">{{ "$product->name - $country->name" }} </h2>
                            <span><b>Category:</b>
                                <a style="color: #0a6aa1 !important;font-weight: 800"
                                   href="/store/{!! $product->category->slug !!}">{!! $product->category->name !!}</a>
                            </span>
                            <br>
                            <span><b>Manufacturer:</b>
                            @if(Arr::get($product->producer, 'slug', null))
                                    <a itemprop="brand" style="color: #0a6aa1 !important;font-weight: 800"
                                       href="/store/brand/{{ Arr::get($product->producer, 'slug', null) }}">{{$product->producer->name}}</a>
                                @endif
                            </span>

                            <div itemprop="description" class="woocommerce-product-details__short-description">
                                <h2 style="font-size: 18px;font-weight: 800">
                                    InstruBiz is a leading supplier and reseller of {{$producer->name}} in {{ $country->name }}, and we ship to all major cities such as {{ $country->shop_desc }}
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
                    <div itemprop="review" style="display: none" >
                    </div>
                    <div itemprop="offers" itemtype="https://schema.org/Offer" itemscope>
                        <link itemprop="url" href="https://example.com/anvil" />
                        <meta itemprop="availability" content="https://schema.org/InStock" />
                        <meta itemprop="priceCurrency" content="USD" />
                        <meta itemprop="itemCondition" content="https://schema.org/UsedCondition" />
                        <meta itemprop="price" content="119.99" />
                        <meta itemprop="priceValidUntil" content="2020-11-20" />
                    </div>

                    <div itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope>
                        <meta itemprop="reviewCount" content="89" />
                        <meta itemprop="ratingValue" content="4.4" />
                    </div>

                    <div itemprop="review" itemtype="https://schema.org/Review" itemscope>

                        <div itemprop="author" itemtype="https://schema.org/Person" itemscope>
                            <meta itemprop="name" content="{{ $product->name }}" />
                        </div>
                        <div itemprop="reviewRating" itemtype="https://schema.org/Rating" itemscope>
                            <meta itemprop="ratingValue" content="4" />
                            <meta itemprop="bestRating" content="5" />
                        </div>

                    </div>
                </div>
            </div>


            <div id="primary" class="content-area col-md-9 col-sm-12 col-xs-12">
                <br>
                <p>Similar products</p>
                <br>
                <ul class="products service-dtail" id="slider">
                    @foreach($similars as $similar)
                        <li class="product" style="margin: 5px">
                            <div class="product-inner">
                                <a href="/store/{{$product->category->slug}}/{{$similar->slug}}.html" class="woocommerce-loop-product__link">
                                    <img src="{{$similar->image}}" alt="{{$similar->image_alt}}" width="270" height="270">
                                    <span class="product-icon"><i class="fa fa-link"></i></span>
                                </a>

                                <div class="product-info">
                                    <h3>
                                        <a href="/store/{{$product->category->slug}}/{{$similar->slug}}.html">{!! $similar->name !!}</a>
                                    </h3>
                                    <br>
                                    <p>{!! $similar->short_description !!}</p>
                                    <div class="product-footer">
                                        <a href="/store/{{$product->category->slug}}/{{$similar->slug}}.html" class="btn btn-warning">More</a>
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
