<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class StoreItems extends Component
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
    
    public $editingProductId;
    
    public $editingProductName;
    public $editingProductUnit;
    public $editingProductPrice;
    public $editingProductDetail;

    
    public function edit($productId){
        $this->editingProductId = $productId;
        $editingProduct = Product::find($productId);

        $this->editingProductName = $editingProduct->name;
        $this->editingProductUnit = $editingProduct->unit;
        $this->editingProductPrice = $editingProduct->price;
        $this->editingProductDetail = $editingProduct->detail;

    }

    public function updatedSearch (){
        $this->resetPage();
    }

    public function updatedPerPage (){
        $this->resetPage();
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
        return view('livewire.store-items', [
            'products' => Product::search($this->search)
            // ->when($this->roleSearch !== '', function($query){
                // $query->where('role', $this->roleSearch);
            // })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage)
        ]);
    }
}
