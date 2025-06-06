@unless ($breadcrumbs->isEmpty())
    <ul itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach ($breadcrumbs as $i => $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="{{ $breadcrumb->url }}" itemprop="item">
                        <span itemprop="name">
                            {{ $breadcrumb->title }}
                        </span>
                        <meta itemprop="position" content="{{$i}}">
                    </a>
                </li>
            @else
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="item">
                        <span itemprop="name">
                            {{ $breadcrumb->title }}
                        </span>
                    </span>
                    <meta itemprop="position" content="{{$i}}">
                </li>
            @endif

        @endforeach
    </ul>
@endunless
