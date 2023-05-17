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

                                        <a href="/store/{{ $product->category->slug }}/{{ $product->slug }}" class="woocommerce-loop-product__link">
                                            <img src="{{ $product->image }}" alt="" width="270" height="270">
                                            <span class="product-icon"><i class="fa fa-link"></i></span>
                                        </a>

                                        <div class="product-info">
                                            <h4>
                                                <a href="/store/{{ $product->category->slug }}/{{ $product->slug }}">{{ $product->name }}</a>
                                            </h4>
                                            <br>
                                            <p>{{ $product->short_description }}</p>
                                            <div class="product-footer">
                                                <a href="/store/{{ $product->category->slug }}/{{ $product->slug }}" class="button product_type_simple add_to_cart_button ">More</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </ul>
                {{ $products->links() }}
            </div>
            <x-aside></x-aside>
        </div>
    </div>
</div>
