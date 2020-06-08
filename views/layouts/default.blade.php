<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="efelle creative">
	<meta name="theme-color" content="{{ theme_property('settings.theme_color') }}">
	@yield('seo')
	{!! seo()->generate() !!}
	<link rel="canonical" href="{{ url()->current() }}">

	<script>
		// Change document class from no-js to js so we can detect this in css
		document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
	</script>


	{{-- Open Graph Tags --}}
	@hasSection('tags')
		@yield('tags')
	@else
		@component('components.social-media.tags', [
			'image' => null,
			'title' => null,
			'desc'  => null,
			'type'  => null
			])
		@endcomponent
	@endif

	{{-- Google Analytics --}}
	@include('analytics::partials.tracking_code')

	<link rel="apple-touch-icon" sizes="180x180" href="{{ theme('dist/favicons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ theme('dist/favicons/favicon-16x16.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ theme('dist/favicons/favicon-32x32.png') }}">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ theme('dist/'.theme_mix('/vendor.css', 'dist')) }}">
	<link rel="stylesheet" type="text/css" href="{{ theme('dist/'.theme_mix('/theme.css', 'dist')) }}">
	
	{{-- Head script stack --}}
	<script src="https://kit.fontawesome.com/c55718a3e4.js" crossorigin="anonymous"></script>
	@if ($globals)
	@include('partials.script-manager.scripts',['scripts' => $globals->head_scripts])
	@endif
	@stack('headScripts')
</head>
<body @hasSection('page-id') id="@yield('page-id')" @endif class="@yield('page-class')">
	{{-- Body-top script stack --}}
	@if ($globals)
	@include('partials.script-manager.scripts',['scripts' => $globals->top_scripts])
	@endif
	@stack('topScripts')
	<div class="preloader"></div>

	<div id="page">
		{{-- Conditional to detect homepage for header H1 --}}
		@hasSection('homepage')
			@include('partials.layout.header', ['isHome' => true])
		@else
			@include('partials.layout.header', ['isHome' => false])
		@endif

		{{-- Alert Banner --}}
		@if ($globals)
			@if ($globals->alert_banner_display)
			@include('partials.alerts.alert-banner', [
				'content' => $globals->alert_banner,
				'display' => $globals->alert_banner_display,
				'color'   => $globals->alert_banner_color
				])
			@endif
		@endif

		<main id="main-content"@hasSection('main-class') class="@yield('main-class')"@endif>
			{{-- Backwards compatibility with account & auth pages  --}}
			@hasSection('header')
				<div class="container pt-4 text-center">
					<h1>@yield('header')</h1>
					<hr>
				</div>
			@endif

		  @yield('banner')

		  @include('partials.alerts.alert-default')
		  
		  @stack('before')

		  @yield('content')

		  @stack('after')
		</main>

		@hasSection('homepage')
			@include('partials.layout.footer', ['isHome' => true])
		@else
			@include('partials.layout.footer', ['isHome' => false])
		@endif
	</div>
	<div class="body-bg"></div>

	{{-- Body-bottom script stack --}}
	<script src="{{ theme('dist/'.theme_mix('/manifest.js', 'dist')) }}"></script>
	<script src="{{ theme('dist/'.theme_mix('/vendor.js', 'dist')) }}"></script>
	<script src="{{ theme('dist/'.theme_mix('/theme.js', 'dist'))  }}"></script>
	@if ($globals)
	@include('partials.script-manager.scripts',['scripts' => $globals->btm_scripts])
	@endif
	@stack('bottomScripts')
</body>
</html>
