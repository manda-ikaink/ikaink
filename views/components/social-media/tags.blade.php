{{-- Accepts $image, $title, $desc, $type--}}
@section('tags')
  @php
    $defaultTitle  = seo()->metadata()->getTitle();
    $defaultDesc   = seo()->metadata()->getDescription();
    $defaultImage  = ($globals ? (isset($globals->share_image->slug) ? $globals->share_image->path() : null) : null);
    $twitterHandle = ($globals ? ($globals->twitter_publisher ?? null) : null);
    $facebookAdmin = ($globals ? ($globals->facebook_admin_id ?? null) : null);
    $facebookApp   = ($globals ? ($globals->facebook_app_id ?? null) : null); 
  @endphp

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  @if ($twitterHandle)
  <meta name="twitter:site" content="{{ $twitterHandle }}">
  @endif
  <meta name="twitter:title" content="{{ $title ? str_limit($title, 70) : str_limit($defaultTitle, 70) }}">
  <meta name="twitter:description" content="{{ $desc ? strip_tags(str_limit($desc, 200)) : strip_tags(str_limit($defaultDesc, 200)) }}">
  @if ($image)
  <meta name="twitter:image:src" content="{{ $image }}">
  @elseif ($defaultImage)
  <meta name="twitter:image:src" content="{{ $defaultImage }}">
  @endif

  <!-- Open Graph data -->
  <meta property="og:title" content="{{ $title ? str_limit($title, 70) : str_limit($defaultTitle, 70) }}" />
  <meta property="og:type" content="{{ $type ? $type : 'website' }}" />{{-- https://ogp.me/#types --}}
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:description" content="{{ $desc ? strip_tags(str_limit($desc, 200)) : strip_tags(str_limit($defaultDesc, 200)) }}" />
  @if ($image)
  <meta property="og:image" content="{{ $image }}" />
  @elseif ($defaultImage)
  <meta property="og:image" content="{{ $defaultImage }}" />
  @endif
  <meta property="og:site_name" content="{{ setting('website_title') }}" />
  @if ($facebookApp)
  <meta property="fb:app_id" content="{{ $facebookApp }}" />
  @endif
  @if ($facebookAdmin)
  <meta property="fb:admins" content="{{ $facebookAdmin }}" />
  @endif
  {{ $slot }} {{-- Slot additional OG tags as needed --}}
@endsection