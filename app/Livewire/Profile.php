<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    public $secretKey;

    public function desactive() {

        if (true) {
            User::find(Auth::user()->id)->update(
                [
                    'role' => 0,
                ]
            );

            $this->reset('secretKey');
            session()->flash('success', 'your are desactivated successfully');
            $this->dispatch('close-modal');
            return $this->redirect('/profile',navigate:true);

        }
    }

    public function active() {

        if ((Auth::user()->role === 0) && true) {
            User::find(Auth::user()->id)->update(
                [
                    'role' => 1,
                ]
            );

            $this->reset('secretKey');
            session()->flash('success', 'your are activated successfully');
            $this->dispatch('close-modal');
            return $this->redirect('/profile',navigate:true);

        }
    }

    public function upgrade() {

        if ((Auth::user()->role === 1) && true) {
            User::find(Auth::user()->id)->update(
                [
                    'role' => 2,
                ]
            );

            $this->reset('secretKey');
            session()->flash('success', 'your are upgraded successfully');
            $this->dispatch('close-modal');
            return $this->redirect('/profile',navigate:true);

        }
    }

    public function downgrade() {

        if ((Auth::user()->role === 2) && true) {
            User::find(Auth::user()->id)->update(
                [
                    'role' => 1,
                ]
            );

            $this->reset('secretKey');
            session()->flash('success', 'your are downgraded successfully');
            $this->dispatch('close-modal');
            return $this->redirect('/profile',navigate:true);

        }
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
