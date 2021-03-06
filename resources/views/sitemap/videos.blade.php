<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($videos as $video)
  <url>
    <loc>{{$siteURL}}{{ $video->lng }}/video/{{$video->id}}/{{$video->date}}/{{urlencode($video->title)}}</loc>
    <lastmod>{{ $video->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
@endforeach
</urlset>