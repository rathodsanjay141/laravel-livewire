<?php

namespace App\Livewire\Auth;

use App\Http\Livewire\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout() {
        auth()->logout();
        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
