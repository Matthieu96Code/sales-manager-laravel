<div>
    <x-add-modal name="add-user" title="Add user">
        <x-slot:body>
            <h1 class="main-title">Add a new user</h1>
            <form class="main-form" wire:submit="create" action="">
                <div class="main-form-group">
                    <label class="main-label" for="">username</label>
                    <input class="main-input" wire:model="name" type="text" placeholder="username">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">password</label>
                    <input class="main-input" wire:model="password" type="password" placeholder="password">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">confirm password</label>
                    <input class="main-input" wire:model="password_confirmation" type="password" placeholder="confirm password">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">role</label>
                    <select class="main-input" wire:model="role">
                        {{-- <option value="0">Client</option> --}}
                        <option value="">Select role</option>
                        <option value="0">Client</option>
                        <option value="1">Utilisateur</option>
                    </select>
                </div>
        
                <div class="main-form-group">
                    <button class="main-btn">Add user</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    <button class="main-btn add-btn add-user-btn" x-data x-on:click="$dispatch('open-modal', {name : 'add-user' })" class="px-3 py-1 bg-teal-500 text-white rounded">Add user</button>

    <h1 class="main-title">Sellers List</h1>

    <div class="main-table-section">
        <div>
            <input class="main-input" wire:model.live.debounce.300ms="search" type="text" placeholder="Search">
        </div>

        <div class="">
            <label class="main-label" for="">User Type</label>
            <select class="main-input" wire:model.live="roleSearch">
                <option value="">All</option>
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <table class="main-table user-table">
            <thead class="main-thead user-thead">
                <tr class="main-tr user-tr">
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'name',
                        'displayName' => 'Name'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'role',
                        'displayName' => 'Role'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'created_at',
                        'displayName' => 'Joined'
                    ])
                    @include('livewire.includes.table-sortable-th', [
                        'type' => 'update_at',
                        'displayName' => 'Last Update'
                    ])
                    <th>
                        <span>Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="main-tbody user-tbody">
                @foreach ($users as $user)
                    <tr class="main-tr user-tr" wire:key="{{ $user->id }}">
                        <th class="main-td user-td"> {{ $user->name }} </th>
                        <th class="main-td user-td"> {{ $user->role }} </th>
                        <th class="main-td user-td"> {{ $user->created_at }} </th>
                        <th class="main-td user-td"> {{ $user->updated_at }} </th>
                        <th class="main-td user-td">
                            <button class="main-btn delete-btn" onclick="confirm('Are you sure you want to delete {{ $user->name }} ?') ? '' : event.stopImmediatePropagation() " wire:click="delete({{$user->id}})">X</button>
                        </th>
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
            {{-- {{ $users->links('pagination::bootstrap-4') }} --}}
            {{ $users->links() }}
        </div>
    </div>
</div>
