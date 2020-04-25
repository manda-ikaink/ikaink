@extends(layout())

{{-- Template Settings --}}
@section('page-id', 'subpage')

{{-- Set Open Graph data --}}
@component('components.social-media.tags', [
  'image' => isset($entry->share_image->slug) ? $entry->share_image->path() : null,
  'title' => $entry->share_title ?? null,
  'desc'  => $entry->share_description ?? null,
  'type'  => null
  ])
@endcomponent



{{-- Template Content --}}
@section('banner')
  @include('partials.banners.page-banner-default', [
      'heading'    => $entry->name,
      'subtitle'   => null,
      'background' => null
    ])
@endsection

@section('content')
  {!! $entry->content !!}
@endsection