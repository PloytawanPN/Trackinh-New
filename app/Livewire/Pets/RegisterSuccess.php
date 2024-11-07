<?php

namespace App\Livewire\Pets;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class RegisterSuccess extends Component
{
    public function go_login(){
        return redirect()->route("login.user");
    }
    public function render()
    {
        return view('livewire.pets.register-success');
    }
}
