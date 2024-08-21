@unless($breadcrumbs->isEmpty())
<ul class="list-inline">
    @foreach($breadcrumbs as $breadcrumb)
        @unless($loop->first)
            <li class="list-inline-item"><span class="text-white">/</span></li>
        @endunless
        @if (!is_null($breadcrumb->url) && !$loop->last)
            <li class="list-inline-item"><a href="{{ $breadcrumb->url }}" class="text-white">{{ $breadcrumb->title }}</a></li>
        @else
            <li class="list-inline-item"><a class="text-white-50">{{ $breadcrumb->title }}</a></li>
        @endif
    @endforeach
</ul>
@endunless
