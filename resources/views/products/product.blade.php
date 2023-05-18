<div id="content" class="site-content woocommerce sidebar-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-9 col-sm-12 col-xs-12">
                <div class="product">
                    <div class="mf-product-details clearfix">
                        <div class="product-image">
                            <img src="{{ $product->image }}" class="product-gallery__main-img"
                                 alt="{{ $product->image_alt }}" title="{{ $product->name }}">
                        </div>
                        <div class="product-summary entry-summary">
                            <h2 class="product_title entry-title">{{ "$product->name - $country->name" }} </h2>
                            <span><b>Category:</b>
                                <a style="color: #0a6aa1 !important;font-weight: 800"
                                   href="/store/{{$category}}">{{ $product->category->name}}</a>
                            </span>
                            <br>
                            <span><b>Manufacturer:</b>
                                <a style="color: #0a6aa1 !important;font-weight: 800"
                                   href="/store/brand/{{$product->producer->slug}}">{{$product->producer->name}}</a>
                            </span>

                            <div class="woocommerce-product-details__short-description">
                                {{$product->short_description}}
                                <br>
                                <h2 style="font-size: 18px;font-weight: 800">InstruBiz
                                    is a leading supplier and reseller of Rice Lake Weighing Systems in
                                    UAE, and we ship to all major cities such as Dubai &amp; Abu Dhabi
                                </h2>
                            </div>

                            <a href="mailto:{{ setting('site.request_quote') }}" class="button">
                                Request a Quote
                            </a>
                            <a href="{{ setting('site.whatsapp') }}" class="button">
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
                            {{ $product->description }}
                        </div>
                    </div>

                    <!--related product-->
                </div>
            </div>

            <aside id="primary-sidebar" class="widgets-area primary-sidebar shop-sidebar col-xs-12 col-sm-12 col-md-3">
                <div class="induscity-widget">
                    <div class="widget woocommerce widget_product_categories">
                        <h4 class="widget-title">Brands</h4>
                        <ul class="product-categories">
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-apparel">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Apparel </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-bottles-dispensers">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Bottles &amp;
                                    Dispensers </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-chemicals-cleaning-abrasives">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Chemicals,
                                    Cleaning &amp; Abrasives </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-cleanroom">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Cleanroom </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-electromechanical">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies,
                                    Electromechanical </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-hand-power-tools">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Hand &amp;
                                    Power Tools </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-labels-printers-paper-supplies">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Labels,
                                    Printers &amp; Paper Supplies </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-networking-telecom-fiber">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Networking,
                                    Telecom &amp; Fiber </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-power-management">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Power
                                    Management </a>
                            </li>
                            <li>
                                <a href="https://instrubiz.ae/store/electronic-production-supplies-safety-supplies">
                                    <i class="fa fa-long-arrow-right"></i>Electronic Production Supplies, Safety
                                    Supplies </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>