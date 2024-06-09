<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        if (Auth::user()->role>0) {
            $this->redirect('/stores',navigate:true);
        }

        return view('livewire.dashboard');
    }
}
