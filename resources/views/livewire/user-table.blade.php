<div>
    <x-add-modal name="add-user" title="Add user">
        <x-slot:body>
            <form wire:submit="create" action="">
                <div>
                    <label for="">username</label>
                    <input wire:model="name" type="text" placeholder="username">
                </div>
                
                <div>
                    <label for="">password</label>
                    <input wire:model="password" type="password" placeholder="password">
                </div>
                
                <div>
                    <label for="">role</label>
                    <select wire:model="role">
                        {{-- <option value="0">Client</option> --}}
                        <option value="">Select role</option>
                        <option value="0">Client</option>
                        <option value="1">Utilisateur</option>
                    </select>
                </div>
        
                <div>
                    <button>Add user</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    <button class="btn btn-danger" x-data x-on:click="$dispatch('open-modal', {name : 'add-user' })" class="px-3 py-1 bg-teal-500 text-white rounded">Add user</button>

    <h1>User Table</h1>

    <div>
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search">
    </div>

    <div>
        <label for="">User Type</label>
        <select wire:model.live="roleSearch">
            <option value="">All</option>
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>
    </div>

    <div>
        <table>
            <thead>
                <tr>
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
            <tbody>
                @foreach ($users as $user)
                    <tr wire:key="{{ $user->id }}">
                        <th> {{ $user->name }} </th>
                        <th> {{ $user->role }} </th>
                        <th> {{ $user->created_at }} </th>
                        <th> {{ $user->updated_at }} </th>
                        <th>
                            <button onclick="confirm('Are you sure you want to delete {{ $user->name }} ?') ? '' : event.stopImmediatePropagation() " wire:click="delete({{$user->id}})">X</button>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div>
        <label for="">Per page</label>
        <select wire:model.live="perPage">
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
