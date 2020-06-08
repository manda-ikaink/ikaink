@extends(layout())

@section('banner')
<div class="page-heading">
    <h1 class="text-center">Sitemap</h1>
    <span class="text-hr">サイトマップ</span>
    <div class="d-flex align-items-center justify-content-center">
        @include('partials.navigation.breadcrumbs')
    </div>
</div>
@endsection

@section('content')
  <div class="page-content pt-4">
    <div class="container">
      {{-- Pages --}}
      <div class="sitemap__section pb-4">
        <h2>Pages</h2>

        <ul>
          <li>
            <a href="{{ url('/') }}">Home</a>
            @if ($pages)
            <ul>
              @foreach ($pages as $page)
              <li>
                <a href="{{ url($page->uri) }}">{{ $page->name }}</a>
              </li>
              @endforeach
            </ul>
            @endif
          </li>
        </ul>
        <br>
        <hr>
      </div>

      {{-- Scrapbook --}}
      @if ($scrapbook)
        <div class="sitemap__section pb-4">
          <h2>{{ $scrapbook->name }}</h2>

          @php 
            $postCategories = (category_group_exists($scrapbook->handle) ? categories($scrapbook->handle)->get() : null);
          @endphp

          <ul>
            <li>
              <a href="{{ url($scrapbook->route) }}">{{ $scrapbook->name }}</a>
            </li>
          </ul>

          @if ($posts)
            <h3 class="text-display--xs">Recent Posts</h3>

            <ul>
              @foreach ($posts as $post)
              <li>
                <a href="{{ url($post->uri) }}">{{ date_format($post->publish_at, 'M d, Y') }} - {{ $post->name }}</a>
              </li>
              @endforeach
            </ul>
          @endif

          @if ($postCategories)
            <h3 class="text-display--xs">{{ $scrapbook->name }} Categories</h3>

            <ul>
              @foreach ($postCategories as $postCategory)
              <li>
                <a href="{{ url($postCategory->path()) }}">{{ $postCategory->name }}</a>
              </li>
              @endforeach
            </ul>
          @endif
        </div>
        <br>
        <hr>
        <br>
      @endif

      {{-- Gallery --}}
      @if ($gallery)
        <div class="sitemap__section pb-4">
          <h2>{{ $gallery->name }}</h2>

          <ul>
            <li>
              <a href="{{ url($gallery->route) }}">{{ $gallery->name }}</a>
            </li>
          </ul>

          @if ($posts)
            <h3 class="text-display--xs">Gallery Pages</h3>

            <ul>
              @foreach ($galleryPages as $galleryPage)
              <li>
                <a href="{{ url($galleryPage->uri) }}">{{ $galleryPage->name }}</a>
              </li>
              @endforeach
            </ul>
          @endif
        </div>
        <br>
        <hr>
        <br>
      @endif


      {{-- Projects --}}
      @if ($gallery)
        <div class="sitemap__section pb-4">
          <h2>{{ $projects->name }}</h2>

          <ul>
            <li>
              <a href="{{ url($projects->route) }}">{{ $projects->name }}</a>
            </li>
          </ul>

          @if ($posts)
            <h3 class="text-display--xs">Project Pages</h3>

            <ul>
              @foreach ($projectPages as $projectPage)
              <li>
                <a href="{{ url($projectPage->uri) }}">{{ $projectPage->name }}</a>
              </li>
              @endforeach
            </ul>
          @endif
        </div>
        <br>
        <hr>
        <br>
      @endif
    </div>
  </div>
@endsection
