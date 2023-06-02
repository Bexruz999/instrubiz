<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($products as $product)
        <url>
            <loc>https://instrubiz.ae/store/{{ $product->category->slug }}/{{ $product->slug }}.html</loc>
        </url>
    @endforeach
</urlset>
