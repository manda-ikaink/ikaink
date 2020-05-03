@extends(layout())

{{-- Template Settings --}}
@section('page-id', 'subpage')
@section('main-class', 'd-flex align-items-stretch')

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
  @component('components.page.header', [
      'heading'    => $entry->display_name ? $entry->display_name : $entry->name,
      'subtitle'   => $entry->subtitle,
      'align'      => 'left',
      'breadcrumb' => false
    ])
  @endcomponent
@endsection

@section('content')
<div class="page-content">
  @unless ($entry->content->isEmpty())
  @foreach ($entry->content as $section)
      @php $sectionSet = $section['set']; @endphp
      @includeIf('components.page.' . $sectionSet['handle'], ['component' => $section['data']])
  @endforeach
  @endunless
</div>
@endsection