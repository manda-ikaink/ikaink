@extends(layout())

@section('content')
  <div class="page-content">
    {!! Form::open(['route' => 'search.query']) !!}
    {{-- Fusion CMS Search -  Uses TNTSearch or Algolia --}}
    <section class="fusion-search">
      <div class="container">
        <div class="fusion-search__title">
          <h1>Site Search</h1>
          <hr>
        </div>
        <div class="row pt-4">
          <div class="col-md-4">
            {{-- Search Sidebar --}}
            <aside class="fusion-search__sidebar">
              @include('search::partials.within')
              @include('search::partials.share')
            </aside>
          </div>

          {{-- Search Form --}}
          <div class="col-md-8">
            <div class="fusion-search__form">
              @include('search::partials.form')
              {{-- Note: 'Algolia Powered' Image needs to be present unless client is choosing --}}
              {{-- premium Algolia membership --}}
              @if(setting('search_driver') == 'algolia')
                <img src="/themes/modern/assets/img/algolia-powered.svg" alt="Search Powered by Algolia">
              @endif
            </div>
            
            {{-- Search Results --}}
            <div class="fusion-search__results py-4">
              {{-- If user provides both a search term and results are found --}}
              @if (!$results->isEmpty() and ! empty($query))
                <p class="fusion-search__results-title">Search Results for "{{ Request::input('q') }}"</p>
                
                {{-- Group results by type (ie Blog, Pages, etc) --}}
                {{-- TODO - Add conditional check in the settings for --}}
                {{-- displaying options in bulk rather than grouped --}}
                @foreach ($results->groupBy(function($result) {
                  return $result->type->collection->handle;
                }) as $groups)
                  <h2>{{ $groups->first()->type->collection->name }}</h2>
                  <hr>
                  <div class="fusion-search__results-inner"> 
                    @foreach ($groups as $result)
                      {{-- Check for a custom search result template --}}
                      @php 
                        $custom_template_path = 'modules.search.results.'.$result->type->collection->handle.'.'.$result->type->handle
                      @endphp
                      
                      @if(View::exists($custom_template_path))
                        @include($custom_template_path, [ 'result' => $result ])
                      {{-- Default search result / Title and Link Only --}}
                      @else
                        @include('modules.search.results.result.result', [ 'result' => $result ])
                      @endif
                    @endforeach
                  </div>
                @endforeach
              {{-- If user provides a search term but no results are found --}}
              @elseif($results->isEmpty() and ! empty($query))
                <h4>No Search results for "{{ Request::input('q') }}"</h4>
              {{-- If no search terms have been input --}}
              @else
                <h4>No Search keywords provided, please use the inbox box above to search.</h4>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
    {!! Form::close() !!}
  </div>
@endsection
