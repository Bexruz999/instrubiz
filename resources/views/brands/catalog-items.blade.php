<div class="catalog__items">
    @foreach($brands as $brand)
        <div class="col-xs-12 col-md-3 col-sm-3">
            <div class="mf-services-2 icon_type-fontawesome style-4 ">
                <div class="service-thumbnail text-center">
                    <a href="/store/brand/{{$brand->slug}}" class="">
                        <div class="brand-logo" style="background-image: url({{( strlen((string)$brand->image) > 5) ? $brand->image : null}});"></div>
                    </a>
                </div>
                <div class="service-summary">
                    <h4>
                        <a href="/store/brand/{{$brand->slug}}" title="{{$brand->name}}"
                           target=" _blank">{{$brand->name_short}}</a>
                    </h4>
                    <div class="service-desc">{{ $brand->short_description }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
