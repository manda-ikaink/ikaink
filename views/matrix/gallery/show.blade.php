@extends(layout())

{{-- Template Settings --}}
@section('page-id', 'gallery')
@section('main-class', 'd-flex align-items-stretch')

{{-- Set page scripts --}}
@include('partials.script-manager.script-sets', [
'head'   => $collection->head_scripts,
'top'    => $collection->top_scripts,
'bottom' => $collection->btm_scripts
])

{{-- Set Open Graph Data --}}
@component('components.social-media.tags', [
  'image' => isset($entry->image->slug) ? $entry->image->path() : null,
  'title' => 'Gallery - ' . $entry->name,
  'desc'  => null,
  'type'  => null
  ])
@endcomponent



{{-- Template Content --}}
@section('banner')
<div class="page-heading">
    <h1 class="text-center">{{ $entry->name }}</h1>
    @if ($entry->subtitle)
    <span class="text-hr">{{ $entry->subtitle }}</span>
    @endif
    <div class="d-flex align-items-center justify-content-center">
        @include('partials.navigation.breadcrumbs')
    </div>
</div>
@endsection

@section('content')
<div class="page-content pt-4">
    <div class="container">
        <div class="row">
            @foreach ($entry->items->sortByDesc('publish_at') as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="#{{ $item->slug }}" id="{{ $item->slug }}-link" class="gallery-card gallery-card--sm" data-toggle="modal" data-target="#{{ $item->slug }}" aria-label="{{ $item->display_name ? $item->display_name : $item->name }}">
                    <div class="gallery-card__container">
                        @if ($item->image)
                            <img class="lazy" src="{{ theme(theme_property('settings.images.1x1')) }}" data-src="{{ $item->image->path() }}?w=400&amp;h=400&amp;fit=crop" alt="{{ $item->image->description }}" title="{{ $item->image->name }}">
                        @endif
                    </div>
                    <div class="gallery-card__header d-flex align-items-center justify-content-center">
                        <span class="text-display--xxs mb-0">{{ $item->display_name ? $item->display_name : $item->name }}</span>
                    </div>
                </a>
                <div class="modal fade" id="{{ $item->slug }}" tabindex="-1" role="dialog" aria-labelledby="{{ $item->slug }}-link" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="credits-title">{{ $item->display_name ? $item->display_name : $item->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <dl>
                                    @if ($item->year)
                                    <dt>Year:</dt>
                                    <dd>{{ $item->year }}</dd>
                                    @endif
                                    @if ($item->size)
                                    <dt>Size:</dt>
                                    <dd>{{ $item->size }}</dd>
                                    @endif
                                    @if ($item->tools)
                                    <dt>Tools:</dt>
                                    <dd>{{ $item->tools }}</dd>
                                    @endif
                                </dl>
                                @if ($item->description)
                                    {!! $item->description !!}
                                @endif
                                @if ($item->link)
                                <a href="{{ $item->link }}">Read more about this piece</a>
                                @endif
                            </div>
                            <img class="lazy mx-auto" src="{{ theme(theme_property('settings.images.1x1')) }}" data-src="{{ $item->image->path() }}?w=800&amp;fit=max" alt="{{ $item->image->description }}" title="{{ $item->image->name }}">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        <div>
    </div>
</div>
@endsection
