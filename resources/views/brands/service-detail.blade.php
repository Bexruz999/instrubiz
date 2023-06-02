<div class="service-dtail">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dtlbgimg">
                            <img style="height: 100px" src="{{ $brand->image }}" alt="{{"$brand->name in $country->name"}}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mf-section-title text-left dark medium-size bold margbtm20">
                            <h1> {{"$brand->name products in $country->shop_desc"}}</h1>
                            {{ $brand->description }}
                        </div>
                    </div>
                </div>
                <div class="mf-section-title text-left dark medium-size margbtm40">
                    <h2>Products</h2>
                </div>

                <div id="content" class="site-content woocommerce sidebar-content">
                    <div>
                        <div class="container">
                            <div class="row">
                                <div id="primary" class="content-area col-md-12 col-sm-12 col-xs-12">

                                    <ul class="products">
                                        <div class="catalog" id="yw0">

                                            <div class="catalog__items">
                                                @foreach($products as $product)
                                                    <li class="product col-sm-6 col-xs-12 col-md-3 col-4">
                                                        <div class="product-inner">
                                                            <a href="/store/{{ $product->category->slug }}/{{$product->slug}}.html"
                                                               class="woocommerce-loop-product__link">
                                                                <img src="{{$product->image}}"
                                                                     alt="{{$product->image_alt}}"
                                                                     title="{{$product->name}}" width="270"
                                                                     height="270">
                                                                <span class="product-icon"><i
                                                                        class="fa fa-link"></i></span>
                                                            </a>
                                                            <div class="product-info">
                                                                <h4>
                                                                    <a href="/store/{{ $product->category->slug }}/{{$product->slug}}.html">
                                                                        {!! $product->name !!}
                                                                    </a>
                                                                </h4>
                                                                <br>
                                                                <p> {!! str_replace('Learn more...', '', $product->short_description ) !!} </p>
                                                                <div class="product-footer">
                                                                    <a href="/store/{{ $product->category->slug }}/{{$product->slug}}.html"
                                                                       class="button product_type_simple add_to_cart_button">More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </ul>
                                    <div class="col-md-12">
                                        {{$products->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
