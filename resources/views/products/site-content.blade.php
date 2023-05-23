<div id="content" class="site-content woocommerce sidebar-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-9 col-sm-12 col-xs-12">
                <ul class="products">
                    <div class="catalog" id="yw0">
                        <div class="catalog__items">
                            @foreach($products as $product)
                                <li class="product col-sm-6 col-xs-12 col-md-3 col-4">
                                    <div class="product-inner">

                                        <a href="/store/{{ $product->category->slug }}/{{ $product->slug }}.html" class="woocommerce-loop-product__link">
                                            <img src="{{ $product->image }}" alt="" width="270" height="270">
                                            <span class="product-icon"><i class="fa fa-link"></i></span>
                                        </a>

                                        <div class="product-info">
                                            <h4>
                                                <a href="/store/{{ $product->category->slug }}/{{ $product->slug }}.html">{{ $product->name }}</a>
                                            </h4>
                                            <br>
                                            <p>{{ substr($product->short_description, 0, 50)  }}</p>
                                            <div class="product-footer">
                                                <a href="/store/{{ $product->category->slug }}/{{ $product->slug }}.html" class="button product_type_simple add_to_cart_button ">More</a>
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
            <x-aside></x-aside>
        </div>
    </div>
</div>
