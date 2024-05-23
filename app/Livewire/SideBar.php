<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SideBar extends Component
{

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return $this->redirect('/login',navigate:true);
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
