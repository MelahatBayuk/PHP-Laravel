@if ($paginator->hasPages())
    <nav>
        <ul class="page-numbers">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li  aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-numbers" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li >
                    <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}"  aria-label="@lang('pagination.previous')"></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true"><span class="page-numbers">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li  aria-current="page"><span class="page-numbers current">{{ $page }}</span></li>
                        @else
                            <li > <a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"></a>
                </li>
            @else
                <li  aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-numbers" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
