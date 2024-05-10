<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
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
    public $unit = '';
    public $quantity = '';
    public $price = '';
    public $detail = '';
    
    public function updatedSearch (){
        $this->resetPage();
    }

    public function updatedPerPage (){
        $this->resetPage();
    }

    public function create() {
        $validated = $this->validate([
            'name' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'detail' => 'nullable',
        ]);

        Product::create($validated);

        // $product = Product::create($validated);

        $this->reset('name', 'unit', 'quantity', 'price', 'detail');

        session()->flash('success', 'product created successfully');

        // $this->dispatch('product-created', $product);
        $this->dispatch('close-modal');
    }

    public function delete(Product $product){
        $product->delete();
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
        return view('livewire.product-list', [
            'products' => Product::search($this->search)
            // ->when($this->roleSearch !== '', function($query){
                // $query->where('role', $this->roleSearch);
            // })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage)
        ]);
    }
}
