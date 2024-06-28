<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\History;
use App\Models\Product;
use App\Models\sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SaleRecord extends Component
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
    public $customer_id = '';
    public $quantity = '';
    public $taxes = '';

    public $editingSaleId;
    
    public $editingSaleProductId;
    public $editingSaleCustomerId;
    public $editingSaleQuantity;
    public $editingSaleTaxes;
    
    public function updatedSearch (){
        $this->resetPage();
    }

    public function updatedPerPage (){
        $this->resetPage();
    }

    public function create() {
        
        // Validate sale entry

        $validated = $this->validate([
            'product_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required',
            'taxes' => 'required',
        ]);

        // Check if the quantity is available

        $prevProduct = Product::find($validated['product_id']);
        if(($prevProduct->quantity -  $validated['quantity']) >= 0) {
            $prevProduct->update([
                'quantity' => ($prevProduct->quantity -  $validated['quantity'])
            ]);

            // Create sale

            Sale::create([
                'product_id' => $validated['product_id'],
                'customer_id' => $validated['customer_id'],
                'user_id' => Auth::user()->id,
                'quantity' => $validated['quantity'],
                'taxes' => $validated['taxes'],
            ]);

            // create history

            $this->createHistory('Create sale', $validated['product_id'], $validated['quantity'] * -1);

            // Reset field, show succes message and close modal

            $this->reset('product_id', 'customer_id', 'quantity', 'quantity', 'taxes');
            session()->flash('success', 'sale created successfully');
            // $this->dispatch('product-created', $product);
            $this->dispatch('close-modal');

        }

    }

    public function delete(Sale $sale){

        $currentProduct = Product::find($sale->product_id);
        $resetedQuantity = $currentProduct->quantity + $sale->quantity;

        $currentProduct->update([
            'quantity' => $resetedQuantity
        ]);

        $sale->delete();

        $this->createHistory('Delete sale', $sale['product_id'], $sale['quantity']);
    }

    public function setSortBy($sortByField){

        if($this->sortBy === $sortByField){
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function edit($saleId){
        $this->editingSaleId = $saleId;
        $editingSale = Sale::find($saleId);

        $this->editingSaleProductId = $editingSale->product_id;
        $this->editingSaleCustomerId = $editingSale->customer_id;
        $this->editingSaleQuantity = $editingSale->quantity;
        $this->editingSaleTaxes = $editingSale->taxes;

    }

    public function cancelEdit() {
        $this->reset(
            "editingSaleId",
            "editingSaleProductId",
            "editingSaleCustomerId",
            "editingSaleQuantity",
            "editingSaleTaxes"
        );

        $this->dispatch('close-modal');
    }

    public function update() {

        $currentSale = Sale::find($this->editingSaleId);
        $currentProduct = Product::find($this->editingSaleProductId);
        $resetedQuantity = $currentProduct->quantity + $currentSale->quantity;

        $historyQuantity = $currentSale->quantity - $this->editingSaleQuantity;

        if (($currentSale->product_id !== $this->editingSaleProductId)) {
            // changing product, with changing or same quantity
            $this->createHistory('switch from sale', $currentSale->product_id, $currentSale['quantity']) ;
            $this->createHistory('switch to sale', $this->editingSaleProductId, $this->editingSaleQuantity * -1);
        }

        if (($currentSale->quantity !== $this->editingSaleQuantity) &&
            ($currentSale->product_id === $this->editingSaleProductId)) {
            // changing quantity with the same product
            $this->createHistory('Update sale', $currentProduct['id'], $historyQuantity);

        }

        $currentProduct->update([
            'quantity' => ($resetedQuantity - $this->editingSaleQuantity)
        ]);

        Sale::find($this->editingSaleId)->update(
            [
                'product_id' => $this->editingSaleProductId,
                'customer_id' => $this->editingSaleCustomerId,
                'quantity' => $this->editingSaleQuantity,
                'taxes' => $this->editingSaleTaxes,
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
        return view('livewire.sale-record', [
            'sales' => Sale::search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
            'customers' => Customer::all(),
            'products' => Product::all()
        ]);
    }
}
