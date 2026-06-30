<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($series as $item)
        <url>
            <loc>{{ route('series.view', $item) }}</loc>
            <lastmod>{{ $item->updated_at ? \Carbon\Carbon::parse($item->updated_at)->toAtomString() : now()->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>