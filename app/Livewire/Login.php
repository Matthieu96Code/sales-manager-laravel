<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $name = '';
    public $password = '';

    public function loginUser(Request $request) {
        $validated = $this->validate([
            'name' => 'required|min:3|max:40',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated)) {
            $request->session()->regenerate();

            return $this->redirect('/',navigate:true);
        }

        $this->addError('email', 'the password provided doesn\'t match the email');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
