<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    public $secretKey;

    public function desactive() {

        if ($this->secretKey === '0000') {
            User::find(Auth::user()->id)->update(
                [
                    'role' => 0,
                ]
            );

            session()->flash('success', 'your are desactivated successfully');
            $this->dispatch('close-modal');
            return $this->redirect('/profile',navigate:true);
        } else {
            session()->flash('error', 'your secret key is wrong');
        }

        $this->reset('secretKey');
    }

    public function active() {

        if ((Auth::user()->role === 0) && ($this->secretKey === '0000')) {
            User::find(Auth::user()->id)->update(
                [
                    'role' => 1,
                ]
            );

            session()->flash('success', 'your are activated successfully');
            $this->dispatch('close-modal');
            return $this->redirect('/profile',navigate:true);

        } else {
            session()->flash('error', 'your secret key is wrong');
        }

        $this->reset('secretKey');
    }

    public function upgrade() {

        if ((Auth::user()->role === 1) && ($this->secretKey === '0000')) {
            User::find(Auth::user()->id)->update(
                [
                    'role' => 2,
                ]
            );

            session()->flash('success', 'your are upgraded successfully');
            $this->dispatch('close-modal');
            return $this->redirect('/profile',navigate:true);

        } else {
            session()->flash('error', 'your secret key is wrong');
        }

        $this->reset('secretKey');
    }

    public function downgrade() {

        if ((Auth::user()->role === 2) && ($this->secretKey === '0000')) {
            User::find(Auth::user()->id)->update(
                [
                    'role' => 1,
                ]
            );

            session()->flash('success', 'your are downgraded successfully');
            $this->dispatch('close-modal');
            return $this->redirect('/profile',navigate:true);

        } else {
            session()->flash('error', 'your secret key is wrong');
        }

        $this->reset('secretKey');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
