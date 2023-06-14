<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($countries as $country)
        <sitemap>
            <loc>https://instrubiz.ae/{{ $country->code }}-sitemap.xml</loc>
        </sitemap>
    @endforeach
</sitemapindex>
