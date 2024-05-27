<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
    public $price = '';
    public $detail = '';

    public $editingProductId;
    
    public $editingProductName;
    public $editingProductUnit;
    public $editingProductPrice;
    public $editingProductDetail;

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
            'price' => 'required',
            'detail' => 'nullable',
        ]);

        Product::create([
            'name' => $validated['name'],
            'unit' => $validated['unit'],
            'price' => $validated['price'],
            'detail' => $validated['detail'],
            'user_id' => Auth::user()->id
        ]);

        $this->reset('name', 'unit', 'price', 'detail');
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

    public function edit($productId){
        $this->editingProductId = $productId;
        $editingProduct = Product::find($productId);

        $this->editingProductName = $editingProduct->name;
        $this->editingProductUnit = $editingProduct->unit;
        $this->editingProductPrice = $editingProduct->price;
        $this->editingProductDetail = $editingProduct->detail;

    }

    public function cancelEdit() {
        $this->reset(
            "editingProductId",
            "editingProductName",
            "editingProductUnit",
            "editingProductPrice",
            "editingProductDetail"
        );

        $this->dispatch('close-modal');
    }

    public function update() {
        Product::find($this->editingProductId)->update(
            [
                'name' => $this->editingProductName,
                'unit' => $this->editingProductUnit,
                'price' => $this->editingProductPrice,
                'detail' => $this->editingProductDetail,
            ]
        );

        $this->cancelEdit();
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
