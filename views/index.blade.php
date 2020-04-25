@extends(layout())

{{-- Template Settings --}}
@section('homepage', true)
@section('page-id', 'homepage')
@section('main-class', 'd-flex align-items-stretch')

@if ($homepage)
  {{-- Set SEO meta data to assigned entry SEO --}}
  @include('partials.seo.seo-meta', ['meta' => $homepage])

  {{-- Set page scripts --}}
  @include('partials.script-manager.script-sets', [
    'head'   => $homepage->head_scripts,
    'top'    => $homepage->top_scripts,
    'bottom' => $homepage->btm_scripts
    ])

  {{-- Set Open Graph data --}}
  @component('components.social-media.tags', [
    'image' => isset($homepage->share_image->slug) ? $homepage->share_image->path() : null,
    'title' => $homepage->share_title ?? null,
    'desc'  => $homepage->share_description ?? null,
    'type'  => null
    ])
  @endcomponent
@endif



{{-- Template Content --}}
@section('content')
  <div class="home-hero d-flex align-items-center justify-content-center">
    {{-- Star Object --}}
    <div class="star-object">
      <div class="star-object__star"></div>
      <div class="star-object__star"></div>
      <div class="star-object__star"></div>
    </div>

    {{-- Main Heading --}}
    <div class="home-hero__container container d-flex align-items-center justify-content-center justify-content-lg-start">
      <div class="home-hero__content position-relative">
        <h2 class="hero-title text-center text-lg-left">
          <span class="home-hero__hover" role="tablist">
            <a href="#art-nav" id="art-link" class="home-hero__link" title="View Art & Illustrations"> Art, </a>
            <br><a href="#notes-nav" id="notes-link" class="home-hero__link" title="View Scrapbok of Notes"> Notes, </a>
            <br><a href="#projects-nav" id="projects-link" class="home-hero__link" title="View Development Projects"> Projects </a>
          </span>
          <span class="hero-subtitle d-block"> by </span>
          <span class="hero-subtitle d-block"><a class="text-display--default" href="/about">Amanda Eldreth</a></span>
        </h2>
      </div>
    </div>
  </div>

  {{-- <div class="homepage-content pl-3 pr-3 pt-0 pb-0">
    <div class="homepage-content__top"></div>
    <div class="row">
      <div class="col-lg-4 bg--green-teal pt-5 pb-5" style="height: 100vh">
        This is a sidebar
      </div>

      <div class="col-lg-8">
        <h1>This is an example of an h1</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>

      <h2>This is an example of an h2</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>

      <hr>

      <h3>This is an example of an h3</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>

      <div class="row">
          <div class="col-md-4">
              <h4>This is an example of an h4</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>

          <div class="col-md-4">
              <h4>This is an example of an h4</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>

          <div class="col-md-4">
              <h4>This is an example of an h4</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>

          <div class="col-md-3">
              <h5>This is an example of an h5</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>
          <div class="col-md-3">
              <h5>This is an example of an h5</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>
          <div class="col-md-3">
              <h5>This is an example of an h5</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>
          <div class="col-md-3">
              <h5>This is an example of an h5</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>
      </div>

      <h6>Smallest heading of them all h6</h6>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
      </div>
    </div>
    <div class="homepage-content__main container">

      <h1>This is an example of an h1</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>

      <h2>This is an example of an h2</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>

      <hr>

      <h3>This is an example of an h3</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>

      <div class="row">
          <div class="col-md-4">
              <h4>This is an example of an h4</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>

          <div class="col-md-4">
              <h4>This is an example of an h4</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>

          <div class="col-md-4">
              <h4>This is an example of an h4</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>

          <div class="col-md-3">
              <h5>This is an example of an h5</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>
          <div class="col-md-3">
              <h5>This is an example of an h5</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>
          <div class="col-md-3">
              <h5>This is an example of an h5</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>
          <div class="col-md-3">
              <h5>This is an example of an h5</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
          </div>
      </div>

      <h6>Smallest heading of them all h6</h6>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dui massa, imperdiet id aliquet mattis, tincidunt sed arcu. Etiam varius imperdiet libero, mattis luctus ipsum condimentum vel. Pellentesque ac porta elit, id finibus tellus. Fusce dolor ipsum, semper quis turpis et, lobortis sodales ante.</p>
    </div>
  </div> --}}
@endsection
