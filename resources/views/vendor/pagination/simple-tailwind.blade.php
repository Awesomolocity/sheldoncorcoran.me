@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{!! __('Pagination Navigation') !!}" class="flex justify-between min-w-2xl">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <flux:spacer />

        @else
            <flux:button :href="$paginator->previousPageUrl()">
                {!! __('pagination.previous') !!}
            </flux:button>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <flux:button :href="$paginator->nextPageUrl()">
                {!! __('pagination.next') !!}
            </flux:button>
        @else
            <flux:spacer />
        @endif
    </nav>
@endif
