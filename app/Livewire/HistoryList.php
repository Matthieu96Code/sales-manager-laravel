<?php

namespace App\Livewire;

use App\Models\History;
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
    


    public function render()
    {
        return view('livewire.history-list', [
            'histories' => History::search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }
}
