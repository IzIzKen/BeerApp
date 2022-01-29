@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="paginate_button page-item previous disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="#" class="page-link"><i class="previous"></i></a>
                </li>
            @else
                <li class="paginate_button page-item previous">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="previous"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="paginate_button page-item disabled" aria-disabled="true"><a href="#" class="page-link">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active" aria-current="page"><a href="#" class="page-link">{{ $page }}</a></li>
                        @else
                            <li class="paginate_button page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="page-link"><i class="next"></i></a>
                </li>
            @else
                <li class="paginate_button page-item next disabled">
                    <a href="#" class="page-link"><i class="next"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
