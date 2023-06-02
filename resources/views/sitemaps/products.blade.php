<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($links as $link)
        <url>
            <loc>https://instrubiz.ae/sitemap-product{{$link}}.xml</loc>
        </url>
    @endforeach
</urlset>
