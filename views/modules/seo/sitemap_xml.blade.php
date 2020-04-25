@php
  $dt;
@endphp

<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{{ url('/') }}</loc>
    <changefreq>daily</changefreq>
    <priority>0.5</priority>
  </url>

  @foreach(matrix_collections()->findWhere(['status' => true]) as $collection)
    @if($collection->settings['seoable'])   
      @if($collection->route)
        @php
          $dt = \Carbon\Carbon::parse($collection->updated_at, setting('time_zone'))->toW3cString();
        @endphp
        <url>
          <loc>{{ url($collection->route) }}</loc>
          <lastmod>{{ $dt }}</lastmod>
          <changefreq>daily</changefreq>
          <priority>0.5</priority>
        </url>
      @endif

      @if($collection->groups->count())
      @foreach($collection->groups as $group)
      @if($group->route)
      @foreach($group->categories as $category)
        @php
          $dt = \Carbon\Carbon::parse($category->updated_at, setting('time_zone'))->toW3cString()
        @endphp
        <url>
          <loc>{{ url($category->uri) }}</loc>
          <lastmod>{{ $dt }}</lastmod>
          <changefreq>daily</changefreq>
          <priority>0.5</priority>
        </url>
      @endforeach
      @endif
      @endforeach
      @endif

      @foreach($collection->types as $type)
      @if($type->route)
      @foreach($type->entries->where('status', true) as $entry)
        @php
          $dt = \Carbon\Carbon::parse($entry->updated_at, setting('time_zone'))->toW3cString();
        @endphp
        <url>
          <loc>{{ url($entry->uri) }}</loc>
          <lastmod>{{ $dt }}</lastmod>
          <changefreq>daily</changefreq>
          <priority>0.5</priority>
        </url>
      @endforeach
      @endif
      @endforeach
    @endif
  @endforeach
</urlset>
