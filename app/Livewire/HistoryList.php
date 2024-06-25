<?php

namespace App\Livewire;

use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class HistoryList extends Component
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
    public $sale_id = '';
    public $supply_id = '';
    

    public $selectingHistoryId;
    
    public function create() {

        // Validate history entry

        $validated = $this->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        // Create history

        // $history = History::create([
        History::create([
            'user_id' => Auth::user()->id,
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
        ]);

        // Reset field, show succes message and close modal

        session()->flash('success', 'supply created successfully');

        
    }


    public function render()
    {
        return view('livewire.history-list', [
            'histories' => History::search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }
}
