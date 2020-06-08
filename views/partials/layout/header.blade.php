{{-- $globals variable inherited from layouts/default.blade.php --}}
<header id="page-header" class="page-header">
	<div class="container-fluid">
		@if ($isHome)
		<h1 class="page-header__logo">
			<a class="d-flex align-items-center justify-content-center" href="/">
				<img class="page-header__logo--center svg drop-shadow" src="{{ theme('assets/images/ika-ink-large-white.svg') }}" alt="ika INK Logo" title="{{ setting('website_title') }}">
				<span class="page-header__logo--left drop-shadow">ika</span>
				<span class="page-header__logo--right drop-shadow">INK</span>
			</a>
		</h1>
		@else
		<div class="page-header__logo">
			<a class="d-flex align-items-center justify-content-center" href="/">
				<img class="page-header__logo--center svg drop-shadow" src="{{ theme('assets/images/ika-ink-large-white.svg') }}" alt="ika INK Logo" title="{{ setting('website_title') }} - {{ setting('website_slogan') }}">
				<span class="page-header__logo--left drop-shadow">ika</span>
				<span class="page-header__logo--right drop-shadow">INK</span>
			</a>
		</div>
		@endif

		@if (menu_exists('main_menu'))
		<div class="page-header__nav-toggle" id="nav-toggle">
			<div class="position-relative">
				<button class="page-header__nav-btn" data-ol-toggle="#nav-panel" aria-controls="nav-panel" aria-label="Menu">
					<span></span>
				</button>
			</div>
		</div>
		@endif
	</div>
</header>
@if (menu_exists('main_menu'))
<div id="nav-panel" class="nav-panel ol-panel ol-panel--right d-flex flex-column align-items-center justify-content-center">
	@include('partials.navigation.navigation', [
	'items' => menu('main_menu')->roots(), 
	'id'    => 'main'
	])
	<div class="nav-panel__links mt-auto">
		<div class="mb-3">
		@include('partials.social-media.links', [
          'class'     => 'justify-content-center mb-0',
          'github'    => $globals->github,
          'instagram' => $globals->instagram,
          'twitter'   => $globals->twitter,
          'youtube'   => $globals->youtube,
          'linkedin'  => $globals->linkedin,
          'pinterest' => $globals->pinterest
		  ])
		</div>
		
		<div class="text-center text-md-left">
			<a href="/privacy-policy">Privacy Policy</a>&nbsp;|&nbsp;
			<a href="/terms-of-service">Terms of Service</a>&nbsp;|&nbsp;
			<a href="/sitemap">Sitemap</a>&nbsp;|&nbsp;
			<a href="/credits">Credits</a>
		</div>
	</div>
</div>
@endif