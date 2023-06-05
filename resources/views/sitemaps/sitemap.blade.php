<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($countries as $country)
        <sitemap>
            <loc>https://{{ $country->code==='ae'?'':$country->code.'.' }}instrubiz.ae/{{ $country->code==='ae'?'':$country->code.'-' }}sitemap-products.xml</loc>
        </sitemap>
    @endforeach
</sitemapindex>
