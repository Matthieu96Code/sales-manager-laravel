<div>

    <x-add-modal name="add-product" title="Add Product">
        {{-- @slot('body')
        @endslot --}}
        <x-slot:body>
            <h1 class="main-title">Add a new product</h1>
            <form wire:submit="create" class="main-form" action="">
                <div class="main-form-group">
                    <label class="main-label" for="">product name</label>
                    <input wire:model="name" class="main-input" type="text" placeholder="product name">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">product unit</label>
                    <input wire:model="unit" class="main-input" type="text" placeholder="product unit">
                </div>
                
                <div class="main-form-group">
                    <label class="main-label" for="">product quantity</label>
                    <input wire:model="quantity" class="main-input" type="number" placeholder="product quantity">
                </div>
                <div class="main-form-group">
                    <label class="main-label" for="">price in usd</label>
                    <input wire:model="price" class="main-input" type="number" placeholder="price">
                </div>
                <div class="main-form-group">
                    <label class="main-label" for="">detail</label>
                    <textarea wire:model="detail" class="main-input" cols="20" rows="10"></textarea>
                </div>

                <div class="main-form-group">
                    <button class="main-btn">Saved</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    <button x-data x-on:click="$dispatch('open-modal', {name : 'add-product' })" class="px-3 py-1 bg-teal-500 text-white rounded">Add product</button>

    <h1>Product List</h1>

    @foreach ($products as $product)
        <p>{{ $product->name }}</p>
    @endforeach
    
</div>
