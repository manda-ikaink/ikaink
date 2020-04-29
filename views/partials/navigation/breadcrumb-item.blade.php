<li class="breadcrumbs__item breadcrumb-item {{ $active ? 'active' : null }}" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a class="breadcrumbs__link" itemscope itemtype="https://schema.org/WebPage"
    itemprop="item" itemid="{{ $url }}" href="{{ $url }}" >
        @if (isset($home))<span class="fas fa-home"></span>@endif
        <span itemprop="name">{{ str_limit($title, 72) }}</span>
    </a>
    <meta itemprop="position" content="{{ $position }}" />
</li>