@extends(layout())

@section('header', 'Sitemap')

@section('content')
  <div class="sitemap">
    <div class="container pt-5">

      @if (theme_property('settings.custom_sitemap'))
        {{-- Customized Sitemap --}}

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

        {{-- Blog Example --}}
        {{-- @if ($blog)
          <h2>{{ $blog->name }}</h2>

          @php 
            $blogCategories = (category_group_exists($blog->handle) ? categories($blog->handle)->get() : null);
          @endphp

          <ul>
            <li>
              <a href="{{ url($blog->route) }}">{{ $blog->name }}</a>
            </li>
          </ul>

          @if ($blogPosts)
            <h3>Recent Posts</h3>

            <ul>
              @foreach ($blogPosts as $post)
              <li>
                <a href="{{ url($post->uri) }}">{{ date_format($post->publish_at, 'M d, Y') }} - {{ $post->name }}</a>
              </li>
              @endforeach
            </ul>
          @endif

          @if ($blogCategories)
            <h3>{{ $blog->name }} Categories</h3>

            <ul>
              @foreach ($blogCategories as $blogCategory)
              <li>
                <a href="{{ url($blogCategory->path()) }}">{{ $blogCategory->name }}</a>
              </li>
              @endforeach
            </ul>
          @endif

          <br>
          <hr>
          <br>
        @endif --}}
      @else
        {{-- Auto-generated Sitemap config below... --}}

        {{-- List Matrix Collections --}}
        @foreach(matrix_collections()->findWhere(['status' => true]) as $collection)
          @if($collection->settings['seoable'] and $collection->handle != 'homepage')
          <div class="sitemap__section pb-4">
            @if($collection->route)
              <h2><a href="{{ $collection->route }}">{{ $collection->name }}</a></h2>
            @else
              <h2>{{ $collection->name }}</h2>
            @endif

            {{-- List Categories by Group --}}
            @if($collection->groups->count())
              @foreach($collection->groups as $group)
                @if($group->route)
                <strong>{{ $group->name }} Categories</strong>

                <ul>
                  @foreach($group->categories as $category)
                  <li><a href="{{ url($category->path()) }}">{{ $category->name }}</a></li>
                  @endforeach
                </ul>
                @endif
              @endforeach
            @endif

            {{-- List Entries --}}
            @if($collection->types->count())
              @foreach($collection->types as $type)
                @if($type->route)
                <strong>All {{ $type->name }}</strong>
                <ul>
                  @if ($type->handle === 'pages')
                    <li><a href="/">Home</a></li>
                  @endif
                  @foreach($type->entries->where('status', true) as $entry)
                  <li><a href="{{ url($entry->uri) }}">{{ $entry->name }}</a></li>
                  @endforeach
                </ul>
                @endif
              @endforeach
            @endif

            <br>
            <hr>
          </div>
          @endif
        @endforeach
      @endif
    </div>
  </div>
@endsection
