<div>

    <x-add-modal name="add-supply" title="Add Supply">

        <x-slot:body>
            <h1 class="main-title">Add a new supply</h1>
            <form wire:submit="create" class="main-form" action="">

                <div class="main-form-group">
                    <label class="main-label" for="">supply product</label>
                    <select class="main-input" wire:model="product_id">
                        {{-- <option value="0">Client</option> --}}
                        <option value="">Select product</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">supply quantity</label>
                    <input wire:model="quantity" class="main-input" type="text" placeholder="supply unit">
                </div>

                <div class="main-form-group">
                    <button class="main-btn">Saved</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>
    
    {{-- show supply modal --}}

    <x-add-modal name="show-supply" title="Show Supply">
        <x-slot:body>
            @if ($editingSupplyId)
                <p>{{$editingSupplyProductId}}</p>
            @endif
        </x-sloty>
    </x-add-modal>

    {{-- update supply modal --}}

    <x-add-modal name="edit-supply" title="Edit Supply">

        <x-slot:body>
            <h1 class="main-title">Edit supply</h1>
            @if ($editingSupplyId)
                
            <form wire:submit="update" class="main-form" action="">
                <div class="main-form-group">
                    <label class="main-label" for="">supply product</label>
                    <select class="main-input" wire:model="editingSupplyProductId">
                        {{-- <option value="0">Client</option> --}}
                        <option value="">Select product</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">supply quantity</label>
                    <input wire:model="editingSupplyQuantity" class="main-input" type="text" placeholder="supply quantity">
                </div>

                <div class="main-form-group">
                    <button class="main-btn">Update</button>
                    {{-- <button wire:click="cancelEdit" class="main-btn">Update</button> --}}
                </div>
            </form>
            @endif

        </x-slot>
    </x-add-modal>

    <button class="main-btn add-btn add-supply-btn" x-data x-on:click="$dispatch('open-modal', {name : 'add-supply' })">Add supply</button>

    <h1 class="main-title">Supplies List</h1>

    @if ($supplies->isEmpty())
        <p class="main-text empty-list-text red-text">supply list is empty</p>
    @else

    <div class="main-table-section">
        <div>
            <input class="main-input" wire:model.live.debounce.300ms="search" type="text" placeholder="Search">
        </div>

        <table class="main-table supply-table">
            <thead class="main-thead supply-thead">
                <tr class="main-tr supply-tr">
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
                    <th class="main-th supply-th">
                        <span>Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="main-tbody supply-tbody">
                @foreach ($supplies as $supply)
                    <tr class="main-tr supply-tr" wire:key="{{ $supply->id }}">
                        <td class="main-td supply-td"> {{ $supply->product->name }} </td>
                        <td class="main-td supply-td"> {{ $supply->quantity }} </td>
                        <td class="main-td supply-td"> {{ $supply->user->name }} </td>
                        <td class="main-td supply-td"> {{ $supply->created_at }} </td>
                        <td class="main-td supply-td"> {{ $supply->updated_at }} </td>
                        <td class="main-td supply-td">
                            <sapn class="main-icon show-icon"  wire:click="edit({{$supply->id}})" x-data x-on:click="$dispatch('open-modal', {name : 'show-supply' })">
                                <span class="main-icon table-icon">
                                    <x-iconsax-bro-eye />
                                </span>
                            </sapn>

                            @if ((Auth::user()->id === $supply->user->id) || (Auth::user()->role > 1))
                                <sapn class="main-icon edit-icon"  wire:click="edit({{$supply->id}})" x-data x-on:click="$dispatch('open-modal', {name : 'edit-supply' })">
                                    <span class="main-icon table-icon">
                                        <x-iconsax-bro-edit-2 />
                                    </span>
                                </sapn>
                                <span class="main-icon del-icon" onclick="confirm('Are you sure you want to delete {{ $supply->name }} ?') ? '' : event.stopImmediatePropagation() " wire:click="delete({{$supply->id}})">
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
                <option value="2">2</option>
                <option value="5">5</option>
                <option value="7">7</option>
            </select>
        </div>

        <div>
            {{ $supplies->links() }}
        </div>
    </div>

    @endif
    
</div>
