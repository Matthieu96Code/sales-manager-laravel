<th wire:click="setSortBy('{{ $type }}')">
    <button>
        {{ $displayName }}
        @if ($sortBy !== $type)
            {{ svg('iconsax-bul-arrow-3') }}
        @elseif($sortDir === 'ASC')
            {{ svg('iconsax-bul-arrow-down-1') }}
        @else
            {{ svg('iconsax-bul-arrow-up-2') }}
        @endif
    </button>
</th>