@if ($paginator->hasPages())
    <nav class="navigation pagination py-2 d-inline-block">
        <div class="nav-links">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="prev page-numbers">Prev</a>
            @else
                <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}">Prev</a>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="page-numbers current">{{ $page }}</span>
                        @else
                            <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}">Next</a>
            @else
                <a class="next page-numbers">Next</a>
            @endif
        </div>
    </nav>
@endif
