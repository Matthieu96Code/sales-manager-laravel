<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search = "";

    // #[Url(history:true)]
    // public $roleSearch = "";

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 5;

    public $name = '';
    public $email = '';
    public $phone_number = '';
    public $location = '';

    public function updatedSearch (){
        $this->resetPage();
    }

    public function updatedPerPage (){
        $this->resetPage();
    }

    public function delete(Customer $customer){
        $customer->delete();
    }

    public function create() {
        
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'location' => 'required',
        ]);

        Customer::create($validated);

        // $customer = Customer::create($validated);

        $this->reset('name', 'email', 'phone_number', 'location');

        session()->flash('success', 'product created successfully');
        
        // $this->dispatch('customer-created', $customer);
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
        return view('livewire.customer-table', [
            'customers' => Customer::search($this->search)
            // ->when($this->roleSearch !== '', function($query){
                // $query->where('role', $this->roleSearch);
            // })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage)
        ]);
    }
}
