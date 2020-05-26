@extends(layout())

{{-- Template Settings --}}
@section('page-id', 'gallery')
@section('main-class', 'd-flex align-items-stretch')


{{-- Template Content --}}
@section('banner')
<div class="page-heading">
    <h1 class="text-center">Gallery</h1>
    <span class="text-hr">アートギャラリー</span>
</div>
@endsection

@section('content')
<div class="gallery-listing page-content pt-5">
    <div class="container">
        <div class="row">
            @foreach ($pages->sortBy('publish_at') as $page)
                <div class="gallery-listing__column col-md-6">
                    <a href="{{ url($page->uri) }}" class="gallery-card gallery-card--lg" aria-label="{{ $page->name }}">
                        <div class="gallery-card__container">
                            @if ($page->image)
                                <img class="lazy" src="{{ theme(theme_property('settings.images.1x1')) }}" data-src="{{ $page->image->path() }}?w=470&amp;h=470&amp;fit=crop" alt="{{ $page->image->description }}" title="{{ $page->image->name }}">
                            @endif
                            <div class="gallery-card__header d-flex align-items-center justify-content-center">
                                <span class="text-display--md">{{ $page->name }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
