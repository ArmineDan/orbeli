<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($opinions as $opinion)<url>
    <loc>{{$siteURL}}{{ $opinion->lng }}/opinion/{{$opinion->id}}/{{$opinion->date}}/{{urlencode($opinion->title)}}</loc>
    <lastmod>{{ $opinion->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>@endforeach 
</urlset>