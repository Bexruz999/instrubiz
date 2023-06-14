<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($brands as $brand)
        <url>
            <loc>https://{{ $country->code==='ae'?'':$country->code.'.' }}instrubiz.ae/store/brand/{{ $brand->slug }}</loc>
        </url>
    @endforeach
</urlset>
