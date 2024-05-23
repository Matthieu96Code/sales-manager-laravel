<div>

    <x-add-modal name="add-product" title="Add Product">

        <x-slot:body>
            <h1 class="main-title">Add a new product</h1>
            <form wire:submit="create" class="main-form" action="">
                <div class="main-form-group">
                    <label class="main-label" for="">product name</label>
                    <input wire:model="name" class="main-input" type="text" placeholder="product name">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">product unit</label>
                    <input wire:model="unit" class="main-input" type="text" placeholder="product unit">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">product quantity</label>
                    <input wire:model="quantity" class="main-input" type="number" placeholder="product quantity">
                </div>
                <div class="main-form-group">
                    <label class="main-label" for="">price in usd</label>
                    <input wire:model="price" class="main-input" type="number" placeholder="price">
                </div>
                <div class="main-form-group">
                    <label class="main-label" for="">detail</label>
                    <textarea wire:model="detail" class="main-input" cols="20" rows="10"></textarea>
                </div>

                <div class="main-form-group">
                    <button class="main-btn">Saved</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    {{-- <button class="main-btn add-btn add-product-btn" x-data x-on:click="$dispatch('open-modal', {name : 'add-product' })" class="px-3 py-1 bg-teal-500 text-white rounded">Add product</button> --}}

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
                            <button class="main-btn delete-btn" onclick="confirm('Are you sure you want to delete {{ $product->name }} ?') ? '' : event.stopImmediatePropagation() " wire:click="delete({{$product->id}})">
                                <span class="main-icon table-icon">
                                    <x-iconsax-lin-trash />
                                </span>
                            </button>
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
