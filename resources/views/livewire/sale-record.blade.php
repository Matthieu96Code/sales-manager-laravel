<div>

    <x-add-modal name="add-sale" title="Add transation">

        <x-slot:body>
            <h1 class="main-title">Add a new transaction</h1>
            <form wire:submit="create" class="main-form" action="">

                <div class="main-form-group">
                    <label class="main-label" for="">Customer</label>
                    <select class="main-input" wire:model="customer_id">
                        {{-- <option value="0">Client</option> --}}
                        <option value="">Select customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="main-form-group">
                    <label class="main-label" for="">Product</label>
                    <select class="main-input" wire:model="product_id">
                        {{-- <option value="0">Client</option> --}}
                        <option value="">Select product</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="main-form-group">
                    <label class="main-label" for="">Quantity</label>
                    <input wire:model="quantity" class="main-input" type="number" placeholder="product quantity">
                </div>
            
                <div class="main-form-group">
                    <label class="main-label" for="">Taxes</label>
                    <input wire:model="taxes" class="main-input" type="text" placeholder="taxes">
                </div>

                <div class="main-form-group">
                    <button class="main-btn">Saved</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    <button class="main-btn add-btn add-sale-btn" x-data x-on:click="$dispatch('open-modal', {name : 'add-sale' })" class="px-3 py-1 bg-teal-500 text-white rounded">Add sale</button>

    <h1 class="main-title">Sales List</h1>

    @if ($sales->isEmpty())
        <p class="main-text empty-list-text red-text">sale list is empty</p>
    @else

    <div class="main-table-section">
        <div>
            <input class="main-input" wire:model.live.debounce.300ms="search" type="text" placeholder="Search">
        </div>

        <table class="main-table sale-table">
            <thead class="main-thead sale-thead">
                <tr class="main-tr sale-tr">
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'name',
                        'displayName' => 'Customer'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'unit',
                        'displayName' => 'Product'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'price',
                        'displayName' => 'Seller'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'created_at',
                        'displayName' => 'Quantity'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'updated_at',
                        'displayName' => 'Date'
                    ])
                    <th class="main-th sale-th">
                        <span>Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="main-tbody sale-tbody">
                @foreach ($sales as $sale)
                    <tr class="main-tr sale-tr" wire:key="{{ $sale->id }}">
                        <td class="main-td sale-td"> {{ $sale->customer->name }} </td>
                        <td class="main-td sale-td"> {{ $sale->product->name }} </td>
                        <td class="main-td sale-td"> {{ $sale->user->name }} </td>
                        <td class="main-td sale-td"> {{ $sale->quantity }} </td>
                        <td class="main-td sale-td"> {{ $sale->created_at }} </td>
                        <td class="main-td sale-td">
                            <button class="main-btn delete-btn" onclick="confirm('Are you sure you want to delete {{ $sale->name }} ?') ? '' : event.stopImmediatePropagation() " wire:click="delete({{$sale->id}})">
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
            {{ $sales->links() }}
        </div>
    </div>

    @endif
    
</div>

