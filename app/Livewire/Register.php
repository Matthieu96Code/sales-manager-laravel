<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $role = '';

    public function create() {
        
        $validated = $this->validate([
            'name' => 'required|min:3|max:40|unique:users,name',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            // 'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);
        $this->reset('name', 'email', 'password', 'password_confirmation');
        session()->flash('success', 'user created successfully');
        return $this->redirect('/',navigate:true);
    }
    
    public function render()
    {
        return view('livewire.register');
    }
}
