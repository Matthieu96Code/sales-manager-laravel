<div>

    <x-add-modal name="show-product" title="Show Product">

        <x-slot:body>
            <h1 class="main-title">Show product</h1>
            @if ($editingProductId)
                <p>{{$editingProductName}}</p>
            @endif
        </x-slot>
    </x-add-modal>

    <h1 class="main-title">Store items</h1>

    @if ($products->isEmpty())
        <p class="main-text empty-list-text red-text">Your store is empty</p>
    @else

    <div class="main-table-section">
        <div>
            <input class="main-input" wire:model.live.debounce.300ms="search" type="text" placeholder="Search">
        </div>

        <table class="main-table product-table">
            <thead class="main-thead product-thead">
                <tr class="main-tr product-tr">
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'name',
                        'displayName' => 'Name'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'unit',
                        'displayName' => 'Unit'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'quantity',
                        'displayName' => 'Quantity'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'created_at',
                        'displayName' => 'Joined'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'updated_at',
                        'displayName' => 'Edited'
                    ])
                    <th class="main-th product-th">
                        <span>Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="main-tbody product-tbody">
                @foreach ($products as $product)
                    <tr class="main-tr product-tr" wire:key="{{ $product->id }}">
                        <td class="main-td product-td"> {{ $product->name }} </td>
                        <td class="main-td product-td"> {{ $product->unit }} </td>
                        <td class="main-td product-td"> {{ $product->quantity }} </td>
                        <td class="main-td product-td"> {{ $product->created_at }} </td>
                        <td class="main-td product-td"> {{ $product->updated_at }} </td>
                        <td class="main-td product-td">
                            <sapn class="main-icon show-icon"  wire:click="edit({{$product->id}})" x-data x-on:click="$dispatch('open-modal', {name : 'show-product' })">
                                <x-iconsax-bro-eye />
                            </sapn>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <div>
            <label class="main-label" for="">Per page</label>
            <select class="main-input" wire:model.live="perPage">
                <option value="2">2</option>
                <option value="5">5</option>
                <option value="7">7</option>
            </select>
        </div>

        <div>
            {{ $products->links() }}
        </div>
    </div>

    @endif
    
</div>
