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

		<div class="page-header__nav-toggle" id="nav-toggle">
			<a class="page-header__nav-btn" title="Menu"></a>
		</div>
	</div>
</header>