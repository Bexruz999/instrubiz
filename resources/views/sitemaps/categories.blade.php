<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($categories as $category)
        <url>
            <loc>https://instrubiz.ae/store/{{ $category->slug }}</loc>
        </url>
    @endforeach
</urlset>
