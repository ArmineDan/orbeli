<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
  @if ($post)<sitemap>
    <loc>{{request()->getHost()}}/sitemap/posts</loc>
    <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
  </sitemap>
  @endif
@if ($news)<sitemap>
    <loc>{{request()->getHost()}}/sitemap/news</loc>
    <lastmod>{{ $news->updated_at->tz('UTC')->toAtomString() }}</lastmod>
  </sitemap>
  @endif
@if ($opinion)<sitemap>
    <loc>{{request()->getHost()}}/sitemap/opinions</loc>
    <lastmod>{{ $opinion->updated_at->tz('UTC')->toAtomString() }}</lastmod>
  </sitemap>
  @endif
  @if ($announcement)<sitemap>
    <loc>{{request()->getHost()}}/sitemap/announcements</loc>
    <lastmod>{{ $announcement->updated_at->tz('UTC')->toAtomString() }}</lastmod>
  </sitemap>
  @endif
  @if ($video)<sitemap>
    <loc>{{request()->getHost()}}/sitemap/videos</loc>
    <lastmod>{{ $video->updated_at->tz('UTC')->toAtomString() }}</lastmod>
  </sitemap>@endif
  
</sitemapindex>