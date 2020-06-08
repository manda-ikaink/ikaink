@extends(layout())

{{-- Template Settings --}}
@section('page-id', 'projects')
@section('main-class', 'd-flex align-items-stretch')

{{-- Status Options --}}
@php
    $status = [
        'pending'     => 'Pending',
        'planning'    => 'Planning',
        'canceled'    => 'Canceled',
        'complete'    => 'Complete',
        'ongoing'     => 'Ongoing',
        'on-hold'     => 'On Hold',
        'blocked'     => 'Blocked'
    ];
@endphp

{{-- Set Open Graph Data --}}
@component('components.social-media.tags', [
  'image' => isset($entry->share_image->slug) ? $entry->share_image->path() : null,
  'title' => $entry->share_title ?? null,
  'desc'  => $entry->share_description ?? null,
  'type'  => 'article'
  ])
  <meta property="article:published_time" content="{{ $entry->publish_at }}" />
  <meta property="article:modified_time" content="{{ $entry->updated_at }}" />
  @if ($entry->expire_at)
  <meta property="article:expiration_time" content="{{ $entry->expire_at }}" />
  @endif
@endcomponent

@section('banner')
    @component('components.page.header', [
      'heading'    => $entry->display_name ? $entry->display_name : $entry->name,
      'subtitle'   => null,
      'video'      => $entry->video,
      'breadcrumb' => true
    ])
    @endcomponent
@endsection



{{-- Template Content --}}
@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
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

            <div class="col-lg-4 col-xl-3">
                <ul class="list-unstyled">
                    <li>
                        <span class="font-weight-bold">Status:</span> <span class="status-badge status-badge--{{ $entry->project_status }}">{{ $status[$entry->project_status] }}</span>
                    </li>
                    <li>
                        <span class="font-weight-bold">Type:</span> 
                        @foreach($entry->project_type as $type)
                            {{ $type }}{{ $loop->last ? '' : ', ' }}
                        @endforeach
                    </li>
                    @if ($entry->status_message)<li><p class="mb-0"><small>{{ $entry->status_message }}</small></p></li>@endif
                </ul>

                <hr>
                <h3 class="text-display--xs mb-3">Get updates</h3>
                <p>Would you like to be notified when I update my projects? Sign up for the ika.INK project mail list.</p>
                <div id="mc_embed_signup">
                    <form action="https://ink.us10.list-manage.com/subscribe/post?u=4aa2a37e2b1db436eaa812efa&amp;id=74dc5e63a4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                <div class="mc-field-group">
                                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            </div>
                        <div class="mc-field-group">
                            <label for="mce-FNAME">First Name </label>
                            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                        </div>
                        <div class="mc-field-group">
                            <label for="mce-LNAME">Last Name </label>
                            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_4aa2a37e2b1db436eaa812efa_74dc5e63a4" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('headScripts')
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif; }
</style>
@endpush

@push('bottomScripts')
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <script id="dsq-count-scr" src="//ika-ink.disqus.com/count.js" async></script>
<script>
var disqus_config = function () {
    this.page.url = '{{ url($entry->uri) }}';
    this.page.identifier = 'project-post-{{ $entry->id }}';
    this.page.title = '{{ $entry->display_name ? $entry->display_name : $entry->name }}';
};
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://ika-ink.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>

@if ($entry->video)
<!-- Jarallax -->
<script src="https://unpkg.com/jarallax@1/dist/jarallax.min.js"></script>
<script src="https://unpkg.com/jarallax@1/dist/jarallax-video.min.js"></script>
<script>
    jarallax(document.querySelectorAll('.jarallax'), {
        videoStartTime: {{ $entry->video_start }},
        videoEndTime: {{ $entry->video_end }}
    });

    $('.jarallax video').on('play', (event) => {
        console.log('video ready', event);
    });
</script>
@endif
@endpush