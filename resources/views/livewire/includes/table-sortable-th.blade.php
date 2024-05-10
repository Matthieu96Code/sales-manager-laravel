<th class="main-th customer-th" wire:click="setSortBy('{{ $type }}')">
    <button class="main-table-sort-btn" >
        <p class="main-th main-table-title">{{ $displayName }}</p>
        <span class="main-table-sort-icon">
            @if ($sortBy !== $type)
                {{ svg('iconsax-bul-arrow-3') }}
            @elseif($sortDir === 'ASC')
                {{ svg('iconsax-bul-arrow-down-1') }}
            @else
                {{ svg('iconsax-bul-arrow-up-2') }}
            @endif
        </span>

    </button>
</th>