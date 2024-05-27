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
    
    {{-- show product modal --}}

    <x-add-modal name="show-product" title="Show Product">
        <x-slot:body>
            @if ($editingProductId)
                <p>{{$editingProductName}}</p>
            @endif
        </x-sloty>
    </x-add-modal>

    {{-- update product modal --}}

    <x-add-modal name="edit-product" title="Edit Product">

        <x-slot:body>
            <h1 class="main-title">Edit product</h1>
            @if ($editingProductId)
                
            <form wire:submit="update" class="main-form" action="">
                <div class="main-form-group">
                    <label class="main-label" for="">product name</label>
                    <input wire:model="editingProductName" class="main-input" type="text" placeholder="product name">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">product unit</label>
                    <input wire:model="editingProductUnit" class="main-input" type="text" placeholder="product unit">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">price in usd</label>
                    <input wire:model="editingProductPrice" class="main-input" type="number" placeholder="price">
                </div>
                <div class="main-form-group">
                    <label class="main-label" for="">detail</label>
                    <textarea wire:model="editingProductDetail" class="main-input" cols="20" rows="10"></textarea>
                </div>

                <div class="main-form-group">
                    <button class="main-btn">Update</button>
                    {{-- <button wire:click="cancelEdit" class="main-btn">Update</button> --}}
                </div>
            </form>
            @endif

        </x-slot>
    </x-add-modal>

    <button class="main-btn add-btn add-product-btn" x-data x-on:click="$dispatch('open-modal', {name : 'add-product' })">Add product</button>

    <h1 class="main-title">Products List</h1>

    @if ($products->isEmpty())
        <p class="main-text empty-list-text red-text">product list is empty</p>
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
                        'type' => 'price',
                        'displayName' => 'Price'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'created_at',
                        'displayName' => 'Created'
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
                        <td class="main-td product-td"> {{ $product->price }} $</td>
                        <td class="main-td product-td"> {{ $product->created_at }} </td>
                        <td class="main-td product-td"> {{ $product->updated_at }} </td>
                        <td class="main-td product-td">
                            <sapn class="main-icon show-icon"  wire:click="edit({{$product->id}})" x-data x-on:click="$dispatch('open-modal', {name : 'show-product' })">
                                <x-iconsax-bro-eye />
                            </sapn>
                            <sapn class="main-icon edit-icon"  wire:click="edit({{$product->id}})" x-data x-on:click="$dispatch('open-modal', {name : 'edit-product' })">
                                <x-iconsax-bro-edit-2 />
                            </sapn>
                            <span class="main-icon del-icon" onclick="confirm('Are you sure you want to delete {{ $product->name }} ?') ? '' : event.stopImmediatePropagation() " wire:click="delete({{$product->id}})">
                                <x-iconsax-lin-trash />
                            </span>
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
