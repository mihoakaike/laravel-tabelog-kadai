@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
            <div class="flex">
                <span>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex-row-reverse px-2 py-2 text-sm font-medium" aria-label="{{ __('pagination.previous') }}">
                        <
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="flex-row-reverse  px-4 p-2 text-sm font-medium">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="flex-row-reverse px-4 py-2  text-sm font-medium">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="flex-row-reverse px-4 py-2 text-sm font-medium" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex-row-reverse px-4 py-2 text-sm font-medium" aria-label="{{ __('pagination.next') }}">
                        >
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        </span>
                    @endif
                </span>
            </div>
    </nav>
@endif
