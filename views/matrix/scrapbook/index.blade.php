@extends(layout())

{{-- Template Settings --}}
@section('page-id', 'scrapbook')
@section('main-class', 'd-flex align-items-stretch')

{{-- Image Ratio Options --}}
@php
    $ratios = [
        '1-1'    => '?w=368&&h=368&fit=crop',
        '16-9'   => '?w=368&h=207&fit=crop',
        '4-3'    => '?w=368&h=276&fit=crop',
        'v-4-3'  => '?w=369&h=492&fit=crop'
    ];
@endphp

{{-- Template Content --}}
@section('content')
    {{-- Header --}}
    <div class="page-heading">
        <h1 class="text-center">Scrapbook</h1>
        <span class="text-hr">スクラップブック</span>

        @if ($categories)
        <div class="container d-flex align-items-center justify-content-between">
            <a href="#scrapbook-filters" id="scrapbook-filters-toggle" class="text-display--xxs d-inline-block mb-3 collapsed" data-toggle="collapse" href="#scrapbook-filters" role="button" aria-expanded="false" aria-controls="scrapbook-filters">
                Filter <span class="fas fa-plus fa-fw" aria-hidden="true"></span>
            </a>

            @if ($category)
                <a href="{{ url($collection->slug) }}" class="scrapbook-active-filter d-inline-block mb-3" title="Remove category filter: {{ $category->name }}">{{ $category->name }} &times;</a>
            @endif
        </div>

        {{-- Filters --}}
        <div id="scrapbook-filters" class="scrapbook-filters bg--green-teal collapse" aria-labelledby="scrapbook-filters-toggle">
            <div class="container pt-4 pb-4">
                <ul class="row list-unstyled mb-0 pb-4">
                    @foreach($categories->where('parent_id', 0) as $cat)
                    <li class="col-6 col-md-4">
                        <a href="{{ url($cat->path()) }}" @if ($category)@if ($category->id === $cat->id)class="active"@endif @endif>{{ $cat->name }}</a>

                        @if ($cat->children)
                        <ul class="mb-0">
                            @foreach ($cat->children as $subcat)
                            <li><a href="{{ url($subcat->path()) }}">{{ $subcat->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>

    <div class="scrapbook-listing">
        {{-- Pagination Status --}}
        @if ($posts->count())
        {{ $posts->links('partials.navigation.pagination-status') }}
        @endif

        {{-- Post Listings --}}
        @if ($posts->count())
        <div class="masonry-grid d-flex flex-wrap mb-4">
            @foreach ($posts as $post)
            <div class="masonry-grid__item">
                <article class="scrapbook-card">
                    @if ($post->image)
                    <a href="{{ url($post->uri) }}" class="scrapbook-card__image scrapbook-card__image--{{ $post->aspect_ratio }} d-block" aria-lable="Read Post: {{ $post->display_name ? $post->display_name : $post->name }}">
                        <img class="lazy" src="{{ theme(theme_property('settings.images.loading')) }}" data-src="{{ $post->image->path() }}{{ $ratios[$post->aspect_ratio] }}" alt="{{ $post->image->description }}">
                    </a>
                    @endif
                    <div class="scrapbook-card__content">
                        <h3 class="scrapbook-card__title mb-2">
                            <a class="d-block" href="{{ url($post->uri) }}">{{ $post->display_name ? $post->display_name : $post->name }}</a>
                        </h3>

                        @if ($post->headline)
                        <p class="mb-3">{{ $post->headline }}</p>
                        @endif

                        @if ($post->categories->count())
                        <div class="scrapbook-card__categories pt-3">
                            <span class="fas fa-tag fa-fw"></span>
                            @foreach($post->categories as $postcat)
                                <a href="{{ url($postcat->path()) }}">{{ $postcat->name }}</a>@unless($loop->last), @endunless
                            @endforeach
                        </div>
                        @endif
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        @else
        <div class="container">
            <p class="text-display--xxs text-center mb-0"><strong>No posts {{ $category ? 'under category "' . $category->name . '" ' : null }}to show. Please check back later!</p>
        </div>
        @endif

        {{-- Pagination --}}
        @if ($posts->count())
        {{ $posts->links('partials.navigation.pagination') }}
        @endif
    </div>
@endsection

@push('bottomScripts')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    window.addEventListener('load', (event) => {
        var grid = document.querySelector('.masonry-grid');
        var msnry = new Masonry( grid, {
            itemSelector: '.masonry-grid__item',
            columnWidth: 350
        });
        var msnry = new Masonry('.masonry-grid');
    });
</script>
@endpush