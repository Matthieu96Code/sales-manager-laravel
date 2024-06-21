<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Supply;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SupplyList extends Component
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

    public $product_id = '';
    public $quantity = '';

    public $editingSupplyId;
    
    public $editingSupplyProductId;
    public $editingSupplyQuantity;
    
    public function updatedSearch (){
        $this->resetPage();
    }

    public function updatedPerPage (){
        $this->resetPage();
    }

    public function create() {
        $validated = $this->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        Supply::create([
            'product_id' => $validated['product_id'],
            'user_id' => Auth::user()->id,
            'quantity' => $validated['quantity'],
        ]);

        $prevProduct = Product::find($validated['product_id']);
        $prevProduct->update([
            'quantity' => ($prevProduct->quantity +  $validated['quantity'])
        ]);

        // $product = Product::create($validated);
        $this->reset('product_id', 'quantity');
        session()->flash('success', 'supply created successfully');
        // $this->dispatch('product-created', $product);
        $this->dispatch('close-modal');
    }

    public function delete(Supply $supply){

        $currentProduct = Product::find($supply->product_id);
        $resetedQuantity = $currentProduct->quantity - $supply->quantity;

        if ($resetedQuantity < 0 ) {

        }

        $currentProduct->update([
            'quantity' => $resetedQuantity
        ]);

        $supply->delete();
    }

    public function setSortBy($sortByField){

        if($this->sortBy === $sortByField){
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    
    public function edit($supplyId){
        $this->editingSupplyId = $supplyId;
        $editingSupply = Supply::find($supplyId);

        $this->editingSupplyProductId = $editingSupply->product_id;
        $this->editingSupplyQuantity = $editingSupply->quantity;

    }

    public function cancelEdit() {
        $this->reset(
            "editingSupplyId",
            "editingSupplyProductId",
            "editingSupplyQuantity",
        );

        $this->dispatch('close-modal');
    }

    public function update() {
        
        $currentSupply = Supply::find($this->editingSupplyId);
        $currentProduct = Product::find($this->editingSupplyProductId);
        $resetedQuantity = $currentProduct->quantity - $currentSupply->quantity;

        if ($resetedQuantity < 0 ) {

        }

        $currentProduct->update([
            'quantity' => ($resetedQuantity + $this->editingSupplyQuantity)
        ]);

        Supply::find($this->editingSupplyId)->update(
            [
                'product_id' => $this->editingSupplyProductId,
                'quantity' => $this->editingSupplyQuantity,
            ]
        );

        $this->cancelEdit();
    }

    public function render()
    {
        return view('livewire.supply-list', [
            'supplies' => Supply::search($this->search)
            // ->when($this->roleSearch !== '', function($query){
                // $query->where('role', $this->roleSearch);
            // })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
            'products' => Product::all()
        ]);
    }

}
