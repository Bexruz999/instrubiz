<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>https://{{ $country->code==='ae'?'':$country->code.'.' }}instrubiz.ae/{{ $country->code }}-sitemap-products.xml</loc>
    </sitemap>
    <sitemap>
        <loc>https://{{ $country->code==='ae'?'':$country->code.'.' }}instrubiz.ae/{{ $country->code }}-sitemap-categories.xml</loc>
    </sitemap>
    <sitemap>
        <loc>https://{{ $country->code==='ae'?'':$country->code.'.' }}instrubiz.ae/{{ $country->code }}-sitemap-brands.xml</loc>
    </sitemap>
</sitemapindex>
