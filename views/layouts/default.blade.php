<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="efelle creative">
	<meta name="theme-color" content="{{ theme_property('settings.theme_color') }}">
	@yield('seo')
	{!! seo()->generate() !!}

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

	{{-- Add wrapper #page around main content required if Vue enabled, cannot utilize body element --}}
	<div id="page">
		{{-- Conditional to detect homepage for header H1 --}}
		@hasSection('homepage')
			@include('partials.layout.header', ['isHome' => true])
		@else
			@include('partials.layout.header', ['isHome' => false])
		@endif

		{{-- Alert Banner Top --}}
		@if ($globals)
			@include('partials.alerts.alert-banner', [
				'content' => $globals->alert_banner,
				'display' => $globals->alert_banner_display === 'top'
				])
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

		{{-- Alert Banner Bottom --}}
		@if ($globals)
			@include('partials.alerts.alert-banner', [
				'content' => $globals->alert_banner,
				'display' => $globals->alert_banner_display === 'bottom'
				])
		@endif

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
