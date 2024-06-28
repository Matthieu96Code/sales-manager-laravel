<?php

namespace App\Livewire;

use App\Models\History;
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

        // Validate supply entry

        $validated = $this->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        // Create supply

        $supply = Supply::create([
        // Supply::create([
            'product_id' => $validated['product_id'],
            'user_id' => Auth::user()->id,
            'quantity' => $validated['quantity'],
        ]);

        // Update the concern product

        $prevProduct = Product::find($validated['product_id']);
        $prevProduct->update([
            'quantity' => ($prevProduct->quantity +  $validated['quantity'])
        ]);

        // Create history

        $this->createHistory('Create supply', $validated['product_id'], $validated['quantity']);

        // Reset field, show succes message and close modal

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

        $this->createHistory('Delete supply', $supply['product_id'], $supply['quantity'] * -1);

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

        // check if the quantity is enought to reduce by updating

        if ($resetedQuantity < 0 ) {
            // error flash
        }

        $historyQuantity = $this->editingSupplyQuantity - $currentSupply->quantity;

        if (($currentSupply->product_id !== $this->editingSupplyProductId)) {
            // changing product, with changing or same quantity
            $this->createHistory('switch from supply', $currentSupply->product_id, $currentSupply['quantity'] * -1) ;
            $this->createHistory('switch to supply', $this->editingSupplyProductId, $this->editingSupplyQuantity);
        }

        if (($currentSupply->quantity !== $this->editingSupplyQuantity) &&
            ($currentSupply->product_id === $this->editingSupplyProductId)) {
            // changing quantity with the same product
            $this->createHistory('Update supply', $currentProduct['id'], $historyQuantity);

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

    private function createHistory($title, $productId, $actionQuantity) {

        History::create([
            'title' => $title,
            'user_id' => Auth::user()->id,
            'product_id' => $productId,
            'quantity' => $actionQuantity,
            // 'sale_id',
        ]);
    }

    public function render()
    {
        return view('livewire.supply-list', [
            'supplies' => Supply::search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
            'products' => Product::all()
        ]);
    }

}
