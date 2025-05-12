<?php

namespace App\Livewire\Backend\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class UserTable extends Component
{
    #[On('refresh')]
    public function render()
    {
        $dataUser = User::with('roles')->get();
        return view('livewire.backend.user.user-table', compact('dataUser'));
    }
}