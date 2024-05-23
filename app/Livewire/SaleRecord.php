<?php

namespace App\Livewire;

use App\Models\Customer;
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

    // #[Url(history:true)]
    // public $roleSearch = "";

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
    
    public function updatedSearch (){
        $this->resetPage();
    }

    public function updatedPerPage (){
        $this->resetPage();
    }

    public function create() {
        $validated = $this->validate([
            'product_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required',
            'taxes' => 'required',
        ]);

        $prevProduct = Product::find($validated['product_id']);
        if(($prevProduct->quantity -  $validated['quantity']) >= 0) {
            $prevProduct->update([
                'quantity' => ($prevProduct->quantity -  $validated['quantity'])
            ]);

            Sale::create([
                'product_id' => $validated['product_id'],
                'customer_id' => $validated['product_id'],
                'user_id' => Auth::user()->id,
                'quantity' => $validated['quantity'],
                'taxes' => $validated['taxes'],
            ]);

            // $product = Product::create($validated);
            $this->reset('product_id', 'customer_id', 'quantity', 'quantity', 'taxes');
            session()->flash('success', 'sale created successfully');
            // $this->dispatch('product-created', $product);
            $this->dispatch('close-modal');

        }

    }

    public function delete(Sale $sale){
        $sale->delete();
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
        return view('livewire.sale-record', [
            'sales' => Sale::search($this->search)
            // ->when($this->roleSearch !== '', function($query){
                // $query->where('role', $this->roleSearch);
            // })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
            'customers' => Customer::all(),
            'products' => Product::all()
        ]);
    }
}
