{{-- Breadcrumbs containing schema structural data markup --}}
{{-- Option to pass in parent collection, entry or category object for customization --}}
<nav class="breadcrumbs d-print-none" aria-label="breadcrumbs">
    <ol class="breadcrumb container mb-0" itemscope itemtype="http://schema.org/BreadcrumbList">
      @php($path = '')
      @php($item_position = 1)
  
      @include ('partials.navigation.breadcrumb-item', [
        'active'   => false,
        'home'     => true,
        'url'      => url('/'),
        'title'    => 'Home',
        'position' => $item_position
        ])
      @php( $item_position++ )
  
      @for($i = 1; $i <= count(Request::segments()); $i++)
        @if ($i < count(Request::segments()) & $i > 0)
          @php($path .= '/' . Request::segment($i))
  
          @if(Request::segment($i) === 'category')
            @include ('partials.navigation.breadcrumb-item', [
              'active'   => false,
              'url'      => url(Request::segment(1)),
              'title'    => title_case(str_replace('-', ' ', Request::segment($i))),
              'position' => $item_position
              ])
  
            @php( $item_position++ )
          @else
            @include ('partials.navigation.breadcrumb-item', [
              'active'   => false,
              'url'      => url($path),
              'title'    => title_case(str_replace('-', ' ', Request::segment($i))),
              'position' => $item_position
              ])
            @php( $item_position++ )
          @endif
        @else
          {{-- If passing through a parent collection --}}
          @if(isset($parent_collection))
            @include ('partials.navigation.breadcrumb-item', [
              'active'   => false,
              'url'      => url($parent_collection->route),
              'title'    => isset($parent_collection_name) ? $parent_collection_name : $parent_collection->name,
              'position' => $item_position
              ])
            @php( $item_position++ )
          @endif
  
          {{-- If passing through a parent entry --}}
          @if(isset($parent_entry))
            @include ('partials.navigation.breadcrumb-item', [
              'active'   => false,
              'url'      => url($parent_entry->first()->uri),
              'title'    => isset($parent_entry_name) ? $parent_entry_name : $parent_entry->first()->name,
              'position' => $item_position
              ])
            @php( $item_position++ )
          @endif
  
          {{-- If passing through a parent category --}}
          @if(isset($parent_category))
            @include ('partials.navigation.breadcrumb-item', [
              'active'   => false,
              'url'      => url($parent_category->path()),
              'title'    => isset($parent_category_name) ? $parent_category_name : $parent_category->name,
              'position' => $item_position
              ])
            @php( $item_position++ )
          @endif
  
          {{-- Current breadcrumb item --}}
          @include ('partials.navigation.breadcrumb-item', [
            'active'   => true,
            'url'      => url()->full(),
            'title'    => isset($current_title) ? $current_title : title_case(str_replace('-', ' ', Request::segment($i))),
            'position' => $item_position
            ])
          @php( $item_position++ )
        @endif
      @endfor
    </ol>
  </nav>