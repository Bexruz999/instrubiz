<div class="service-2">
    <div class="container">
        <div class="mf-section-title text-center dark large-size margbtm40">
            <h2>Shop for all major Test and Measurement Instrument Brands at Best Prices in UAE</h2>
        </div>
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <div class="row">
                    @foreach($brands as $brand)
                        <div class="col-xs-12 col-md-6 col-sm-6">
                            <div class="mf-services-2 icon_type-fontawesome style-4 ">
                                <div class="service-thumbnail text-center">
                                    <a href="https://instrubiz.ae/store/brand/3m" class="">
                                        <div class="brand-logo" style="background-image: url('{{ $brand->image }}');"></div>
                                    </a>
                                </div>
                                <div class="service-summary">
                                    <h4><a href="" title="" target=" _blank">{{ $brand->name }}</a></h4>
                                    <div class="service-desc"> in {{ $country->name }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @include('forms.home-first')
        </div>
    </div>
</div>
