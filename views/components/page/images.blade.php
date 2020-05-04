@unless ($component['images']->isEmpty())
<div class="page-images container text-center wysiwyg mb-5">
    <figure class="page-images__figure d-flex flex-wrap justify-content-center">
        @foreach ($component['images'] as $image)
        <picture class="page-images__image">
            <source src="{{ theme(theme_property('settings.images.loading')) }}" data-srcset="{{ $image->path() }}?w=500&amp;fit=max" media="--xs" />
            <source src="{{ theme(theme_property('settings.images.loading')) }}" data-srcset="{{ $image->path() }}?w=700&amp;fit=max" media="--sm" />
            <img class="lazy" src="{{ theme(theme_property('settings.images.loading')) }}" data-src="{{ $image->path() }}?w=1000&amp;fit=max" alt="{{ $image->description }}" title="{{ $image->name }}">
        </picture>
        @endforeach
        @if ($component['caption'])
        <figcaption class="page-images__caption w-100"><em><small>{{ $component['caption'] }}</small></em></figcaption>
        @endif
    </figure>
</div>
@endunless