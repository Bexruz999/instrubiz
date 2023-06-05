<div class="contactpage pagepadd">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12 col-md-2">
                <ul>
                    <h4 style="margin-top: 30px">Navigation</h4>
                    <li style="margin-bottom: 5px">
                        <a class="listItemLink" style="color: #393939;font-weight: bolder;text-decoration: #f7c02d underline 2px;" href="/">Home</a>
                    </li>
                    <li style="margin-bottom: 5px">
                        <a class="listItemLink" style="color: #393939;font-weight: bolder;text-decoration: #f7c02d underline 2px;" href="/store/brands">Brands</a>
                    </li>
                    <li style="margin-bottom: 5px">
                        <a class="listItemLink" style="color: #393939;font-weight: bolder;text-decoration: #f7c02d underline 2px;" href="/store/categories">Categories</a>
                    </li>
                    <li style="margin-bottom: 5px">
                        <a class="listItemLink" style="color: #393939;font-weight: bolder;text-decoration: #f7c02d underline 2px;" href="/contacts">Contacts</a>
                    </li>
                    <li style="margin-bottom: 5px">
                        <a class="listItemLink" style="color: #393939;font-weight: bolder;text-decoration: #f7c02d underline 2px;" href="/sitemap">Sitemap</a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-xs-12 col-md-3">
                <ul>
                    <h4 style="margin-top: 30px">Other Countries</h4>
                    @foreach($countries as $country)
                        <li>
                            <a class="listItemLink" style="color: #393939;font-weight: bolder;text-decoration: #f7c02d underline 2px;"
                               href="https://{{$country->code==='ae'?'':$country->code.'.' }}instrubiz.ae" title="{{$country->name}}" target="_blank">
                                {!! $country->name !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-6 col-xs-12 col-md-3">
                <ul>
                    <h4 style="margin-top: 30px">Brands</h4>
                    @foreach($brands as $brand)
                        <li>
                            <a class="listItemLink" style="color: #393939;font-weight: bolder;text-decoration: #f7c02d underline 2px;"
                               href="/store/brand/{{$brand->slug}}" title="{{$brand->name}}" target=" _blank">
                                {!! $brand->name !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-6 col-xs-12 col-md-4">
                <ul>
                    <h4 style="margin-top: 30px">Categories</h4>
                    @foreach($categories as $category)
                        <li>
                            <a class="listItemLink" style="color: #393939;font-weight: bolder;text-decoration: #f7c02d underline 2px;"
                               href="/">
                                {!! strlen($category->name) < 30 ? $category->name : substr($category->name, 0, 27) . '..' !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
