<div>
    {{-- show history modal --}}

    <x-add-modal name="show-history" title="Show History">
        <x-slot:body>
            @if ($selectingHistoryId)
                <p>{{$selectingHistoryId}}</p>
            @endif
        </x-sloty>
    </x-add-modal>

    <h1 class="main-title">History</h1>

    @if ($histories->isEmpty())
        <p class="main-text empty-list-text red-text">History is empty</p>
    @else

    <div class="main-table-section">
        <div>
            <input class="main-input" wire:model.live.debounce.300ms="search" type="text" placeholder="Search">
        </div>

        <table class="main-table history-table">
            <thead class="main-thead history-thead">
                <tr class="main-tr history-tr">
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'name',
                        'displayName' => 'Product'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'unit',
                        'displayName' => 'Quantity'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'price',
                        'displayName' => 'User'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'created_at',
                        'displayName' => 'Created'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'updated_at',
                        'displayName' => 'Edited'
                    ])
                    <th class="main-th history-th">
                        <span>Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="main-tbody history-tbody">
                @foreach ($histories as $history)
                    <tr class="main-tr history-tr" wire:key="{{ $history->id }}">
                        <td class="main-td history-td"> {{ $history->product->name }} </td>
                        <td class="main-td history-td"> {{ $history->product->quantity }} </td>
                        <td class="main-td history-td"> {{ $history->user->name }} </td>
                        <td class="main-td history-td"> {{ $history->created_at }} </td>
                        <td class="main-td history-td"> {{ $history->updated_at }} </td>
                        <td class="main-td history-td">
                            <sapn class="main-icon show-icon"  wire:click="edit({{$history->id}})" x-data x-on:click="$dispatch('open-modal', {name : 'show-history' })">
                                <span class="main-icon table-icon">
                                    <x-iconsax-bro-eye />
                                </span>
                            </sapn>

                            @if ((Auth::user()->id === $history->user->id) || (Auth::user()->role > 1))
                                <sapn class="main-icon edit-icon"  wire:click="edit({{$history->id}})" x-data x-on:click="$dispatch('open-modal', {name : 'edit-history' })">
                                    <span class="main-icon table-icon">
                                        <x-iconsax-bro-edit-2 />
                                    </span>
                                </sapn>
                                <span class="main-icon del-icon" onclick="confirm('Are you sure you want to delete {{ $history->name }} ?') ? '' : event.stopImmediatePropagation() " wire:click="delete({{$history->id}})">
                                    <span class="main-icon table-icon">
                                        <x-iconsax-lin-trash />
                                    </span>
                                </span>
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <label class="main-label" for="">Per page</label>
            <select class="main-input" wire:model.live="perPage">
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <div>
            {{ $histories->links() }}
        </div>
    </div>

    @endif



</div>
