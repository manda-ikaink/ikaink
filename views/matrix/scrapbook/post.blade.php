@extends(layout())

{{-- Template Settings --}}
@section('page-id', 'scrapbook')
@section('main-class', 'd-flex align-items-stretch')


{{-- Template Content --}}
@section('content')
<div class="post-header">
    <div class="post-header__container container text-center">
        <h1 class="mb-3">{{ $entry->display_name ? $entry->display_name : $entry->name }}</h1>

        <p class="mb-0">
            Posted on {{ date_format($entry->publish_at, 'M d, Y') }} | 
            @if ($entry->categories->count())
            <span class="fas fa-tag fa-fw"></span>
            @foreach($entry->categories as $postcat)
                <a href="{{ url($postcat->path()) }}">{{ $postcat->name }}</a>@unless($loop->last), @endunless
            @endforeach
            @endif
        </p>
    </div>
    

    @include('partials.navigation.breadcrumbs', [
        'parent_category' => $entry->categories->where('parent_id',0)->first()
    ])
</div>

<div class="post-content">
    @if ($entry->headline)
    <div class="container mb-5">
        <p class="text-display--xs mb-0">{{ $entry->headline }}</p>
        <hr>
    </div>
    @endif

    @unless ($entry->content->isEmpty())
    @foreach ($entry->content as $section)
        @php $sectionSet = $section['set']; @endphp
        @includeIf('components.page.' . $sectionSet['handle'], ['component' => $section['data']])
    @endforeach
    @endunless
</div>
@endsection

@push('bottomScripts')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-512873b2612d88df"></script>
@endpush