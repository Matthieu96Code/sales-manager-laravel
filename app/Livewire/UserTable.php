<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{

    use WithPagination;

    #[Url(history:true)]
    public $search = "";

    #[Url(history:true)]
    public $roleSearch = "";

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 5;

    public $name = '';
    public $password = '';
    public $password_confirmation = '';
    public $role = '';

    public function updatedSearch (){
        $this->resetPage();
    }

    public function updatedPerPage (){
        $this->resetPage();
    }

    public function delete(User $user){
        $user->delete();
    }

    public function create() {
        
        $validated = $this->validate([
            'name' => 'required|min:3|max:40|unique:users,name',
            'password' => 'required',
            // 'password_confirmation' => 'required|confirmed',
            'role' => 'required',
        ]);

        User::create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        // $user = User::create($validated);

        $this->reset('name', 'password', 'password_confirmation', 'role');

        session()->flash('success', 'product created successfully');

        // $this->dispatch('user-created', $user);
        $this->dispatch('close-modal');
    }

    public function setSortBy($sortByField){

        if($this->sortBy === $sortByField){
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        return view('livewire.user-table', [
            'users' => User::search($this->search)
            ->when($this->roleSearch !== '', function($query){
                $query->where('role', $this->roleSearch);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage)
        ]);
    }
}
