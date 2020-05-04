<div class="panel container pb-5 mb-5">
    <div class="row align-items-center justify-content-center">
        @if ($component['image'])
        <div class="panel__image col-md-4">
            <img class="lazy" src="{{ theme(theme_property('settings.images.loading')) }}" data-src="{{ $component['image']->path() }}?w=400&amp;h=400&amp;fit=crop" alt="{{ $component['image']->description }}" title="{{ $component['image']->name }}">
        </div>
        @endif
        <div class="panel__content col-md-6 wysiwyg">
            <h2 class="text-display--md">{{ $component['title'] }}</h2>
            {!! $component['text'] !!}
        </div>
    </div>
</div>