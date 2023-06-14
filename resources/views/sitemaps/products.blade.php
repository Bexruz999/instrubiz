<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($links as $link)
        <url>
            <loc>https://{{ $country->code==='ae'?'':$country->code.'.' }}instrubiz.ae/{{ $country->code }}-sitemap-product{{ $link }}.xml</loc>
        </url>
    @endforeach
</urlset>
