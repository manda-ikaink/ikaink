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
            {{-- <a href="{{ url($entry->uri) }}#disqus_thread">Post a Comment</a> --}}
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

    <section class="container mb-5">
        <hr>
        <h3 class="text-display--xxs"><a class="text-display--default" href="{{ url($entry->uri) }}#disqus_thread">Comment</a></h3>
        <div id="disqus_thread"></div>
    </section>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
@endsection

@push('bottomScripts')
<script id="dsq-count-scr" src="//ika-ink.disqus.com/count.js" async></script>
<script>
var disqus_config = function () {
    this.page.url = '{{ url($entry->uri) }}';
    this.page.identifier = 'scrapbook-post-{{ $entry->id }}';
    this.page.title = '{{ $entry->display_name ? $entry->display_name : $entry->name }}';
};
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://ika-ink.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
@endpush