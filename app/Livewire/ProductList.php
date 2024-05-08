<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{

    public $name = '';
    public $unit = '';
    public $quantity = '';
    public $price = '';
    public $detail = '';

    public function create() {
        $validated = $this->validate([
            'name' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'detail' => 'nullable',
        ]);

        Product::create($validated);

        $this->reset('name', 'unit', 'quantity', 'price', 'detail');

        session()->flash('success', 'product created successfully');
    }


    public function render()
    {
        return view('livewire.product-list', [
            'products' => Product::latest()->get()
        ]);
    }
}
