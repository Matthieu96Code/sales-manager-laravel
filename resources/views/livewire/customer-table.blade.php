<div>
    <x-add-modal name="add-customer" title="Add customer">
        <x-slot:body>
            <h1 class="main-title">Add a new customer</h1>
            <form class="main-form" wire:submit="create" action="">
                <div class="main-form-group">
                    <label class="main-label" for="">Name</label>
                    <input class="main-input" wire:model="name" type="text" placeholder="Name">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">Email</label>
                    <input class="main-input" wire:model="email" type="email" placeholder="Email">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">Phone number</label>
                    <input class="main-input" wire:model="phone_number" type="text" placeholder="Phone number">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">Location</label>
                    <input class="main-input" wire:model="location" type="text" placeholder="Location">
                </div>
        
                <div class="main-form-group">
                    <button class="main-btn">Saved</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    {{-- update customer modal --}}

    <x-add-modal name="edit-customer" title="Edit Customer">

        <x-slot:body>
            <h1 class="main-title">Edit customer</h1>
            @if ($editingCustomerId)
            
            <form class="main-form" wire:submit="update" action="">
                <div class="main-form-group">
                    <label class="main-label" for="">Name</label>
                    <input class="main-input" wire:model="editingCustomerName" type="text" placeholder="Name">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">Email</label>
                    <input class="main-input" wire:model="editingCustomerEmail" type="email" placeholder="Email">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">Phone number</label>
                    <input class="main-input" wire:model="editingCustomerPhone_number" type="text" placeholder="Phone number">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">Location</label>
                    <input class="main-input" wire:model="editingCustomerLocation" type="text" placeholder="Location">
                </div>
        
                <div class="main-form-group">
                    <button class="main-btn">Update</button>
                </div>
            </form>
            @endif

        </x-slot>
    </x-add-modal>

    <button class="main-btn add-btn add-customer-btn" x-data x-on:click="$dispatch('open-modal', {name : 'add-customer' })" class="px-3 py-1 bg-teal-500 text-white rounded">Add customer</button>

    <h1 class="main-title">Customers List</h1>
    
    @if ($customers->isEmpty())
        <p class="main-text empty-list-text red-text">customer list is empty</p>
    @else

    <div class="main-table-section">
        <div>
            <input class="main-input" wire:model.live.debounce.300ms="search" type="text" placeholder="Search">
        </div>

        <table class="main-table customer-table">
            <thead class="main-thead customer-thead">
                <tr class="main-tr customer-tr">
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'name',
                        'displayName' => 'Name'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'email',
                        'displayName' => 'Email'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'phone_number',
                        'displayName' => 'Phone Number'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'location',
                        'displayName' => 'Location'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'created_at',
                        'displayName' => 'Joined'
                    ])
                    <th class="main-th customer-th">
                        <span>Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="main-tbody customer-tbody">
                @foreach ($customers as $customer)
                    <tr class="main-tr customer-tr" wire:key="{{ $customer->id }}">
                        <td class="main-td customer-td"> {{ $customer->name }} </td>
                        <td class="main-td customer-td"> {{ $customer->email }} </td>
                        <td class="main-td customer-td"> {{ $customer->phone_number }} </td>
                        <td class="main-td customer-td"> {{ $customer->location }} </td>
                        <td class="main-td customer-td"> {{ $customer->created_at }} </td>
                        <td class="main-td customer-td">
                            <sapn class="main-icon edit-icon"  wire:click="edit({{$customer->id}})" x-data x-on:click="$dispatch('open-modal', {name : 'edit-customer' })">
                                <span class="main-icon table-icon">
                                    <x-iconsax-bro-edit-2 />
                                </span>
                            </sapn>
                            <span class="main-icon del-icon" onclick="confirm('Are you sure you want to delete {{ $customer->name }} ?') ? '' : event.stopImmediatePropagation() " wire:click="delete({{$customer->id}})">
                                <span class="main-icon table-icon">
                                    <x-iconsax-lin-trash />
                                </span>
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
            {{-- {{ $customers->links('pagination::bootstrap-4') }} --}}
            {{ $customers->links() }}
        </div>
    </div>
    
    @endif

</div>
