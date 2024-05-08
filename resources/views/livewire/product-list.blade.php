<div>

    <x-add-modal name="add-product" title="Add Product">
        {{-- @slot('body')
        <span class="p-5">Body tag test</span>
        @endslot --}}
        <x-slot:body>
            <form wire:submit="create" action="">
                <div>
                    <label for="">product name</label>
                    <input wire:model="name" type="text" placeholder="product name">
                </div>
                
                <div>
                    <label for="">product unit</label>
                    <input wire:model="unit" type="text" placeholder="product unit">
                </div>
                
                <div>
                    <label for="">product quantity</label>
                    <input wire:model="quantity" type="number" placeholder="product quantity">
                </div>
                <div>
                    <label for="">price in usd</label>
                    <input wire:model="price" type="number" placeholder="price">
                </div>
                <div>
                    <label for="">detail</label>
                    <textarea wire:model="detail" cols="20" rows="10"></textarea>
                </div>

                <div>
                    <button>Saved</button>
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
