<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    @foreach($locations as $location)
        <url>
            <loc>https://{{ $location->code }}.instrubiz.ae</loc>
            <priority>1.00</priority>
        </url>
    @endforeach
</urlset>
